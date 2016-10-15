<?php namespace App\Repository\User;

use App\Model\User;
use Auth, Hash;

class EloquentUserRepository implements UserRepository
{
	/**
	 * @var App\Model\User
	 */
	protected $_user;

	/**
	 * Class constructor to initialize database connection
	 * 
	 * @param User $user
	 */
	public function __construct(User $user) {
		$this->_user = $user;
	}

	/**
	 * Add new user to database
	 * 
	 * @param 	array $input
	 * @return  int 
	 */
	public function addUser($input) {
		return $this->_user->insertGetId([
								'username' 		=> e($input['username']),
								'email'    		=> e($input['email']),
								'password' 		=> Hash::make($input['password']),
								'created_at' 	=> date('Y-m-d H:i:s', time())
							]);
	}

	/**
	 * Update user's profile
	 * 
	 * @param  array $input
	 * @return boolean
	 */
	public function updateUser($input) {
		$user = $this->user->find(Auth::id());

		if(array_key_exists('username', $input)) {
			$user->username = e($input['username']);
		}
		if(array_key_exists('email', $input)) {
			$user->email = e($input['email']);
		}

		return $user->save();
	}

	/**
	 * Delete logged in user
	 * 
	 * @return boolean
	 */
	public function deleteUser() {
		return $this->_user->where('id', '=', Auth::id())->delete();
	}

	/**
	 * Get username of currently logged in user
	 * 
	 * @return object
	 */
	public function getUsername()
	{
		return $this->_user->select('username')
							->where('id', '=', Auth::id())
							->first();
	}
}