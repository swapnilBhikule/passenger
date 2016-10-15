<?php namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use App\Http\Requests\SignUpFormRequest;

use App\Repository\User\UserRepository;

use Auth;

class RegisterController extends Controller 
{
	protected $_user;
	protected $_redirectTo = '/dashboard';

	/**
	 * Initialize model for database queries
	 * 
	 * @param UserRepository $user
	 */
	public function __construct(UserRepository $user) {
		$this->_user = $user;
	}

	/**
	 * Display sign up form(home page)
	 * 
	 * @return view auth.index
	 */
	public function getSignUp() {
		return view('auth.index', ['tab' => 'signup']);
	}

	/**
	 * Submit sign up form
	 * 
	 * @param  SignUpFormRequest $request
	 * @return view              user.index
	 */	
	public function postSignUp(SignUpFormRequest $request) {
		$id = $this->_user->addUser($request->all());

		if($id) {
			Auth::loginUsingId($id);
			$password = encrypt($request->input('password'));
			$request->session()->put('key', $password);
			return redirect()->intended($this->_redirectTo);
		}

		return redirect()->back()
				->with('signup-data', 'Sorry, something went wrong. We were uable to create new account.');
	}
}