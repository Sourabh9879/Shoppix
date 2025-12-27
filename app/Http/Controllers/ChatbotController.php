<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatbotController extends Controller
{
    private $apiKey;
    private $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
        $this->apiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent';
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $userMessage = $request->input('message');

        // Get product information for context
        $products = Product::select('name', 'desc', 'price', 'category')
            ->limit(50)
            ->get();

        // Build context for AI
        $productContext = "Available products:\n";
        foreach ($products as $product) {
            $productContext .= "- {$product->name} ({$product->category}): {$product->desc} - ₹{$product->price}\n";
        }

        // Create the prompt
        $systemPrompt = "You are a helpful customer support assistant for Shoppix, an e-commerce platform. "
            . "Be friendly, professional, and concise. Help customers with product inquiries, orders, and general questions.\n\n"
            . "IMPORTANT RULES:\n"
            . "1. ONLY mention products from the list below. DO NOT invent or make up any products.\n"
            . "2. If a customer asks about a product that is NOT in the list, politely say 'We don't have that product currently in our store.'\n"
            . "3. Never describe features or details of products that are not in the provided list.\n"
            . "4. If you don't know something specific about an order, ask them to check their order details.\n\n"
            . $productContext . "\n\n"
            . "User: {$userMessage}\nAssistant:";

        try {
            // Call Gemini API
            $response = $this->callGeminiAPI($systemPrompt);

            return response()->json([
                'success' => true,
                'response' => $response
            ]);

        } catch (\Exception $e) {
            \Log::error('Chatbot Error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'error' => 'Unable to process your request. Please try again later.',
                'debug' => $e->getMessage()
            ], 500);
        }
    }

    private function callGeminiAPI($prompt)
    {
        $client = new Client();

        $response = $client->post($this->apiUrl . '?key=' . $this->apiKey, [
            'json' => [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 500,
                ]
            ],
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]);

        $body = json_decode($response->getBody(), true);
        
        if (isset($body['candidates'][0]['content']['parts'][0]['text'])) {
            return trim($body['candidates'][0]['content']['parts'][0]['text']);
        }

        throw new \Exception('Invalid response from Gemini API');
    }

    public function getChatHistory()
    {
        // Chat history disabled
        return response()->json([
            'success' => true,
            'chats' => []
        ]);
    }
};
