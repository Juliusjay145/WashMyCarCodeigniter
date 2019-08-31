<?php

	Class WashMyCarSeekerModel extends CI_Model
	{


		private $table = "cwseekeracc";




		public function insert($data)
		{
			$this->db->insert($this->table, $data);
		}

		public function get_carwash_seeker()
		{
			$data = $this->db->get($this->table);
			return $data->result_array();
		}

		public function get_customercarwashseeker_profile($id)
		{
			$this->db->where("seeker_id", $id);
			$data = $this->db->get($this->table);
			return $data->result_array();
		}

		public function update($data, $id)
		{
			$this->db->where('seeker_id', $id);
			return $this->db->update($this->table, $data);
		}




	}











?>