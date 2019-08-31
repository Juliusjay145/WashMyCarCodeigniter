<?php

	Class WashMyCarStationWashBoyModel extends CI_Model
	{


		private $table = "cwowner_employee";




		public function get_washboy($id)
		{
			$this->db->where("station_id",$id);
			$data = $this->db->get($this->table);
			return $data->result_array();
		}














	}
















?>