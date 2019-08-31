<?php

	Class WashMyCarSeekerVehicleModel extends CI_Model
	{


		private $table = "cwseekervehicle";




		public function insert($data)
		{
			$this->db->insert($this->table, $data);
		}

		public function get_carowner_vehicle($id)
		{
			$this->db->where("seeker_id",$id);
			$data = $this->db->get($this->table);
			return $data->result_array();
		}

		public function update($data, $id)
		{
			$this->db->where('cwsv_id', $id);
			return $this->db->update($this->table, $data);
		}








	}





















?>