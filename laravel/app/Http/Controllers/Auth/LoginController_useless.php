<?php

namespace App\Http\Controllers\Auth;

use App\general_settings_model;
use App\Http\Controllers\Controller;
use App\parents_info_model;
use App\students;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $general_settings = general_settings_model::first();
        return view('index', ['general_settings' => $general_settings]);
    }

    public function showTeacherLoginForm()
    {
        if (Auth::check()) {
            return redirect(url('home'));
        } else {
            $general_settings = general_settings_model::first();
            return view('login.teacher_login', ['general_settings' => $general_settings]);
        }
    }

    public function showStudentLoginForm()
    {
        $user_auth_check = Session::get('student_or_parents_login');
        if ($user_auth_check == 'Loggedin') {
            return redirect(url('Student_dashboard'));
        } else {
            $general_settings = general_settings_model::first();
            return view('login.student_login', ['general_settings' => $general_settings]);
        }
    }

    public function showParentLoginForm()
    {
        $general_settings = general_settings_model::first();
        return view('login.parent_login', ['general_settings' => $general_settings]);
    }

    public function user_check(Request $request)
    {
        if ($request->user_type == "Software User") {
            if (Auth::attempt(['email' => $request->user_name, 'password' => $request->passsword, 'status' => 'Active'])) {
                // Authentication passed...

                Session::put('school', general_settings_model::first());
                return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
            } else {
                return Redirect::back()->withErrors(['login_error' => 'Invaild User .Please Check User Name & Password']);
            }
        } elseif ($request->user_type == "Student") {
            $email_check = students::where('email', $request->user_name)->first();
            if ($email_check) {
                $check_password = students::where('email', $request->user_name)->where('password', Hash::check($email_check->password, $request->password))->first();
                if ($check_password) {

                    Session::put('student_or_parents_login', 'Loggedin');
                    Session::put('student_details', $email_check);
                    Session::put('user_type', 'Student');
                    Session::put('roll', $check_password->roll);
                    Session::put('class', $check_password->class);

                    return redirect('/Student_dashboard');
                } else {
                    return Redirect::back()->withErrors(['login_error' => 'Invlid Password Please Check It again']);
                }
            } else {
                return Redirect::back()->withErrors(['login_error' => 'Invaild User .Please Check User Name & Password']);
            }
        } elseif ($request->user_type == "Parent") {
            $email_check = parents_info_model::where('email', $request->user_name)->first();
            if ($email_check) {
                $check_password = parents_info_model::where('email', $request->user_name)->where('password', Hash::check($email_check->password, $request->password))->first();
                if ($check_password) {

                    Session::put('student_or_parents_login', 'Loggedin');
                    Session::put('student_details', $email_check);
                    Session::put('user_type', 'Parents');

                    return redirect('/Student_dashboard');
                } else {
                    return Redirect::back()->withErrors(['login_error' => 'Invlid Password Please Check It again']);
                }
            } else {
                return Redirect::back()->withErrors(['login_error' => 'Invaild User .Please Check User Name & Password']);
            }
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        if ($request->input('panel') == 'teacher') {
            return redirect('/teacher');
        } else {
            return redirect('/student');
        }
    }
}
