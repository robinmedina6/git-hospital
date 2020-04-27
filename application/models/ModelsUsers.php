<?php
class ModelsUsers extends CI_Model {
	function __construct(){
		$this->load->database();
		
	}	
	public function save($user, $user_info){
		$this->db->trans_start();
			$this->db->insert('usuario',$user);
			$user_info['id_usuario']=$this->db->insert_id();
			$this->db->insert('medico',$user_info);
		$this->db->trans_complete();
		return !$this->db->trans_status()? false : true;
	} 
	public function getUsers(){
		$sql=$this->db->order_by('id','DESC')->get('usuario');
		return $sql->result();
	}
	public function getPaginate($limit,$offset){
		$sql=$this->db->order_by('id','DESC')->get('usuario',$limit,$offset);
		return $sql->result();


	}
	public function getUser($id){
		/*haciendo el join
		SELECT *
		FROM usuario
		JOIN medico
			ON usuario.id=medico.id_usuario
		WHERE usuario.id=$id LIMIT 1
		*/
		$this->db->join('medico','usuario.id = medico.id_usuario');
		$user=$this->db->get_where('usuario',array('usuario.id'=>$id),1);
		return $user->row_array();
	}
}
?>