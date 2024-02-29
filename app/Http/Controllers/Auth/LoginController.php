<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\PasswordReset;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notifications;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\App;
use App\Jobs\SendForgetPasswordEmail;
use Illuminate\Support\Facades\Config;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
public function changeLanguage($lang)
{
    Session::put('locale', $lang);
    App::setLocale($lang);

    return redirect()->back();
}
    public function login(\Illuminate\Http\Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = Auth::user();

            if (auth()->user()->role == 'admin') {

                return redirect()->route('admin.home');
            }else if (auth()->user()->role == 'teacher') {

                return redirect('teacher/home');
            }else{

                return redirect()->route('home');
            }
        }else{

            return redirect()->route('login')
                ->with('error',trans('lang.Email-Address Or Password Are Wrong_'));
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
public function forgetPasswordLoad()
{
    return view('forget-password');
}

public function forgetPassword(Request $request)
{
    try {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            SendForgetPasswordEmail::dispatch($request->email);

            return back()->with('success', trans('lang.Please check your mail to reset your password_'));
        } else {
            return back()->with('error', trans('lang.Email is not exists_'));
        }

    } catch (\Exception $e) {
        return back()->with('error', $e->getMessage());
    }
}
public function resetPasswordLoad(Request $request)
{
    $resetData = PasswordReset::where('token', $request->token)->first();

    if ($resetData) {
        $user = User::where('email', $resetData->email)->first();

        if ($user) {
            return view('resetPassword', compact('user'));
        }
    }

    return view('404');
}

public function resetPassword(Request $request)
{
    $request->validate([
        'id' => 'required',
        'password' => 'required|string|min:6|confirmed'
    ]);

    $user = User::find($request->id);

    if ($user) {

        $user->password = Hash::make($request->password);
        $user->save();
        PasswordReset::where('email', $user->email)->delete();

        return "<h2>" . trans('lang.Your password has been reset successfully_') . "</h2>";

    } else {
        return "<h2>" . trans('lang.User not found_') . "</h2>";

    }
}
}
