<?php namespace App\Http\Controllers\Vault;

use App\Http\Controllers\Controller;

use App\Repository\Vault\VaultRepository;

use App\Http\Requests\AddAccountFormRequest;
use App\Http\Requests\EditAccountFormRequest;
use App\Http\Requests\DeleteAccountFormRequest;

use Auth, Session;

class VaultController extends Controller
{
	protected $_vault;

	public function __construct(VaultRepository $vault)
	{
		$this->_vault = $vault;
	}

	public function postAddAccount(AddAccountFormRequest $request)
	{
		$value 	= $this->_encrypt($request->input('password'));

		return response()->json($this->_vault->addAccount($request->except(['password']), $value));
	}

	public function postDeleteAccount(DeleteAccountFormRequest $request)
	{
		return response()->json($this->_vault->deleteAccount($request->input('id')));
	}

	public function postEditAccount(EditAccountFormRequest $request)
	{
		$value 	= $this->_encrypt($request->input('password'));

		return response()->json($this->_vault->updateAccount($request->except(['password']), $value));
	}

	protected function _encrypt($string)
	{
		$key 			= md5(decrypt(\Session::get('key')));
		$newEncrypter 	= new \Illuminate\Encryption\Encrypter( $key, \Config::get( 'app.cipher' ) );
		$encrypted 		= $newEncrypter->encrypt( $string );

		return $encrypted;
	}
}