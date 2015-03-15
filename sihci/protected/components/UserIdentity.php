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
	private $_id;

	public function authenticate()
	{
		$user=Users::model()->find("LOWER(email)=?",array(strtolower($this->username)));
		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);*/

/*		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;*/

		if($user==null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($this->password!==$user->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		// else if($user->status=="inactivo")
		// 	 echo"<script>alert('debe ser activo, porfavor revisa tu correo')</script>";
			 // throw new Exception("su sesion ha caducado.");
		else{
			$this->_id=$user->id;
<<<<<<< HEAD
			$this->setState('email',$user->email);
			$this->errorCode=self::ERROR_NONE;

=======
			$this->setState("email",$user->email);
			// Yii::app()->user->email;
			// Yii::app()->user->
			// Yii::app()->user->getState("email");
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