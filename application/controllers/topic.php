<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topic extends MY_Controller {
	
	function __construct()
	{
   		parent::__construct();
 	}

 	function index()
 	{
 		if ($this->session->userdata('logged_in'))
   		{
     		$session_data = $this->session->userdata('logged_in');
     		$data['username'] = $session_data['username'];
     		redirect('home', 'refresh');
   		}
   		else
   			$this->template->display('login');
 	}

 	
 	function view()
 	{
 		// topic/$topic_id
 		$topic_id = $this->uri->segment(2);
        $this->add_data('topic', $this->topic_m->get($topic_id));
 		$this->template->display('topic_view', $this->data);
 	}
 	
 	
 	function add()
 	{
 		if ($this->session->userdata('logged_in'))
 		{
 			
 			// if submit form
 			if ($this->input->post('submit'))
 			{
 				$data['cat_id'] = $this->input->post('cat_id');
 				$data['topic_name'] = $this->input->post('topic_name');
 				$data['topic_desc'] = $this->input->post('topic_desc');
 				$data['categories'] = $this->category_model->get();
 				
 				$this->form_validation->set_rules('cat_id', 'Category', 'trim|required|xss_clean');
				$this->form_validation->set_rules('topic_name', 'Topic name', 'trim|required|min_length[5]|max_length[40]|xss_clean');
   				$this->form_validation->set_rules('topic_desc', 'Topic description', 'trim|required|xss_clean|min_length[10]|max_length[400]'); 				
 				
 				// if validates
 				if ($this->form_validation->run() == TRUE)
 				{
 					$topic_id = $this->topic_model->add($data['cat_id'], $data['topic_name'], $data['topic_desc']);
 					
 					if ($topic_id)
 						redirect('topic/' . $topic_id, 'refresh');
 					else
 						redirect('home', 'refresh');
 				}
 				else
	 				$this->template->display('topic_add', $data);
 			}
 			
 			// not submit, just show
 			else
 			{
 				$data['cat_id'] = '';
 				$data['topic_name'] = '';
 				$data['topic_desc'] = '';
 				$data['categories'] = $this->category_model->get();
 				$this->template->display('topic_add', $data);
 			}
 				
 		}
 		else
 			redirect('home', 'refresh');
 	}
	
}

?>
