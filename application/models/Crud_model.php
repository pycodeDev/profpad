<?php
defined('BASEPATH') OR exit('No direct script access alowed');

class Crud_model extends CI_Model
{
    
    public function save_wis()
    {
        $post = $this->input->post();
        $data = array(
            'nama_wisata' => $post['nama'],
            'deskripsi' => $post['desk'],
            'negara' => $post['negara'],
            'provinsi' => $post['provinsi'],
            'kabupaten' => $post['kabupaten'],
            'kecamatan' => $post['kecamatan'],
            'lat' => $post['lat'],
            'lon' => $post['lon'],
            'id_user' => $this->session->userdata('id_user')
        );
        $this->db->insert('t_wisata', $data);
    }

    public function read_wisata()
    {
        return $this->db->get("t_wisata")->result_array();
    }

    public function read_1_data($select,$table,$field,$id)
    {
        return $this->db->select($select)->get_where($table, [$field => $id])->row_array();
    }

    public function join_data($isi,$tba,$tbt,$join) 
    {
        // join_data('id_wisata,nama_wisata','wisata','user','wisata.id_user=user.id_user') -> contoh
        return $this->db->select($isi)->join($tbt, $join)->get($tba)->result_array();
    }
    
    public function u_wis()
    {
        $post = $this->input->post();
        $data = array(
            'nama_wisata' => $post['nama'],
            'deskripsi' => $post['desk'],
            'negara' => $post['negara'],
            'provinsi' => $post['provinsi'],
            'kabupaten' => $post['kabupaten'],
            'kecamatan' => $post['kecamatan'],
            'lat' => $post['lat'],
            'lon' => $post['lon'],
            'id_user' => $post['id_user']
        );
        $this->db->update("t_wisata", $data, array("id_w" => $post["id"]));
    }   

    public function d_data($id,$table,$field)
    {
        return $this->db->delete($table, array($field => $id));
    }

    public function data_galeri($post)
    {
        $hasil = array();
        $q = $this->db->select("tw.nama_wisata,CONCAT(tw.negara, ', ',tw.provinsi, ', ',tw.kabupaten, ', ',tw.kecamatan) as lokasi,tg.id_g,tg.id_w,tg.galeri_name")->join("t_galeri tg","tw.id_w=tg.id_w", "left")->get_where("t_wisata tw", ['tw.id_w' => $post['id']]);
        $hasil = $q->result_array();
        return $hasil;
    }

    public function s_galeri()
    {
        $post = $this->input->post();
        // Check form submit or not 
        if($this->input->post('upload') != NULL ){ 
            $data = array(); 
            if(!empty($_FILES['file']['name'])){ 
                // Set preference 
                $config['upload_path'] = 'uploads/'; 
                $config['allowed_types'] = 'jpg|jpeg|png'; 
                $config['max_size'] = '4000'; // max_size in kb 
                $config['file_name'] = $_FILES['file']['name']; 

                // Setting configuration
                $this->upload->initialize($config);
            
                // File upload
                if($this->upload->do_upload('file')){ 
                // Get data about the file
                $uploadData = $this->upload->data(); 
                $filename = $uploadData['file_name']; 
                
                $data = array(
                    'id_w' => $post['id_w'],
                    'galeri_name' => $_FILES['file']['name'],
                    'publish' => date("Y-m-d")
                );
                $this->db->insert('t_galeri', $data);
                $msg = 'Berhasil';
                }else{ 
                $msg = 'Gagal1'; 
                } 
            }else{ 
            $msg = 'Gagal2'; 
            } 
        }else{
            $msg = "Gagal3";
        }
    }

    public function u_galeri()
    {
        $post = $this->input->post();
        // Check form submit or not 
        if($this->input->post('upload') != NULL ){ 
            $data = array(); 
            
            $path = './uploads/';

            if(!empty($_FILES['file']['name'])){ 
                // Set preference 
                $config['upload_path'] = 'uploads/'; 
                $config['allowed_types'] = 'jpg|jpeg|png'; 
                $config['max_size'] = '4000'; // max_size in kb 
                $config['file_name'] = $_FILES['file']['name']; 

                // Setting configuration
                $this->upload->initialize($config);
            
                // File upload
                if($this->upload->do_upload('file')){ 
                // Get data about the file
                $uploadData = $this->upload->data(); 
                $filename = $uploadData['file_name']; 
                
                $data = array(
                    'galeri_name' => $_FILES['file']['name']
                );

                // hapus foto pada direktori
                @unlink($path . $this->input->post('filelama')); 

                $this->db->update("t_galeri", $data, array("id_g" => $post["id_g"]));
                $msg = 'Berhasil';
                }else{ 
                $msg = 'Gagal1'; 
                } 
            }else{ 
            $msg = 'Gagal2'; 
            } 
        }else{
            $msg = "Gagal3";
        }
    }

    public function data_suba($post){
        $hasil = array();
        $q = $this->db->select("*")->join("t_wisata tw","tg.id_w=tw.id_w", "left")->get_where("t_galeri tg", ['tg.id_w' => $post['id']]);
        $hasil = $q->result_array();
        return $hasil;
    }
}