<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OTPVerificationController extends Controller
{
    public function showOtpForm()
    {
        return view('otp-verification');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ]);

        if (Session::has('user_email.email') && Session::get('otp') == $request->otp){
            return redirect()->route('password-form')->with('success', 'Verification successful! You can now Change Password.');
        }

        if (Session::has('otp') && Session::get('otp') == $request->otp) {

            $userData = Session::get('user_data');

            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make($userData['password']),
            ]);

            Session::forget(['otp', 'user_data']);

            return redirect()->route('login')->with('success', 'Registration successful! You can now login.');
        } else {
            return back()->withErrors(['otp' => 'Incorrect OTP, please try again.']);
        }
    }
}
