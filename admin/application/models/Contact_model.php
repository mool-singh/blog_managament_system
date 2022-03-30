<?php
	class Contact_model extends CI_Model{

		public function add_contact_request($data){
			$this->db->insert('ci_contact_requests', $data);
			return $this->db->insert_id();
		}

		

		public function get_created_by_id($id){
			$query = $this->db->get_where('ci_admin', array('admin_id' => $id));
			return $result = $query->row_array();
		}
		
		
		//---------------------------------------------------
		// get all inquiry for server-side datatable processing (ajax based)
		public function get_all_contact_requests(){

			$SQL ='SELECT * FROM ci_contact_requests ';
			
			
			
				return $this->datatable->LoadJson($SQL);
			
		}

	
		//---------------------------------------------------
		// Get inquiry detial by ID
		public function get_contact_request_by_id($id){
			

			$query = $this->db->get_where('ci_contact_requests', array('contact_request_id' => $id));
			return $result = $query->row_array();
		}



		//---------------------------------------------------
		// get inquirys for csv export
		public function get_requests_for_export(){
			///$this->db->where('is_admin', 0);
			$this->db->select('contact_request_id, contact_request_name, contact_request_email, contact_request_phone,contact_request_message,contact_request_date');
			$this->db->from('ci_contact_requests');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		
		public function addgernalinquery($data){
			$this->db->insert('ci_inquiry', $data);
			return true;
			
		}


	}

?>