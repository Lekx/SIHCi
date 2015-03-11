<?php

	
	class ChangePassword extends CFormModel{
		
		public $password;
		public $password2;
		public function rules(){
			return array(
				array('password2', 'compare', 'compareAttribute' => 'password'),
				array('password', 'required'),
				array('password2', 'required'),
				array('password','length', 'min'=>6, 'max'=>300),
				array('password2','length', 'min'=>6, 'max'=>300),
				);
		}

		public function attributeLabels(){
			return array(
				'password' => 'Contraseña Nueva',
				'password2' => 'Confirme Contraseña'
				);
		}
	}
	

?>

