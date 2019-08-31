<?php

	Class WashMyCarSeekerBookingModel extends CI_Model
	{


		private $table = "cwowner_booking";




		public function insert($data)
		{
			$this->db->insert($this->table, $data);
		}














	}



























?>