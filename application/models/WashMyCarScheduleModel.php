<?php

	Class WashMyCarScheduleModel extends CI_Model
	{


		private $table = "cwschedule";




		public function get_schdule($id)
		{
			$this->db->where("station_id",$id);
			$data = $this->db->get($this->table);
			return $data->result_array();
		}

		public function update($data, $id)
		{
			$this->db->where('schedule_id', $id);
			return $this->db->update($this->table, $data);
		}














	}


























?>