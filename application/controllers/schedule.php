<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {
    /*******************
     * Displays all talks. 
     * Paginated in pages of 50 in order of the talks in the most recent year. 
     * Generally, $count is not used at all.
     * Requires: Logged in User
    *******************/
    public function view_all_schedules($page = 0, $count = 50){
        if($this->user_lib->is_logged_in()){
            $this->load->library('pagination');
            $this->load->model('talk_model');

            $config['base_url'] = site_url('admin/view_all_talks');
            $config['total_rows'] = $this->talk_model->get_number_of_talks();
            $config['per_page'] = $count;
            $config['uri_segment'] = 3;
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $this->pagination->initialize($config);

            $data['talks'] = $this->talk_model->get_all_talks($page, $count);
            $data['content'] = $this->load->view('admin/view_all_talks', $data, TRUE);
            $this->load->view('core', $data);
        }
        else {
            redirect('/');
        }
    }

    /*******************
     * Edits talk with id as argument
     * Requires: Logged in User
    *******************/
    public function edit_talk($id = -1){
        if($this->user_lib->is_logged_in()){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('talk-description', 'Description', 'trim|required');
            $this->form_validation->set_rules('speaker-name', 'Name', 'trim|required');
            $this->form_validation->set_rules('email-address', 'Email', 'trim|required|valid_email|strtolower');
            $this->form_validation->set_rules('website', 'Website', 'trim');
            $this->form_validation->set_rules('twitter-handle', 'Twitter', 'trim');

            $this->load->model('talk_model');
            if($this->form_validation->run()){
                $this->talk_model->edit_talk($id, set_value('title'), set_value('talk-description'), set_value('speaker-name'), set_value('email-address'), set_value('website'), set_value('twitter-handle'));

                $data['content'] = $this->load->view('pages/submit_talk', '', TRUE);
                $this->load->view('core', $data);
            }
            else{
                if($id == -1){
                    $data['content'] = $this->load->view('pages/four_o_four', '', TRUE);
                }
                else{
                    $data['talk'] = $this->talk_model->get_talk_by__id($id);
                    $data['edit'] = TRUE;
                    $data['content'] = $this->load->view('pages/submit_talk', $data, TRUE);
                }
                $this->load->view('core', $data);
            }
            
        }
        else {
            redirect('/');
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */