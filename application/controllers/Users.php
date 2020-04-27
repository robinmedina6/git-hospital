<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//$this->load->library(array('session'));	
		$this->load->library(array('form_validation','email','pagination'));
		$this->load->helper(array('users/user_rules','string'));
		$this->load->model('ModelsUsers');
	}
	public function create(){
			$vista=$this->load->view('admin/create_users','',true);
			$this->getTemplate($vista);
	}
	public function update(){
		//echo $this->input->post('nombre') ;
		$this->form_validation->set_rules(getUpdateUserRules());
		if ($this->form_validation->run()==false){
			
			$vista=$this->load->view('admin/edit_user','',true);
			$this->getTemplate($vista);
		}else{
			show_404();
		}


		//$vista=$this->load->view('admin/create_users','',true);
		//$this->getTemplate($vista);

}
	public function index($offset = 0){
		$data=$this->ModelsUsers->getUsers();
		$config['base_url']=base_url('index.php/users/index');
		$config['per_page']= 5;
		$config['total_rows']=count($data);
		$config['full_tag_open']='<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']='</ul></nav></div>';
		$config['num_tag_open']='<li class="page-item"><span class="page-link">';
		$config['num_tag_close']='</span></li>';
		$config['cur_tag_open']='<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']='<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']='<li class="page-item"><span class="page-link"> ';
		$config['next_tag_close']='<span aria-hidden="true"></span></span></li>';
		$config['prev_tag_open']='<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']='</span></li>';
		$config['first_tag_open']='<li class="page-item"><span class="page-link">';
		$config['first_tag_close']='</span></li>';
		$config['last_tag_open']='<li class="page-item"><span class="page-link">';
		$config['last_tag_close']='</span></li>';
		//var_dump($data);
		$this->pagination->initialize($config);
		$page = $this->ModelsUsers->getPaginate($config['per_page'],$offset);
		$this->getTemplate($this->load->view('admin/show_users',array('data'=>$page),true));

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
	public function edit($id=0){
		$user= $this->ModelsUsers->getUser($id);
		$vista = $this->load->view('admin/edit_user',array('user'=>$user),true);
		$this->getTemplate($vista);

	}
	
}

?>
