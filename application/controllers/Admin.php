<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
        if ($this->session->userdata('username') == '') {
            redirect('login');
        }else {
            $data['title'] = 'Dashboard Home';
            $data['content'] = $this->load->view('admin/content/dashboard',NULL,TRUE);
			$this->load->view('admin/index',$data);
        }
    }
    
    public function galeri()
    {
        if ($this->session->userdata('username') == '') {
            redirect('login');
        }else {
            $data['title'] = 'Data Galeri';
            $data['wisata'] = $this->crud_model->read_wisata();
            $data['content'] = $this->load->view('admin/content/galeri',$data,TRUE);
            $this->load->view('admin/index',$data);
        }
    }
    
    public function wisata()
    {
        if ($this->session->userdata('username') == '') {
            redirect('login');
        }else {
            $data['title'] = 'Data Wisata';
            $data['wisata'] = $this->crud_model->read_wisata();
            $data['content'] = $this->load->view('admin/content/wisata',$data,TRUE);
            $this->load->view('admin/index',$data);
        }
    }
    
    public function t_wisata()
    {
        if ($this->session->userdata('username') == '') {
            redirect('login');
        }else {
            $data['title'] = 'Edit Data Wisata';
            $data['content'] = $this->load->view('admin/content/tambah_wisata',NULL,TRUE);
            $this->load->view('admin/index',$data);
        }
    }
    
    public function e_wisata($id)
    {
        if ($this->session->userdata('username') == '') {
            redirect('login');
        }else {
            $data['title'] = 'Tambah Data Wisata';
            $data['edit_data'] = $this->crud_model->read_1_data("*","t_wisata","id_w",$id);
            $data['content'] = $this->load->view('admin/content/edit_wisata',$data,TRUE);
            $this->load->view('admin/index',$data);
        }
    }
    
    public function t_galeri($id)
    {
        if ($this->session->userdata('username') == '') {
            redirect('login');
        }else {
            $data['title'] = 'Tambah Data Galeri';
            $data['a'] = $this->crud_model->read_1_data("*,CONCAT(negara, ', ',provinsi, ', ',kabupaten, ', ',kecamatan) as lokasi","t_wisata","id_w",$id);
            $data['content'] = $this->load->view('admin/content/tambah_galeri',$data,TRUE);
            $this->load->view('admin/index',$data);
        }
    }

    public function e_galeri($id,$id_w)
    {
        if ($this->session->userdata('username') == '') {
            redirect('login');
        }else {
            $data['title'] = 'Edit Data Galeri';
            $data['a'] = $this->crud_model->read_1_data("*,CONCAT(negara, ', ',provinsi, ', ',kabupaten, ', ',kecamatan) as lokasi","t_wisata","id_w",$id_w);
            $data['d'] = $this->crud_model->read_1_data("*","t_galeri","id_g",$id);
            $data['content'] = $this->load->view('admin/content/edit_galeri',$data,TRUE);
            $this->load->view('admin/index',$data);
        }
    }

}
