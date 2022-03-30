<?php
	class Dashboard_model extends CI_Model{

		public function get_all_users(){

			return $this->db->count_all('ci_users');
		}

		public function get_all_categories()
		{
			$this->db->where('is_active', 1);
			return $this->db->count_all_results('ci_tour_categories');
		}

		public function get_services()
		{
			$this->db->where('is_active', 1);
			return $this->db->count_all_results('ci_services');
		}

		public function get_packages()
		{
			$this->db->where('is_active', 1);
			return $this->db->count_all_results('ci_tour_package');
		}

		public function get_blogs()
		{
			$this->db->where('is_active', 1);
			return $this->db->count_all_results('ci_blogs');
		}

		//--------------------------------------------------------------
		public function get_active_users(){

			$this->db->where('is_active', 1);
			return $this->db->count_all_results('ci_users');
		}

		//--------------------------------------------------------------
		public function get_deactive_users(){

			$this->db->where('is_active', 0);
			return $this->db->count_all_results('ci_users');
		}

		//--------------------------------------------------------------
		public function get_subadmin_users(){

			$this->db->where('is_active', 1);
			$this->db->where('admin_role_id', 0);
			return $this->db->count_all_results('ci_admin');
		}
	}

?>
