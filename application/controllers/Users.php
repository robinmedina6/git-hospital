<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//$this->load->library(array('session'));	
		$this->load->library(array('form_validation','email'));
		$this->load->helper(array('users/user_rules','string'));
		$this->load->model('ModelsUsers');
	}
	public function create(){
			$vista=$this->load->view('admin/create_users','',true);
			$this->getTemplate($vista);
	}
	public function index(){
		 $vista=$this->load->view('admin/show_users','',true);
			$this->getTemplate($vista);
	}
	public function sendEmail($data){
			$this->load->library('email');
			$this->email->from('sistema@hospidev.com', 'Hospidev');
			$this->email->to($data['correo']);			
			$this->email->subject('Datos de Cuenta');
			$vista=$this->load->view('emails/welcome.php',$data,true);
			$this->email->message($vista.'Testing the email class.');
			
			$this->email->send();
		
		}
	public function store(){
			$user=$this->input->post('user');
			$correo=$this->input->post('correo');
			$range=$this->input->post('range');
			$name=$this->input->post('name');
			$lastname=$this->input->post('lastname');
			$area=$this->input->post('area');
			$especialidad=$this->input->post('especialidad');
			$cedula=$this->input->post('cedula');
			
			$this->form_validation->set_rules(getCreateUserRules());
			if($this->form_validation->run()==false){
				$this->output->set_status_header(400);
			}else{
				//.....
				$user=array(
					'nombre_usuario'=>$user,
					'contrasena'=>random_string('alnum',8),
					'correo'=>$correo,
					'range'=>$range,
					'status'=>1,					
				);
				$user_info=array(
					'nombre'=> $name,
					'apellido'=>$lastname,
					'cedula'=>$cedula,
					'especialidad'=>$especialidad,
					'area'=>$area,
				);
				
				if(!$this->ModelsUsers->save($user,$user_info)){
					$this->output->set_status_header(500);
				}else{
					$this->sendEmail($user);
					$this->session->set_flashdata('msg','el usuario ha sido registrado');
					redirect(base_url('index.php/users'));
				}
			}
			$vista=$this->load->view('admin/create_users','',TRUE);
			$this->getTemplate($vista);
			
		}
	public function getTemplate($view){
		$data=(array(
					'head'=>$this->load->view('layout/head','',TRUE),
					'nav'=>$this->load->view('layout/nav','',TRUE),
					'aside'=>$this->load->view('layout/aside','',TRUE),
					'footer'=>$this->load->view('layout/footer','',TRUE),
					'content'=>$view,
					//'content'=>$head,
			));
			$this->load->view('dashboard',$data);
	}
	
}

?>
