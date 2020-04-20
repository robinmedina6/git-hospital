<?php
function getLoginRules(){
	return array(
		array(
				'field'=>'email',
				'label'=>'Correo',
				'rules'=>'required|trim',
				'errors' =>array(
						'required'=> 'El %s es requerido'
				)
		),
		array(
				'field'=>'password',
				'label'=>'contraseña',
				'rules'=>'required',
				'errors' =>array(
						'required'=> 'El %s es requerido'
				)
		)		
	);
}
?>