<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\ActivityLog;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesUsers, ThrottlesLogins;
    protected $redirectAfterLogout = '/auth/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
            ]);

        $user = User::where('username', '=', $request->username)->first();

        if(isset($user)) {
   
        $user->save();
        Auth::attempt(['username' => $request->username, 'password' => $request->password]);
        Auth::login($user);
        $employeeid=Auth::user()->id;
     $logs=ActivityLog::create(['employee_id'=>$employeeid,'activity'=>'User Login','table_affected'=>'employee','primary_key'=>$employeeid]);

}

return redirect('/erp_system')
->withInput($request->only($this->loginUsername(), 'remember'))
->withErrors([
    $this->loginUsername() => $this->getFailedLoginMessage(),
    ]);
}
    public function getLogout()
    {
  $employeeid=Auth::user()->id;
         $logs=ActivityLog::create(['employee_id'=>$employeeid,'activity'=>'User Logout','table_affected'=>'employee','primary_key'=>$employeeid]);
        Auth::logout();
        return redirect('/auth/login');

    }
public function loginUsername()
{
    return property_exists($this, 'username') ? $this->username : 'username';
}

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
