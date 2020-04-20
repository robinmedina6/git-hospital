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
}
?>