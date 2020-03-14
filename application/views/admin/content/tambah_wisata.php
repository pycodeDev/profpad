<div class="container mt-2">
    <div class="card">
        <div class="card-header text-center">
            Tambah Data Wisata
        </div>
        <form method="post" action="<?=base_url()?>wisata/act_t">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-right">
                        <button class="btn btn-md btn-danger my-2">Kembali</button>   
                    </div>
                </div>
                    <div class="form-group">
                        <label>Nama Wisata</label>
                        <input type="text" class="form-control" name="nama" placeholder="Judul Nama Wisata">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Wisata</label>
                        <div class="mb-3">
                            <textarea class="textarea" name="desk" placeholder="Deskripsi Mengenai wisata"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tentukan Lokasi</label>
                        <div id="mapid"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Negara</label>
                                <input type="text" class="form-control" id="negara" placeholder="Nama Negara" disabled>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Kabupaten</label>
                                <input type="text" class="form-control" id="kabupaten" placeholder="Nama Kabupaten" disabled>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" placeholder="Nama Provinsi" disabled>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" placeholder="Nama Kecamatan" disabled>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div>
                        <input type="hidden" name="negara" id='neg'>
                        <input type="hidden" name="provinsi" id='pro'>
                        <input type="hidden" name="kabupaten" id='kab'>
                        <input type="hidden" name="kecamatan" id='kec'>
                        <input type="hidden" name="lat" id='lat'>
                        <input type="hidden" name="lon" id='lon'>
                    </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success btn-md">Tambah</button>
            </div>
        </form>
    </div>
</div>