<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	/*******************
     * Index page
     * Displays list of proposed talks in current year with voting buttons
     * Uses Facebook Likes and Google +1's for voting
     * Output is cached for 1 minute
    *******************/
	public function index($year = 2013){
		$this->load->model('talk_model');
		$data['talks'] = $this->talk_model->get_all_published_talks_for_year($year);
		$data['content'] = $this->load->view('pages/index', $data, TRUE);
		if($year > 2000){
			$this->load->view('core', $data);
		}
		else{
			$this->load->view('core_troll', $data);
		}
		
		//$this->output->cache(1440);
	}

	/*******************
     * Archive page
     * Displays list of proposed talks in past year with voting buttons
     * Uses Facebook Likes and Google +1's for voting
     * Output is cached for 10 minute
    *******************/
	public function archive($year = 2012){
		$this->load->model('talk_model');
		$data['talks'] = $this->talk_model->get_all_published_talks_for_year($year);
		$data['content'] = $this->load->view('index/index'.$year, $data, TRUE);
		$this->load->view('core', $data);
		$this->output->cache(10);
	}

	/*******************
     * Schedule page
     * Displays schedule for the year passed into $year
     * Admin sets $min_year in this function
     * Admin creates a new view/schedules/schedule2012.php for every new year
     * Output is cached for 1 hour
    *******************/
	public function schedule($year = -1){
		if($year == -1){
			$year = date('Y');
		}
		$this->load->model('schedule_model');
		$data['schedule'] = $this->schedule_model->get_schedule($year);
		$data['content'] = $this->load->view('schedules/schedule', $data, TRUE);
		$this->load->view('core', $data);
		//$this->output->cache(60);
	}


	/*******************
     * Email page
     * Allows users to email the organisers
     * Shows email success page on success
    *******************/
	public function email(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'trim|required|stripcslashes');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|strtolower|stripcslashes');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required|stripcslashes');
		$this->form_validation->set_rules('msg', 'Message', 'trim|required|stripcslashes');
		
		if($this->form_validation->run()){
			$contactMessage =  
"Message:
".set_value('msg')."

Name: ".set_value('name')."
E-mail: ".set_value('email')."

Sending IP:$_SERVER[REMOTE_ADDR]
Sending Script: $_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]";
			 
			mail('geekcampsg@googlegroups.com', set_value('subject'), $contactMessage);
			$data['content'] = $this->load->view('pages/email_success', '', TRUE);
			$this->load->view('core', $data);
		}
		else{
			$data['content'] = $this->load->view('pages/email', '', TRUE);
			$this->load->view('core', $data);

		}
	}

	/*******************
     * 404 page
    *******************/
	public function four_o_four(){
		$data['content'] = $this->load->view('pages/four_o_four', '', TRUE);
		$this->load->view('core', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */