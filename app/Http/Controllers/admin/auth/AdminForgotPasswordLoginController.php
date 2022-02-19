<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Auth ;
class AdminForgotPasswordLoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function ShowEmailForm()
    {
        return view('admin.passwords.forgot-password');
    }

    protected function guard()
    {
            return Auth::guard('admin');
    }

    protected function broker() : \Illuminate\Contracts\Auth\PasswordBroker
    {
    return Password::broker('admins');
    }

    public function sendLinkEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

  
        $status = $this->broker()->sendResetLink(
            $request->only('email')
        );
        return $status == Password::RESET_LINK_SENT
                    ? redirect()->back()->with(['status'=> 'تم ارساله رابط التحقق الي البريد الالكتروني الذي ادخلته' ])
                    : redirect()->back()->withInput($request->only('email'))
                            ->with(['error' => 'البريد الالكتروني غير موجود']);
    }
}
