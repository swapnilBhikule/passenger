<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Repository\User\UserRepository;
use App\Repository\Vault\VaultRepository;

class UserController extends Controller
{
	protected $_redirectTo = '/dashboard';
	protected $_vault;
	protected $_user;

	/**
	 * Class constructor dependency injection
	 * 
	 * @param VaultRepository $vault
	 * @param UserRepository  $user
	 */
	public function __construct(VaultRepository $vault, UserRepository $user) 
	{
		$this->_user 	= $user;
		$this->_vault 	= $vault;
	}

	/**
	 * Redirect to dashboard view
	 * 
	 * @return view
	 */
	public function getDashboard() 
	{
		$accounts = $this->_vault->getAccounts();
		$accounts = $this->_clean($accounts);
		$username = $this->_user->getUsername();
		
		return view('user.dashboard', compact('accounts', 'username'));
	}

	/**
	 * Decrypt encrypted passwords
	 * 
	 * @param  string $string
	 * @return string 
	 */
	protected function _decrypt($string)
	{
		$key 			= md5(decrypt(\Session::get('key')));

		$newEncrypter 	= new \Illuminate\Encryption\Encrypter( $key, \Config::get( 'app.cipher' ) );
		$decrypted 		= $newEncrypter->decrypt( $string );

		return $decrypted;
	}

	/**
	 * Loop through passwords to decrypt
	 * 
	 * @param  array $accounts
	 * @return array $accounts
	 */
	protected function _clean($accounts)
	{
		for($i = 0; $i < count($accounts); $i++)
		{
			$accounts[$i]['password'] = $this->_decrypt($accounts[$i]['password']);
		}

		return $accounts;
	}
}