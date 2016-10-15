<?php namespace App\Repository\Vault;

interface VaultRepository
{
	/**
	 * Add new account in user's vault
	 * 
	 * @param 	array 	$input
	 * @param 	string 	$password
	 * @return int
	 */
	public function addAccount($input, $password);

	/**
	 * Update user's vault account
	 * 
	 * @param  array 	$input    
	 * @param  string 	$password 
	 * @return boolean
	 */
	public function updateAccount($input, $password);

	/**
	 * Delete particular account from vault
	 * 
	 * @param  int 		$id
	 * @return boolean    
	 */
	public function deleteAccount($id);

	/**
	 * Get details of specific account of logged in user
	 * 
	 * @param  int 		$id
	 * @return object
	 */
	public function getAccount($id);

	/**
	 * Get details of vault of logged in user
	 * 
	 * @return array
	 */
	public function getAccounts();
}