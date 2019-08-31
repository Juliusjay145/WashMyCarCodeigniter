<?php

	Class WashMyCarStationModel extends CI_Model
	{


		private $table = "cwowner_station";




		public function get_carwash_owner()
		{
			$data = $this->db->get($this->table);
			return $data->result_array();
		}

		public function get_customercarwashowner_profile($id)
		{
			$this->db->where("station_id", $id);
			$data = $this->db->get($this->table);
			return $data->result_array();
		}












	}



















?>