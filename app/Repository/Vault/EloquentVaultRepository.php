<?php namespace App\Repository\Vault;

use App\Model\Vault;
use Auth;

class EloquentVaultRepository implements VaultRepository
{
	/**
	 * @var App\Model\Vault
	 */
	protected $_vault;

	/**
	 * Class constructor to initialize database connection
	 * 
	 * @param Vault $vault
	 */
	public function __construct(Vault $vault) {
		$this->_vault = $vault;
	}

	/**
	 * Add new account in user's vault
	 * 
	 * @param 	array 	$input
	 * @param 	string 	$password
	 * @return int
	 */
	public function addAccount($input, $password) {
		return $this->_vault->insertGetId([
								'user_id' 		=> Auth::id(),
								'email'   		=> e($input['email']),
								'account_name' 	=> e($input['account']),
								'password' 		=> $password,
								'description' 	=> e($input['description']),
								'website' 		=> e($input['website']),
							]);
	}

	/**
	 * Update user's vault account
	 * 
	 * @param  array 	$input    
	 * @param  string 	$password 
	 * @return boolean
	 */
	public function updateAccount($input, $password) {
		return $this->_vault->where('id', '=', $input['id'])
							->update([
								'email'   		=> e($input['email']),
								'account_name' 	=> e($input['account']),
								'password' 		=> $password,
								'description' 	=> e($input['description']),
								'website' 		=> e($input['website']),
							]);
	}

	/**
	 * Delete particular account from vault
	 * 
	 * @param  int 		$id
	 * @return boolean    
	 */
	public function deleteAccount($id) {
		return $this->_vault->where('id', '=', $id)->delete();
	}

	/**
	 * Get details of specific account of logged in user
	 * 
	 * @param  int 		$id
	 * @return object
	 */
	public function getAccount($id) {
		return $this->_vault->select('account_name', 'email', 'password', 'description', 'website')
							->where('id', '=', $id)
							->where('user_id', '=', Auth::id())
							->first();
	}

	/**
	 * Get details of vault of logged in user
	 * 
	 * @return array
	 */
	public function getAccounts() {
		return $this->_vault->select('id', 'account_name', 'email', 'password', 'description', 'website')
							->where('user_id', '=', Auth::id())
							->get();
	}
}