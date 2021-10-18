<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Laravel\Socialite\Facades\Socialite;

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
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        session(['url.intended' => url()->previous()]);

        return view('frontend.auth.login');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegisterForm()
    {
        session(['url.intended' => url()->previous()]);

        return view('frontend.auth.register');
    }

        /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|min:8|string',
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'phone';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request, User $user)
    {
        // update user->status to 0 just before logout
        $user = User::find(Auth::id());
        $user->status = '0';
        $user->save();

        $this->guard()->logout();

        /***  to prevent admin/user logout to logout both admin and user at the same time ***/
        // $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

        /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {

        // update user->status to 1 after login
        $user = User::find(Auth::id());
        $user->status = '1';
        $user->save();

        if ($request->ajax()){

            return response()->json([
                'auth' => auth()->check(),
                'route' => route('customer.profile'),
            ]);
    
        } else return redirect()->route('view.cart');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $check = User::where('email', $user->email)->first();

        if ($check) {
            Auth::login($check);
            $this->authenticatedSocial();
            // return redirect()->intended($this->redirectPath());
            return redirect()->route('customer.profile');
        } else {
            $data = new User();
            $data->name = $user->name;
            $data->email = $user->email;
            $data->image = $user->avatar;
            $data->password= bcrypt(uniqid());
            $data->save();
            Auth::login($data);
            $this->authenticatedSocial();
            // return redirect()->intended($this->redirectPath());
            return redirect()->route('customer.profile');
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        try{
            $user = Socialite::driver('facebook')->user();
            // dd($user);
            if($user->email){
                $check = User::where('email', $user->email)->first();
            }else{
                $check = User::where('fb_id', $user->id)->first();
            }
            
            if ($check) {
                Auth::login($check);
                $this->authenticatedSocial();
                // return redirect()->intended($this->redirectPath());
                return redirect()->route('customer.profile');
            } else {
                
                    $data = new User();
                    $data->name = $user->name;
                    $data->email = $user->email;
                    $data->image = $user->avatar;
                    $data->password= bcrypt(uniqid());
                    $data->save();
                    Auth::login($data);
                    $this->authenticatedSocial();
                
                
                
                
                // $data = new User();
                // $data->name = $user->name;
                // $data->email = $user->email;
                // $data->fb_id = $user->id;
                // $data->image = $user->avatar;
                // $data->password= bcrypt(uniqid());
                // $data->save();
                // Auth::login($data);
                // $this->authenticatedSocial();
                // return redirect()->intended($this->redirectPath());
                return redirect()->route('customer.profile'); 
            }
        }catch(Exception $e){
            return '/badhon';
           // return redirect()->intended($this->redirectPath());
        }
    }

            // -----------------------------------------------------------
        /**
         * The user has been authenticated by soicialite
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  mixed  $user
         * @return mixed
         */
        protected function authenticatedSocial()
        {
            $user = User::where('id', Auth::id())->first();
            $user->status = '1';
            $user->save();
        }

        /**
         * Send the response after the user was authenticated.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
         */
        protected function sendLoginResponse(Request $request)
        {
            $request->session()->regenerate();

            $this->clearLoginAttempts($request);

            if ($response = $this->authenticated($request, $this->guard()->user())) {
                return $response;
            }

            return $request->wantsJson()
                        ? new JsonResponse([], 204)
                        // : redirect()->intended($this->redirectPath());
                        : null;
        }


}
