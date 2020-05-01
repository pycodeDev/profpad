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
    
    public function read_akun()
    {
        return $this->db->get("t_user")->result_array();
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

    public function s_akun()
    {
        $post = $this->input->post();
        $data = array(
            'username' => $post['username'],
            'password' => md5($post['password']),
            'nama' => $post['nama'],
            'akses' => $post['akses']
        );
        return $this->db->insert('t_user', $data);
    }

    public function data_gal($page){
        $limit = 6;
        if (isset($page)) {
            $no = 1 + $limit * $page - $limit;
        } else {
            $page = 1;
            $no = 1;
        }

        $calc = $limit * $page;
        $start = $calc - $limit;
        $sql = "SELECT * from t_galeri left join t_wisata on t_galeri.id_w=t_wisata.id_w order by t_galeri.id_w asc limit $start, $limit";
        $gal = $this->db->query($sql);

        if ($gal->num_rows() == 0) {
            $return = 'Data Tidak Ada';
        } else {
            $hasil = $gal->result_array();
            foreach ($hasil as $aa) {
                echo'
                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-item mx-auto">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i>'.$aa['nama_wisata'].'</i>
                            </div>
                        </div>
                        <div class="text-center">
                    <img class="img-fluid" style="height:200px" src="'.base_url().'uploads/'.$aa['galeri_name'].'" alt=""></div>
                    </div>
                </div>'; 
            // $return['data'][] = $hasil;
            }
            echo '
            
                <div class="col-12">
                    <div class="mx-auto d-flex justify-content-sm-center"">
                        <div class="pagination">
                            <ul class="pagination">';
            $mm = $this->db->query("SELECT * from t_galeri");
            $total = $mm->num_rows();
            $totalPages=ceil($total / $limit);
            if ($totalPages == 0) {
                $totalPages = 1;
            }
            $show_page = 7;
            $i=1;
            if ($page<=1) {
                echo "<li class='page-item active'><a title='NOW IS FIRTS PAGE' class='page-link tipsy-atas'>Firts</a></li>";
            }else {
                $j = $page - 1 ;
                $lol = "'".$j."'";
                echo "<li class='page-item'><a title='GOTO FIRTS PAGE' class='page-link tipsy-atas' onclick='changerank(".$lol.")'>Firts</a></li>";
            }
            
            if ($page>= $show_page) {
                $total_prev = $page - 3; #4 5 6 7 8 9 10
                $total_next = $page + 3; #10
            if ($total_next >= $totalPages){
                $total_next = $totalPages;
                $total_prev = $total_next - 6;
            }
            $i = $total_prev;
            while ($i <= $total_next) {
                $lol = "'".$i."'";
                if ($i<>$page) {
                    echo '<li class="page-item"><a title="GOTO PAGE '.$i.'" class="page-link tipsy-atas" onclick="changerank('.$lol.')">'.$i.'</a></li>';
                }else {
                    echo '<li class="page-item active"><a title="NOW IS PAGE '.$i.'" class="page-link tipsy-atas">'.$i.'</a></li>';
                }
                $i++;
            }
        }else {
            while ($i <= $show_page and $i < $totalPages + 1 ) {
                $lol = "'".$i."'";
                if ($i<>$page) {
                    echo '<li class="page-item"><a title="GOTO PAGE '.$i.'" class="page-link tipsy-atas" onclick="changerank('.$lol.')">'.$i.'</a></li>';
                }else {
                    echo '<li class="page-item active"><a title="NOW IS PAGE '.$i.'" class="page-link tipsy-atas">'.$i.'</a></li>';
                }
                $i++;
            }
        }

        if ($page == $totalPages) {
            echo '<li class="page-item active"><a title="NOW IS LAST PAGE" class="page-link tipsy-atas">Last</a></li>';
        }else {
            $j = $page +1;
            $lol = "'".$totalPages."'";
            echo '<li class="page-item"><a title="GOTO NEXT PAGE" class="page-link tipsy-atas" onclick="changerank('.$j.')">Next</a></li>
            <li class="page-item"><a title="GOTO LAST PAGE" class="page-link tipsy-atas" onclick="changerank('.$lol.')">Last</a></li>
            ';
        }
        echo '
                </ul>
            </div>
            </div>
            
        </div>';
        // return $return;
        }
    }
}