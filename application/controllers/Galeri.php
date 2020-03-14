<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

    public function data_galeri()
    {
        $postData = $this->input->post();
        $lol  = $this->crud_model->data_galeri($postData);

        echo json_encode($lol);
    }

    public function act_t(){
		$post = $this->input->post();
        if ($post != null) {
            $tambah_galeri = $this->crud_model;
            $tambah_galeri->s_galeri();
            $this->session->set_flashdata('success_save','Berhasil Disimpan');
            redirect(site_url('admin/galeri'));
        } else {
            $this->session->set_flashdata('fail_save','Gagal Menyimpan');
            $id = $post['id'];
            $url = 'admin/t_galeri/'.$id;
            redirect(site_url($url));
        }
    }

    public function act_e(){
		$post = $this->input->post();
        if ($post != null) {
            $edit_galeri = $this->crud_model;
            $edit_galeri->u_galeri();
            $this->session->set_flashdata('success_edit','Berhasil Diedit'); 
            redirect(site_url('admin/galeri'));
        } else {
            $this->session->set_flashdata('fail_edit','Gagal Edit');
            $id = $post['id'];
            $url = 'admin/e_galeri/'.$id;
            redirect(site_url($url));
        }
	}
    
    public function act_d($id){
        $this->crud_model->d_data($id,"t_galeri","id_g");
        $this->session->set_flashdata('success_d','Berhasil Dihapus');
        redirect(site_url('admin/galeri'));
    }
}