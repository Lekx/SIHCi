<?php

	
	class RecoveryPassword extends CFormModel{
		
		public $email;
		
		public function rules(){
			return array(
				array(
					'email',
					'required',
					'message' => 'El campo es requerido',
					),
				array(
					'email',
					'email',
					'message' => 'Formato de email incorrecto',
					),
				);
		}

		public function attributeLabels(){
			return array(
				'email' => 'Email',
				);
		}
	}
	

?>