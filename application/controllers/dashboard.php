<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['join'] = $this->crud_model->join_data('*','t_wisata','t_user','t_wisata.id_user=t_user.id_user');
		$data['lol'] = $this->crud_model->join_data('*','t_galeri','t_wisata','t_galeri.id_w=t_wisata.id_w');
		$data['wis'] = 
		// $data['test']  = $this->crud_model->data_gal('1');
		$this->crud_model->read_wisata();
		$this->load->view('index', $data);

	}
	
	public function data_search(){
        $postData = $this->input->post();
        $search = $this->crud_model;
        $data  = $search->data_suba($postData);

        echo json_encode($data);
    }
	
	public function test(){
		$post = $this->input->post();
		$id = $post['page'];
        $search = $this->crud_model;
        echo $search->data_gal($id);

        
    }
}


