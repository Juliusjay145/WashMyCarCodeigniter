<?php

	Class WashMyCarSeekerBookingModel extends CI_Model
	{


		private $table = "cwowner_booking";




		public function insert($data)
		{
			$this->db->insert($this->table, $data);
		}

		public function get_seeker_details($id)
		{
			$this->db->where("seeker_id",$id);
			$data = $this->db->get($this->table);
			return $data->result_array();
		}

















	}



























?>