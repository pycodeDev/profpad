<div class="container mt-2">
    <div class="card">
        <div class="card-header text-center">
            Data Galery
        </div>
        <div class="card-body text-center">     
            <div class="row">
                <div class="col-4 ">
                    <select class="form-control" id="wis">
                    <?php
                        foreach ($wisata as $var):
                    ?>
                            <option value="<?=$var['id_w']?>"><?=$var['nama_wisata']?></option>
                    <?php
                    endforeach;
                    ?>
                    </select>
                </div>
                <div class="col-8 text-left">
                    <button id="btn_wis" class="btn btn-md btn-success">Cari</button>
                    <span id="btn_tambah"></span>
                </div>
            </div>
            <table class='table' id="has_wis">
                <thead>
                    <th>No</th>
                    <th>Nama Wisata</th>
                    <th>Lokasi Wisata</th>
                    <th>Gambar Wisata</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <td colspan="4">Pilih Filter</td>
                </tbody>
            </table>
        </div>
    </div>
</div>