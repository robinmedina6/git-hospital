<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Registro extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('getmenu'));
		$this->load->database();//se va a cargar en el modelo
		#$this->load->library('input'); //viene integrada
		$this->load->model('Users');
		$this->load->library(array('form_validation'));
	}
	public function index(){
		$data['menu']=main_menu();
		$this->load->view('registro',$data);
		$query= $this->db->get('usuario');
		//var_dump($query->result());
		
	}
	public function create(){
		$username= $this->input->post('username');
		$email= $this->input->post('email');
		$password= $this->input->post('password');
		$password_confirm= $this->input->post('pasword_confirm');
		echo $username . $email . $password .$password_confirm;
		$datos=array(
			'nombre_usuario'=>$username,
			'correo'=>$email,
			'contrasena'=>$password
		);
		
		$config = array(
			  array(
					  'field' => 'username',
					  'label' => 'Nombre Usuario',
					  'rules' => 'required|alpha_numeric',
					  'errors'=> array(
								  'required'=>'El %s es invalido'
					              ),
			  ),	
			  array(
					  'field' => 'email',
					  'label' => 'Email',
					  'rules' => 'required|valid_email',
					  'errors'=> array(
								  'required'=>'El %s es invalido'
					  ),
			  ),
		);

		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() == FALSE){
			$data['menu']=main_menu();
        	$this->load->view('registro',$data);
		}else{
        	$data['menu']=main_menu();
			if(!$this->Users->create($datos)){
				$data['msg']="ocurrion un error al insertar los datos";
				$this->load->view('registro',$data);
			}else{
				$data['msg']="registrado correctamente";
				$this->load->view('registro',$data);
			}		
        }
		
		
		
	}
}
