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
	public function index(){
		$this->load->model('talk_model');
		$data['talks'] = $this->talk_model->get_all_published_talks_for_current_year();
		$data['content'] = $this->load->view('pages/index', $data, TRUE);
		$this->load->view('core', $data);
		$this->output->cache(1);
	}

	public function schedule($year = NULL){
		$data['content'] = $this->load->view('pages/schedule'.$year, '', TRUE);
		$this->load->view('core', $data);
	}

	public function submit_talk(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('talk-description', 'Description', 'trim|required');
		$this->form_validation->set_rules('speaker-name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email-address', 'Email', 'trim|required|valid_email|strtolower');
		$this->form_validation->set_rules('twitter-handle', 'Twitter', 'trim');

		if($this->form_validation->run()){
			$this->load->model('talk_model');
			$this->talk_model->create_talk(set_value('title'), set_value('talk-description'), set_value('speaker-name'), set_value('email-address'), set_value('twitter-handle'));
			$data['msg'] = 'Your talk has been updated. It will be shown on the front page soon.';
			$data['content'] = $this->load->view('pages/submit_talk_success', $data, TRUE);
			$this->load->view('core', $data);	
		}
		else{
			$data['content'] = $this->load->view('pages/submit_talk', '', TRUE);
			$this->load->view('core', $data);
		}	
	}

	public function four_o_four(){
		$data['content'] = $this->load->view('pages/four_o_four', '', TRUE);
		$this->load->view('core', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */