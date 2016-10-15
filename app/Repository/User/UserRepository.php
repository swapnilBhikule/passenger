<?php namespace App\Repository\User;

interface UserRepository
{
	/**
	 * Add new user to database
	 * 
	 * @param 	array $input
	 * @return  int 
	 */
	public function addUser($input);

	/**
	 * Update user's profile
	 * 
	 * @param  array $input
	 * @return boolean
	 */
	public function updateUser($input);

	/**
	 * Delete logged in user
	 * 
	 * @return boolean
	 */
	public function deleteUser();

	/**
	 * Get username of currently logged in user
	 * 
	 * @return object
	 */
	public function getUsername();
}