<?php

	
	class ChangePassword extends CFormModel{
		
		public $password;
		public $password2;
		public function rules(){
			return array(
				array('password', 'compare', 'compareAttribute' => 'password2'),
				
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