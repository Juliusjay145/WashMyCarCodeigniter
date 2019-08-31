<?php

	Class WashMyCarServiceStationModel extends CI_Model
	{


		private $table = "cwowner_services";




		public function get_carwashstation_service($id)
		{
			$this->db->where("station_id",$id);
			$data = $this->db->get($this->table);
			return $data->result_array();
		}











	}














?>