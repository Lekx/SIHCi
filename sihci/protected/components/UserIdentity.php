<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

   //LO01 – Inicio de Sesión 

	private $_id;
	private $_role;



	public function authenticate()
	{
		$user=Users::model()->find("LOWER(email)=?",array(strtolower($this->username)));

		if($user==null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(sha1(md5(sha1($this->password)))!==$user->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->_id=$user->id;
			$this->setState('email',$user->email);
			$this->setState('id_roles',$user->id_roles); //obtiene id del rol del usuario
			$this->setState('fullname', $user->persons[0]['names'].' '.$user->persons[0]['last_name1'].' '.$user->persons[0]['last_name2']);
			$this->setState('type', $user->type);

			// $permisosObj = permissionRoles::model()->findAllByAttributes(array("id_role"=>$user->id_roles));
			// $permisosArr = array();

			// foreach($permisosObj as $valor)
			// 	$permisosArr[Modulos::model()->findByPk($valor["id_modulo"])->nombre] = $valor["permisos"];

			// $this->setState("permisos",$permisosArr);




			// $this->setState("datosPersonales",strtoupper( substr($empleado->nombres,0,6)." ".$empleado->ap_pat." (".Roles::model()->findByPk($user->id_rol)->nombre.")"));
			// $this->setState("areaPuesto",strtoupper(Puestos::model()->findByPk(AreasPuestos::model()->findByPk($empleado->id_area_puesto)->id_puesto)->nombre." EN EL ÁREA DE ".Areas::model()->findByPk(AreasPuestos::model()->findByPk($empleado->id_area_puesto)->id_area)->nombre));
	
			$this->errorCode=self::ERROR_NONE;
			
		}
		return !$this->errorCode;

	}
	public function getId()
	{
		return $this->_id;
	}
	

}



