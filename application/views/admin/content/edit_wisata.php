<div class="container mt-2">
    <div class="card">
        <div class="card-header text-center">
            Edit Data Wisata
        </div>
        <form method="post" action="<?=base_url()?>wisata/act_e">
        <input type="hidden" name="id" value="<?=$edit_data['id_w']?>">
        <input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">
        <br>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-right">
                        <button class="btn btn-md btn-danger my-2">Kembali</button>   
                    </div>
                </div>
                    <div class="form-group">
                        <label>Nama Wisata</label>
                        <input type="text" class="form-control" name="nama" value="<?=$edit_data['nama_wisata']?>" placeholder="Judul Nama Wisata" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Wisata</label>
                        <div class="mb-3">
                            <textarea class="textarea" name="desk" placeholder="Deskripsi Mengenai wisata"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        <?=$edit_data['deskripsi']?>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tentukan Lokasi</label>
                        <div id="mapidedit"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Negara</label>
                                <input type="text" class="form-control" id="negara" value="<?= $edit_data['negara']?>" placeholder="Nama Negara" disabled>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Kabupaten</label>
                                <input type="text" class="form-control" value="<?= $edit_data['kabupaten']?>" id="kabupaten" placeholder="Nama Kabupaten" disabled>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" class="form-control" value="<?= $edit_data['provinsi']?>" id="provinsi" placeholder="Nama Provinsi" disabled>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" class="form-control" value="<?= $edit_data['kecamatan']?>" id="kecamatan" placeholder="Nama Kecamatan" disabled>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div>
                        <input type="hidden" name="negara" id='neg' value="<?= $edit_data['negara']?>">
                        <input type="hidden" name="provinsi" id='pro' value="<?= $edit_data['provinsi']?>">
                        <input type="hidden" name="kabupaten" id='kab' value="<?= $edit_data['kabupaten']?>">
                        <input type="hidden" name="kecamatan" id='kec' value="<?= $edit_data['kecamatan']?>">
                        <input type="hidden" name="lat" id='lat' value="<?= $edit_data['lat']?>">
                        <input type="hidden" name="lon" id='lon' value="<?= $edit_data['lon']?>">
                    </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-warning btn-md">Edit</button>
            </div>
        </form>
    </div>
</div>
