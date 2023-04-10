<?php

namespace App\Http\Controllers;

use App\Mail\SendMailTest;
use App\Mail\SendOtpToMail;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
    //
    public static function makeOtp(Request $request) {
        $email = $request->email;
        $otp = rand(123456, 999999);
        $expire_at = now()->addMinutes(5);

        Otp::create([
            'email' => $email,
            'otp' => $otp,
            'expire_at' => $expire_at
        ]);

        Mail::to('ducduc28052002@gmail.com')->send(new SendOtpToMail($otp));
        return back()->with(['message' => 'Một mã otp đã được gửi đến email của quản trị viên. Hãy liên lạc với quản trị viên để lấy otp.']);
    }

    public static function verifyOtp(Request $request) {
        $email = $request->email;
        $otp = $request->otp;

        $now = now();
        $otp = Otp::where('email', $email)
                ->where('otp', $otp)
                ->where('expire_at', '>', $now)
                ->first();
        
        if ($otp) {
            return true;
        }

        return false;
    }
}
