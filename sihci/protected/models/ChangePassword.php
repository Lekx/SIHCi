<?php

	
	class ChangePassword extends CFormModel{
		
		public $password;
		public $password2;
		public function rules(){
			return array(
				array('password2', 'compare', 'compareAttribute' => 'password'),
				array('password', 'required'),
				array('password2', 'required'),
				);
		}

		public function attributeLabels(){
			return array(
				'password' => 'New Password',
				'password2' => 'New Password again'
				);
		}
	}
	

?>