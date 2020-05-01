<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library("pdf");
    }

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
    //coba masukin ini
    
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
    
    public function laporan()
    {
        if ($this->session->userdata('username') == '') {
            redirect('login');
        }else {
            $data['title'] = 'Laporan';
            $data['wisata'] = $this->crud_model->read_wisata();
            $data['content'] = $this->load->view('admin/content/laporan',$data,TRUE);
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
    
    public function setting()
    {
        if ($this->session->userdata('username') == '') {
            redirect('login');
        }else {
            $data['title'] = 'Tambah Akun';
            $data['content'] = $this->load->view('admin/content/tambah_akun',$data,TRUE);
            $this->load->view('admin/index',$data);
        }
    }
    
    public function akun()
    {
        if ($this->session->userdata('username') == '') {
            redirect('login');
        }else {
            $data['title'] = 'Tambah Akun';
            $data['wisata'] = $this->crud_model->read_akun();
            $data['content'] = $this->load->view('admin/content/data_akun',$data,TRUE);
            $this->load->view('admin/index',$data);
        }
    }
    
    public function act_t_a()
    {
        $post = $this->input->post();
        if ($post != null) {
            $tambah_akun = $this->crud_model;
            $tambah_akun->s_akun();
            $this->session->set_flashdata('success_save','Berhasil Disimpan');
            redirect(site_url('admin/setting'));
        } else {
            $this->session->set_flashdata('fail_save','Gagal Menyimpan');
            redirect(site_url('admin/setting'));
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

    public function act_l($id_g){
        $q = $this->db->select("*")->join("t_wisata tw","tg.id_w=tw.id_w", "left")->get_where("t_galeri tg", ['tg.id_g' => $id_g])->row_array();
        $image1 = base_url().'uploads/'.$q['galeri_name'];
        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(200,9,'SISTEM ADMIN WISATA SUKU TALANG MAMAK',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // $pdf->Cell(200,9,'Sistem Prediksi Jumlah Pendaftar Jamaah Haji dan Umroh',0,1,'C');
        $pdf->Cell(200,9,'Alamat',0,1,'C');
        $pdf->Cell(200,9,'',0,1,'C');
        $pdf->Line(20, 30, 210-20, 30);
        // $pdf->Cell(10,7,'',0,1);
        // $pdf->Cell(10,7,'',0,1);
        // $pdf->Cell(10,7,'',0,1);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(30,6,'Tanggal :',0,0);
        $pdf->Cell(50,6,date("d-m-Y"),0,1);
        $pdf->Cell(30,6,'Nama Wisata :',0,0);
        $pdf->Cell(50,6,$q['nama_wisata'],0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell( 10, 20, $pdf->Image($image1, 30, 60, 150), 0, 0, 'l', false );
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',10);
        $pdf->Output();

    }

}
