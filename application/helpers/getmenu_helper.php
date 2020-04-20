<?php


function main_menu(){
	
	return array(
		array(
			'title'=>'Login',
			'url'=>base_url('index.php/login'),
		),
		array(
			'title'=>'Registro',
			'url'=>base_url('index.php/registro'),
		)
	);
}

?>