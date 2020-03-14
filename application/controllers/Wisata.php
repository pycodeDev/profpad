<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {

    public function act_t(){
        $post = $this->input->post();
        if ($post != null) {
            $tambah_wisata = $this->crud_model;
            $tambah_wisata->save_wis();
            $this->session->set_flashdata('success_save','Berhasil Disimpan');
            redirect(site_url('admin/wisata'));
        } else {
            $this->session->set_flashdata('fail_save','Gagal Menyimpan');
            redirect(site_url('admin/t_wisata'));
        }
	}
    
    public function act_e(){
		$post = $this->input->post();
        if ($post != null) {
            $edit_wisata = $this->crud_model;
            $edit_wisata->u_wis();
            $this->session->set_flashdata('success_edit','Berhasil Diedit'); 
            redirect(site_url('admin/wisata'));
        } else {
            $this->session->set_flashdata('fail_edit','Gagal Edit');
            $id = $post['id'];
            $url = 'admin/e_wisata/'.$id;
            redirect(site_url($url));
        }
	}
    
    public function act_d($id){
        $this->crud_model->d_data($id,"t_wisata","id_w");
        $this->session->set_flashdata('success_d','Berhasil Dihapus');
        redirect(site_url('admin/wisata'));
    }

    public function edit_wisata(){
		$post = $this->input->post();
        $data['test'] = array(
            'id' => $post['id'],
            'id_user' => $post['id_user'],
            'nama' => $post['nama'],
            'desk' => $post['desk'],
            'negara' => $post['negara'],
            'provinsi' => $post['provinsi'],
            'kabupaten' => $post['kabupaten'],
            'kecamatan' => $post['kecamatan'],
            'lat' => $post['lat'],
            'lon' => $post['lon']
        );

        $this->load->view('testing',$data);
	}
}
