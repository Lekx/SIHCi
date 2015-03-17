<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
<<<<<<< HEAD
	
   //LO01 – Inicio de Sesión 
=======
	private $_id;

>>>>>>> 9f71fc758f8fa1d8e08062ce7c4356da9e5c3776
	public function authenticate()
	{
		$user=Users::model()->find("LOWER(email)=?",array(strtolower($this->username)));
		

		if($user==null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(sha1(md5(sha1($this->password)))!==$user->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->_id=$user->id;
<<<<<<< HEAD
			$this->setState('email',$user->email);
			$this->errorCode=self::ERROR_NONE;

=======
			$this->setState("email",$user->email);
			$this->errorCode=self::ERROR_NONE;
>>>>>>> 88f31065013796caa9bf790623c7b19e7c661413
		}
		return !$this->errorCode;

	}
	public function getId()
	{
		return $this->_id;
	}
	public function getId(){
		return $this->_id;
	}
}