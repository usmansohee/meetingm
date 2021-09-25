<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code

		//db veriable names
		$this->load->model('Attendees_model', 'attendees');
		$this->load->model('Admin_projects_model', 'admin_projects');
		$this->load->model('Projects_model', 'projects');
		$this->load->model('Topics_model', 'topics');
		$this->load->model('Topic_details_model', 'topic_details');
		$this->load->model('User_model', 'users');
	}

	public function index()
	{
		$this->load->view('login/login_page');
	}

	public function login_page()
	{
		$uname = $this->input->post('uname');
		$pwd = $this->input->post('pwd');

		$user=$this->users->read_single($uname,$pwd);


		if (!empty($user)){

			$output = array(
				'user'=> $user
			);

			$this->main();
		}
		else
			$this->load->view('login/login_page');
	}

	public function reset_pwd($id="")
	{
		echo $id;
		$this->load->view('login/reset_pwd');
	}

	#Dashboard
	public function main()
	{
		$total_admin_projects=$this->admin_projects->get_count();
		$total_attendees=$this->attendees->get_count();
		$total_meetings=$this->projects->get_count();

		$output = array(
			'body_page' => 'main',
			'total_attendees' => $total_attendees,
			'total_admin_projects' => $total_admin_projects,
			'total_meetings' => $total_meetings
		);

		$this->load->view('templates/index',$output);
	}

	/***** Attendees - START *****/
	public function attendees()
	{
		$data=$this->attendees->read_all();
		$output = array(
			'body_page' => 'attendees',
			'data_set' => $data
			);
		$this->load->view('templates/index',$output);
	}

	public function add_attendee()
	{
		$name = $this->input->post('name');
		$company = $this->input->post('company');
		$email = $this->input->post('email');

		$attendee = "0";
		$distributor = "0";

		if ($attendee == "1")
			$attendee="1";
		else
			$attendee="0";

		if ($distributor == "1")
			$distributor="1";
		else
			$distributor="0";

		$input = array(
			'name' => $name,
			'company' => $company,
			'email' => $email,
			'attendee' => $attendee,
			'distributor' => $distributor
		);
		$this->attendees->insert($input);

		redirect(site_url('welcome/attendees/'));
	}

	public function delete_attendee($id)
	{
		$this->attendees->delete($id);
		$this->attendees();
	}
	/***** Attendees - END *****/


	/***** Projects - START *****/
	public function projects()
	{
		$data=$this->projects->read_all();

		$output = array(
			'body_page' => 'projects',
			'data_set' => $data
		);

		$this->load->view('templates/index',$output);
	}

	public function new_project($id)
	{
		$admin_project_detail=$this->admin_projects->read_all();
		$data_topic=$this->topics->get_topics($id);
		$data_topic_detail=$this->topic_details->read_all();

		$data_attendees = $this->attendees->read_all();

		$output = array(
			'body_page' => 'new_project',
			'admin_project_id' => $id,
			'data_admin' => $admin_project_detail,
			'data_topic' => $data_topic,
			'data_topic_detail' => $data_topic_detail,
			'data_attendees' => $data_attendees

		);

		$this->load->view('templates/index',$output);
	}

	public function add_project($id)
	{
			//Check whether user upload picture
			if (!empty($_FILES['picture']['name'])) {
				$config['upload_path'] = 'assets';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $_FILES['picture']['name'];

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('picture')) {
					$uploadData = $this->upload->data();
					$picture = $uploadData['file_name'];
				} else {
					$picture = '';
					echo "ahmed";
				}
			} else {
				$picture = '';
				echo "usman";
			}

		/** getting selected participants names in "$final_attending" */
		$selected_attendees = $this->input->post('attendee_checkbox[]');
		$attending="";
		foreach($selected_attendees as $key=>$value) {
			//echo $key."=>".$value;
			$get_attendee=$this->attendees->get_user($value);
			$attending=$attending.$get_attendee['name'].",";

		}
		$final_attending = rtrim($attending, ",");

		/**  other data  **/
		$project = $this->input->post('project_name');
		$topic = $this->input->post('topic_name');
		$date = $this->input->post('date');
		$location = $this->input->post('location');
		$side_dishes = $this->input->post('side_dishes');
		$date1 = $this->input->post('datepicker1');
		$time1 = $this->input->post('timepicker1');
		$loc1 = $this->input->post('loc1');
		$topic1 = $this->input->post('topic1');
		$date2 = $this->input->post('datepicker2');
		$time2 = $this->input->post('timepicker2');
		$loc2 = $this->input->post('loc2');
		$topic2 = $this->input->post('topic2');
		$note =  $this->input->post('summernote');

		$input = array(
			'project' => $project,
			'topic' => $topic,
			'date' => $date,
			'location' => $location,
			'side_dishes' => $side_dishes,
			'participants' => $final_attending,
			'date1' => $date1,
			'time1' => $time1,
			'loc1' => $loc1,
			'topic1' => $topic1,
			'date2' => $date2,
			'time2' => $time2,
			'loc2' => $loc2,
			'topic2' => $topic2,
			'note' => $note,
			'admin_project_id' => $id,
			'picture' => $picture
		);

		$this->projects->insert($input);
		$this->projects();
		$this->generate_pdf($input,$id);
	}


	public function delete_project($id)
	{
		$this->projects->delete($id);
		$this->projects();
	}
	/***** Projects - END *****/


	/***** Topics - Start *****/
	public function topics($id)
	{
		$data=$this->topics->get_topics($id);
		$output = array(
			'body_page' => 'topics',
			'admin_project_id'=> $id,
			'data_set' => $data,
		);
		$this->load->view('templates/index',$output);
	}

	public function add_topic()
	{
		$admin_project_id = $this->input->post('id');
		$name = $this->input->post('name');
		$input = array(
			'name' => $name,
			'admin_project_id' => $admin_project_id
		);
		$this->topics->insert($input);
		redirect(site_url('welcome/topics/'.$admin_project_id));
	}

	public function delete_topic($id)
	{
		$main_admin_project_id=$this->topics->admin_project_id($id);
		$this->topics->delete($id);
		$admin_main_id=$main_admin_project_id['admin_project_id'];
		redirect(site_url('welcome/topics/'.$admin_main_id));
	}
	/***** Topics - END *****/


	/***** Topic-Details - START *****/

	public function topic_details($id)
	{
		$topics = $this->topics->get_one_topic($id);
		$data=$this->topic_details->get_topics($id);
		$data_attendees = $this->attendees->read_all();

		/**
		 * id - main topics id
		 * topics - topic
		 * data - topics_details list
		 */

		$output = array(
			'body_page' => 'topic_details',
			'topic_id'=> $id,
			'topics' => $topics,
			'data_set' => $data,
			'data_attendees' => $data_attendees
		);
		$this->load->view('templates/index',$output);
	}


	public function update_topic_details($id)
	{
		/** getting selected participants names in "$final_attending" */
		$selected_attendees = $this->input->post('attendee_checkbox[]');
		$attending="";

		if (!empty($selected_attendees)){
			foreach($selected_attendees as $key=>$value) {
				//echo $key."=>".$value;
				$get_attendee=$this->attendees->get_user($value);
				$attending=$attending.$get_attendee['name'].",";

			}
		}
		$final_attending = rtrim($attending, ","); #these are the participants

		$tno = $this->input->post('topic_no');
		$week_no = $this->input->post('week_no');
		$date = $this->input->post('date');
		$note = $this->input->post('note');
		$status = $this->input->post('status');
		$due_date = $this->input->post('due_date');

		$input = array(
//			'chap_id' => $tno,
			'week' => $week_no,
			'date' => $date,
			'note' => $note,
			'assigned_to' => $final_attending,
			'status' => $status,
			'due_date' => $due_date
		);

		$this->topic_details->update($id,$input);
		$main_topic = $this->topic_details->get_main_topic($id);
		$main_topic_id = $main_topic[0]['topic_id'];
		$this->topic_details($main_topic_id);
	}

	public function add_topic_details()
	{
		$topics_id= $this->input->post('topic_no');
		$chap_id = $this->input->post('chap_no');
		$week_no = $this->input->post('week');
		$date = $this->input->post('date');
		$note = $this->input->post('note');
		$participants = $this->input->post('paricipants');
		$status = $this->input->post('dropdown_status');
		$due_date = $this->input->post('due_date');

		$input = array(
			'chap_id' => $chap_id,
			'week' => $week_no,
			'date' => $date,
			'note' => $note,
			'assigned_to' => $participants,
			'status' => $status,
			'due_date' => $due_date,
			'topic_id' => $topics_id

		);
		$this->topic_details->insert($input);
		redirect(site_url('welcome/topic_details/'.$topics_id));
	}

	/***** ADMIN - Projects - START *****/
	public function admin_project()
	{
		$data=$this->admin_projects->read_all();
		$output = array(
			'body_page' => 'admin_project',
			'data_set' => $data
		);
		$this->load->view('templates/index',$output);
	}

	public function add_admin_project()
	{
		$name = $this->input->post('name');
		$number = $this->input->post('number');
		$address = $this->input->post('address');
		$zip = $this->input->post('zip');
		$country = $this->input->post('country');
		$date1 = $this->input->post('start');
		$date2 = $this->input->post('end');

		$input = array(
			'name' => $name,
			'number' => $number,
			'address' => $address,
			'zip' => $zip,
			'country' => $country,
			'construction_start' => $date1,
			'construction_end' => $date2
		);

		$this->admin_projects->insert($input);
		redirect(site_url('welcome/admin_project/'));
	}

	public function delete_admin_project($id)
	{
		$this->admin_projects->delete($id);
		$this->admin_project();
	}
	/***** ADMIN - Projects - END *****/


	/***** Generate PDF *****/
	public function generate_pdf($input,$id)
	{
		$admin_project_data = $this->admin_projects->get_one_admin_project_data($id);
		$data_topic=$this->topics->get_topics($id);
		$data_topic_detail=$this->topic_details->read_all();

		$output = array(
			'admin_project_id' => $id,
			'admin_project_data' => $admin_project_data,
			'topics'=> $data_topic,
			'topics_details' => $data_topic_detail,
			'project_meeting_data' => $input
		);

		$this->load->library('pdf');
		$html = $this->load->view('GeneratePdfView', $output, true);
		$this->pdf->createPDF($html, 'mypdf', false);
	}


	/***** Copy Construction *****/
	public function copy_meeting($id)
	{
		$data = $this->projects->get_project($id);
		$input = array(
			'picture' => $data['picture'],
			'project' => $data['project'],
			'topic' => $data['topic'],
			'date' => $data['date'],
			'location' => $data['location'],
			'side_dishes' => $data['side_dishes'],
			'participants' => $data['participants'],
			'date1' => $data['date1'],
			'time1' => $data['time1'],
			'loc1' => $data['loc1'],
			'topic1' => $data['topic1'],
			'date2' => $data['date2'],
			'time2' => $data['time2'],
			'loc2' => $data['loc2'],
			'topic2' => $data['topic2'],
			'note' => $data['note'],
			'admin_project_id' => $data['admin_project_id']
		);
		$this->projects->insert($input);
		$this->projects();
	}

}
