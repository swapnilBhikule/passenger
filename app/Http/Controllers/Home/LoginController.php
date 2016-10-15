<?php namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\SignInFormRequest;

use Auth;

class LoginController extends Controller
{

	protected $_redirectTo = '/dashboard';

	public function __construct() {
		//
	}

	/**
	 * Display home page
	 * 
	 * @return view auth.index
	 */
	public function getSignIn() {
		return view('auth.index', ['tab' => 'signin']);
	}

	/**
	 * Sign in form submit
	 * 
	 * @param  SignInFormRequest $request
	 * @return view  			 user.index           
	 */
	public function postSignIn(SignInFormRequest $request) {
		if($this->_authenticate($request)) {
			$password = encrypt($request->input('password'));
			$request->session()->put('key', $password);
			return redirect()->intended($this->_redirectTo);
		}

		return redirect()->back()
				->withInput()
				->with('signin-data', 'Username or password is incorrect.');
	}

	public function getLogout(Request $request) 
	{
		Auth::logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
	}

	/**
	 * Authenticate user
	 * 
	 * @param  object $request
	 * @return boolean          
	 */
	protected function _authenticate($request) {
		return Auth::attempt([
					'username' => $request->input('sign-in-username'), 
					'password' => $request->input('sign-in-password')
				], $request->has('signin-remember_me'));
	}
}