<div class="container mt-2">
    <div class="card">
        <div class="card-header text-center">
            Data Wisata
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama Wisata</label>
                <input type="text" class="form-control" value="<?=$a['nama_wisata']?>" name="nama" placeholder="Judul Nama Wisata" disabled>
            </div>
            <div class="form-group">
                <label>Lokasi Wisata</label>
                <input type="text" class="form-control" value="<?=$a['lokasi']?>" name="nama" placeholder="Judul Nama Wisata" disabled>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header text-center">
            Edit Data Galeri
        </div>
        <form method="post" action="<?=base_url()?>galeri/act_e" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label>Masukkan Gambar</label>
                    <input type='file' name='file' class="form-control-file border" required>
                    <i style="font-size:14px"><b class="text-danger">*</b>Max Ukuran Foto 4 MB dengan type file JPG/PNG/Jpeg</i>
                    <input type='hidden' name='id_w' value="<?=$d['id_w']?>" class="form-control">
                    <input type='hidden' name='id_g' value="<?=$d['id_g']?>" class="form-control">
                    <input type='hidden' name='filelama' value="<?=$d['galeri_name']?>" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Gambar Lama: <b><?=$d['galeri_name']?></b></label>
                </div>
                <img src="<?=base_url()?>uploads/<?=$d['galeri_name']?>" style="width:100px;height:100px;margin-top:-20px">
            </div>
            <div class="card-footer text-right">
                <input type="submit" name="upload" class="btn btn-success btn-md" value="Edit">
            </div>
        </form>
    </div>
</div>