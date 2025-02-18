<!DOCTYPE html>
<html>
<body>
    <h2>New Offer Received</h2>
    <p>Hello {{ $product->user_name }},</p>
    <p>You have received a new offer for your product "{{ $product->name }}".</p>
    
    <h3>Offer Details:</h3>
    <ul>
        <li>Buyer: {{ $buyer->name }}</li>
        <li>Offer Amount: ₹{{ $offer->amount }}</li>
        <li>Message: {{ $offer->message }}</li>
    </ul>
    
    <p>Contact the buyer:</p>
    <ul>
        <li>Email: {{ $buyer->email }}</li>
        <li>Phone: {{ $buyer->phone }}</li>
    </ul>
    
    <p>Thank you for using our platform!</p>
</body>
</html> 