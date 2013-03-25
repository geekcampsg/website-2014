<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Talk extends CI_Controller {
	public function view($id = 0){
		if($id == 0){
			redirect('');
		}
		else{
			$this->load->model('talk_model');
			$data['talk'] = $this->talk_model->get_talk_by__id($id);
			if($data['talk'] == NULL){
				redirect('');
			}
			else{
				$data['content'] = $this->load->view('talk/view', $data, TRUE);
				$data['title'] = $data['talk']['title'].' by '.$data['talk']['speaker_name'];
				$this->load->view('core', $data);
			}
		}
	}

	/*******************
     * Talk submission page
     * Allows users to submit talk with fields title, talk-description, speaker-name, email-address, website, and twitter-handle
     * Validates the talk details, throw an error if condition fails
     * Shows talk success page on success
    *******************/
	public function submit_talk(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('talk-description', 'Description', 'trim|required');
		$this->form_validation->set_rules('speaker-name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email-address', 'Email', 'trim|required|valid_email|strtolower');
		$this->form_validation->set_rules('website', 'Website', 'trim');
		$this->form_validation->set_rules('twitter-handle', 'Twitter', 'trim');

		if($this->form_validation->run()){
			$this->load->model('talk_model');
			$data['talk'] = $this->talk_model->create_talk(set_value('title'), set_value('talk-description'), set_value('speaker-name'), set_value('email-address'), set_value('website'), set_value('twitter-handle'));
			$data['content'] = $this->load->view('talk/submit_talk_success', $data, TRUE);
			$this->load->view('core', $data);	
		}
		else{
			$data['content'] = $this->load->view('talk/submit_talk', '', TRUE);
			$this->load->view('core', $data);
		}	
	}

	public function tmp(){
		phpinfo();
	}


}