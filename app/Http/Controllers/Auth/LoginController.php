<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
      
        
    }
        public function login(Request $request)

    {   $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    $web=Auth::guard('web')->attempt(array('email' => $input['email'], 'password' => $input['password']));
  
    $faculty=Auth::guard('faculty')->attempt(array('email' => $input['email'], 'password' => $input['password']));
 
  if(!$faculty)
        {  $role=auth()->user()->roles->pluck('id');
          if ($role == "1") {
            return redirect()->route('dashboard');
            }elseif($role == "2"){
            return redirect('student/dashboard'); }
           } elseif ($faculty){ 
              return redirect('pages');
           } return redirect()->back()->withInput($request->only('email', 'remember'));
        } 
}
