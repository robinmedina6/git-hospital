<?php
if(!function_exists('getUpdateUserRules')){
	function getUpdateUserRules(){
		return array(
			array(
				'field'=>'_id',
				'label'=>'id',
				'rules'=>'required',
				'errors' =>array(
						'required'=> 'El %s es requerido',
				)
				),
				
			array(
				'field'=>'nombre',
				'label'=>'Nombre',
				'rules'=>'required',
				'errors' =>array(
						'required'=> 'El %s es requerido',
				)
				
			),
			array(
					'field'=>'apellido',
					'label'=>'Apellido',
					'rules'=>'required',
					'errors' =>array(
							'required'=> 'El %s es requerido',
					)
			),
			array(
					'field'=>'area',
					'label'=>'Area',
					'rules'=>'required',
					'errors' =>array(
							'required'=> 'El %s es requerido',
					)
			),
			array(
					'field'=>'especialidad',
					'label'=>'especialidad',
					'rules'=>'required',
					'errors' =>array(
							'required'=> 'El %s es requerido',
					)
			),
			array(
					'field'=>'cedula',
					'label'=>'Cedula',
					'rules'=>'required',
					'errors' =>array(
							'required'=> 'El %s es requerido',
					)
			)
		);
	}
}

if(!function_exists('getCreateUserRules')){
	function getCreateUserRules(){
		return array(
			array(
					'field'=>'user',
					'label'=>'Usuario',
					'rules'=>'required|max_length[100]',
					'errors' =>array(
							'required'=> 'El %s es requerido',
							'max_length'=>'el %s  es demaciado grande'
					)
			),
			array(
					'field'=>'correo',
					'label'=>'correo',
					'rules'=>'required|valid_email',
					'errors' =>array(
							'required'=> 'El %s es requerido',
							'valid_email'=> 'El %s no es valido'
					)
			),
			array(
					'field'=>'range',
					'label'=>'Rango',
					'rules'=>'required',
					'errors' =>array(
							'required'=> 'El %s es requerido',
					)
			),
			array(
					'field'=>'name',
					'label'=>'Nombre',
					'rules'=>'required',
					'errors' =>array(
							'required'=> 'El %s es requerido',
					)
			),
			array(
					'field'=>'lastname',
					'label'=>'Apellido',
					'rules'=>'required',
					'errors' =>array(
							'required'=> 'El %s es requerido',
					)
			),
			array(
					'field'=>'area',
					'label'=>'Area',
					'rules'=>'required',
					'errors' =>array(
							'required'=> 'El %s es requerido',
					)
			),
			array(
					'field'=>'especialidad',
					'label'=>'especialidad',
					'rules'=>'required',
					'errors' =>array(
							'required'=> 'El %s es requerido',
					)
			),
			array(
					'field'=>'cedula',
					'label'=>'Cedula',
					'rules'=>'required',
					'errors' =>array(
							'required'=> 'El %s es requerido',
					)
			),
				
		);
	}
}

?>