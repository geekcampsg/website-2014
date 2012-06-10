<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
		$this->load->view('core/front_hero_unit');
	}

	/****************************
     * renders the page for account creation
    ****************************/
	public function create_account_form(){
		$this->load->library('user_lib');
		if(!$this->user_lib->is_logged_in()){
			$this->load->helper('security');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|strtolower|callback__check_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|matches[password_conf]|do_hash');
			$this->form_validation->set_rules('password_conf', 'Password Confirmation', 'required');

			if($this->form_validation->run() == FALSE){
				$data['create_account'] = true;
				$data['content'] = $this->load->view('user/create_account_form', '', true);
				$this->load->view('core', $data);
			}
			else{
				$this->load->model('user_model');
				$_id = $this->user_model->create_new_user(set_value('email'), set_value('password'));
				$this->session->set_userdata('email', set_value('email'));
				$this->session->set_userdata('id', $_id);
				$this->session->set_userdata('type', 'user');
				redirect('/user/instagram_auth');
			}
		}
		else{
			redirect('user/dashboard');
		}
	}

	/****************************
     * renders the page for login
    ****************************/
	public function login_form(){
		$this->load->library('user_lib');
		if(!$this->user_lib->is_logged_in()){
			$this->load->helper('security');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|strtolower');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|do_hash');

			$this->load->model('user_model');
			$valid = $this->form_validation->run();
			if($valid){
				$user = $this->user_model->get_user(set_value('email'), set_value('password'));
			}
			else{
				$user = TRUE;
			}
			

			if(!$valid || !$user){
				$data['error'] = !$user;
				$data['login'] = true;
				$data['content'] = $this->load->view('user/login_form', $data, true);
				$this->load->view('core', $data);
			}
			else{
				$this->session->set_userdata('email', set_value('email'));
				$this->session->set_userdata('id', $user['_id']);
				$this->session->set_userdata('type', $user['type']);

				redirect('admin/dashboard');
				
			}
		}
		else{
			redirect('admin/dashboard');
		}	
	}

	/****************************
     * renders the page for user to indicate that they have forgot the password
     * sends an email if submitted
    ****************************/
	public function forget_password_form(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|strtolower|callback__check_email_exist');
		if($this->form_validation->run() == FALSE){
			$data['content'] = $this->load->view('user/forgot_password_form', '', true);
			$this->load->view('core', $data);
		}
		else{
			$this->load->model('user_model');
			$key = $this->user_model->add_password_reset_key(set_value('email'));
			
			$to = set_value('email');
			$subject = 'Password Reset for Geekcamp.SG';
			$message = 'Hi, 

I am GeekBot, the machine that runs Geekcamp.SG. I noticed that you have recently filed a password reset request. Please click on the following link to reset your password. You have 10 minutes to reset your password, after which this link will no longer work.

'.site_url('user/password_reset_form/'.$key).'
			
Thanks, and happy syncing!
GeekBot';
			$headers = "From: contact@geekcamp.sg\r\n";
			mail($to, $subject, $message, $headers);

			$data['content'] = $this->load->view('user/forgot_password_form_success', '', true);
			$this->load->view('core', $data);
		}
			
	}

	/****************************
     * renders the page for password reset
     * resets the password if within 10 minutes
    ****************************/
	public function password_reset_form($key){
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|matches[password_conf]|do_hash');
		$this->form_validation->set_rules('password_conf', 'Password Confirmation', 'required');

		if($this->form_validation->run()){
			$this->load->model('user_model');
			$this->user_model->update_password(set_value('password'), $key);
			redirect('user/login_form');
		}
		else {
			$data['key'] = $key;
			$data['content'] = $this->load->view('user/password_reset_form', $data, true);
			$this->load->view('core', $data);
		}
	}

	public function logout(){
		$this->session->sess_destroy();
        redirect('/');
	}

	public function remove_reset_links(){
		$this->load->model('user_model');
		$this->user_model->remove_reset_links();
	}

	/****************************
     * callback functions
    ****************************/

    /****************************
     * checks if the email exists
     * if exists, return false
    ****************************/
	public function _check_email($email_address){
		$this->load->model('user_model');
		if($this->user_model->check_dup($email_address)){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('_check_email', 'Duplicate email found! Do you want to login <a href="'.site_url('user/login').'">here</a>?');
			return FALSE;
		}
	}

	/****************************
     * checks if the email exists
     * if exists, return true
    ****************************/
	public function _check_email_exist($email_address){
		if($this->_check_email($email_address)){
			$this->form_validation->set_message('_check_email_exist', 'Email not found!');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}
}

/* End of file welcome.php */
