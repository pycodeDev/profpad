<div class="container mt-2">
    <div class="card">
        <div class="card-header text-center">
            Data Wisata
        </div>
        <div class="card-body"> 
        <br>
            <a href="<?=base_url()?>admin/t_wisata" class="btn btn-md btn-success my-2">Tambah Data</a>   
            <table class='table' id='wisata'>
                <thead>
                    <th>No</th>
                    <th>Nama Wisata</th>
                    <th>Lokasi Wisata</th>
                    <th>Aksi</th>
                </thead>
                <?php
                $no=1;
                foreach ($wisata as $val):
                    ?>
                <tbody>
                    <td><?=$no++?></td>
                    <td><?=$val['nama_wisata']?></td>
                    <td>Negara : <i><?=$val['negara']?></i>
                        <br>Provinsi : <i><?=$val['provinsi']?></i>
                        <br>Kabupaten : <i><?=$val['kabupaten']?></i>
                        <br>Kecamatan : <i><?=$val['kecamatan']?></i>
                        </td>
                    <td>
                        <a href="<?=base_url()?>admin/e_wisata/<?=$val['id_w']?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?=base_url()?>wisata/act_d/<?=$val['id_w']?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tbody>
                <?php
                    endforeach;
                ?>
            </table>
        </div>
    </div>
</div>