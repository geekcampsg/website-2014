<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Talk extends CI_Controller {
	public function view_index($year = 2013){
		if(!$this->user_lib->is_logged_in()){
			redirect('');
		}
		$this->benchmark->mark('Code Starts');
		$this->load->model('talk_model');
		$this->benchmark->mark('Model Loaded');
		$data['talks'] = $this->talk_model->get_all_published_talks_for_year(2013);
		$this->benchmark->mark('Talks gotten');
		$data['content'] = $this->load->view('pages/index', $data, TRUE);
		$this->benchmark->mark('Page generated');
		if($year > 2000){
			$this->load->view('core', $data);
		}
		else{
			$this->load->view('core_troll', $data);
		}
		$this->benchmark->mark('Core loaded');
		
		$this->output->enable_profiler(TRUE);
	}

	public function view_talk($id = 0){
		if(!$this->user_lib->is_logged_in() || $id == 0){
			redirect('');
		}
		else{
			$this->benchmark->mark('Code Starts');
			$this->load->model('talk_model');
			$this->benchmark->mark('Model Loaded');
			$data['talk'] = $this->talk_model->get_talk_by__id($id);
			$this->benchmark->mark('Talks gotten');
			if($data['talk'] == NULL){
				redirect('');
			}
			else{
				$data['content'] = $this->load->view('talk/view', $data, TRUE);
				$this->benchmark->mark('Page generated');
				$data['meta_title'] = $data['talk']['title'].' by '.$data['talk']['speaker_name'];
				$data['meta_description'] = 'Join me and vote for a talk at Geekcamp.SG today!';
				$this->load->view('core', $data);
				$this->benchmark->mark('Core loaded');
			}
		}
		$this->output->enable_profiler(TRUE);
	}



}