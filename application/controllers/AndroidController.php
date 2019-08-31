<?php

	Class AndroidController extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('WashMyCarSeekerModel');
			$this->load->model('WashMyCarStationModel');
			$this->load->model('WashMyCarServiceStationModel');

			$this->load->model('WashMyCarSeekerVehicleModel');
			$this->load->model('WashMyCarStationWashBoyModel');
			$this->load->model('WashMyCarSeekerBookingModel');
			$this->load->model('WashMyCarScheduleModel');
		}


		public function get_carwashseeker()
		{
			$data = $this->WashMyCarSeekerModel->get_carwash_seeker();
			echo json_encode(array('cwseekeracc' => $data));
		}

		public function get_carwash_station()
		{
			$data = $this->WashMyCarStationModel->get_carwash_owner();
			echo json_encode(array('cwseekeracc' => $data));
		}

		public function get_profile_carwashseeker()
		{
			$id = $this->uri->segment(3);
			$data = $this->WashMyCarSeekerModel->get_customercarwashseeker_profile($id);
			echo json_encode(array('cwseekeracc' => $data ));
		}


		public function get_profile_carwashowner()
		{
			$id = $this->uri->segment(3);
			$data = $this->WashMyCarStationModel->get_customercarwashowner_profile($id);
			echo json_encode(array('cwowner_station' => $data ));
		}

		public function get_service()
		{
			$id = $this->uri->segment(3);
			$data = $this->WashMyCarServiceStationModel->get_carwashstation_service($id);
			echo json_encode(array('cwowner_services' => $data ));
		}

		public function get_schedule() //schedule sa station
		{
			$id = $this->uri->segment(3);
			$data = $this->WashMyCarScheduleModel->get_schdule($id);
			echo json_encode(array('cwschedule' => $data ));
		}

		public function get_vehicle_owner()
		{
			$id = $this->uri->segment(3);
			$data = $this->WashMyCarSeekerVehicleModel->get_carowner_vehicle($id);
			echo json_encode(array('cwseekervehicle' => $data ));
		}

		public function get_washboy()
		{
			$id = $this->uri->segment(3);
			$data = $this->WashMyCarStationWashBoyModel->get_washboy($id);
			echo json_encode(array('cwowner_washboy' => $data ));
		}



		public function register() // register sa mobile
		{

			$image = $this->input->post('seeker_image'); 
			$path = "http://192.168.43.19/washmycar/upload/". $image;

			$add = array(


				'seeker_name' => $this->input->post('seeker_name'),
				'seeker_email' => $this->input->post('seeker_email'),
				'seeker_password' => $this->input->post('seeker_password'),
				'seeker_telephone' => $this->input->post('seeker_telephone'),
				'seeker_address' => $this->input->post('seeker_address'),
				'seeker_image' => $image
			);

			$this->WashMyCarSeekerModel->insert($add);
		}

		public function add_vehicle() //add vehicle sa carwash seeker
		{

			$image = $this->input->post('image_vehicle'); 
			$path = "http://192.168.43.19/washmycar/upload/". $image;

			$add = array(

				'seeker_id' => $this->input->post('seeker_id'),
				'cwsv_plateno' => $this->input->post('plate_number'),
				'cwsv_brand' => $this->input->post('brand_name'),
				'cwsv_model' => $this->input->post('model'),
				'cwsv_color' => $this->input->post('color'),
				'cwsv_type' => $this->input->post('vehicle_type'),
				'image_vehicle' => $image




			);

			$this->WashMyCarSeekerVehicleModel->insert($add);
		}


		

		public function booking() //add vehicle sa carwash seeker
		{

			$add = array(


				'station_id' => $this->input->post('station_id'),
				'seeker_id' => $this->input->post('seeker_id'),
				'cwsv_id' => $this->input->post('cwsv_id'),
				'service_id' => $this->input->post('service_id'),
				'seeker_about' => $this->input->post('seeker_about'),
				'seeker_date' => $this->input->post('seeker_date'),
				'seeker_time' => $this->input->post('seeker_time'),
				'seeker_name' => $this->input->post('seeker_name'),
				'service_name' => $this->input->post('service_name'),
				'washboy_name' => $this->input->post('washboy_name'),
				'station_name' => $this->input->post('station_name')
			);


			$this->WashMyCarSeekerBookingModel->insert($add);

			

		}

		public function schedule_update()
		{
			$id = $this->uri->segment(3);
			$data = array(

				// 'seeker_date' => $this->input->post('seeker_date'),
				// 'seeker_time' => $this->input->post('seeker_time'),
				'status' => 'Occupied'

			);


			$this->WashMyCarScheduleModel->update($data, $id);
		}

		public function seeker_update()
		{
			$id = $this->uri->segment(3);
			$data = array(

				'seeker_name' => $this->input->post('seeker_name'),
				'seeker_email' => $this->input->post('seeker_email'),
				'seeker_address' => $this->input->post('seeker_address'),
				'seeker_telephone' => $this->input->post('seeker_telephone')

			);

			$this->WashMyCarSeekerModel->update($data, $id);
		}


		public function seeker_vehicle_update()
		{
			$id = $this->uri->segment(3);
			$data = array(

				'cwsv_plateno' => $this->input->post('cwsv_plateno'),
				'cwsv_brand' => $this->input->post('cwsv_brand'),
				'cwsv_model' => $this->input->post('cwsv_model'),
				'cwsv_color' => $this->input->post('cwsv_color'),
				'cwsv_type' => $this->input->post('cwsv_type')

			);

			$this->WashMyCarSeekerVehicleModel->update($data, $id);
		}



	}























?>