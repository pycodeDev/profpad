<div class="container mt-2">
    <div class="card">
        <div class="card-header text-center">
            Tambah Akun 
        </div>
        <div class="card-body">
            <form action="<?=base_url()?>admin/act_t_a" method="post">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" >
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username" >
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password" >
                </div>
                <div class="form-group">
                    <label>Level Akun</label>
                    <select class="form-control" name="akses">
                        <option value="1">Administrator</option>
                        <option value="2">Content Writer</option>
                    </select>
                </div>
                <div class="card-footer text-right">
                <input type="submit" name="upload" class="btn btn-success btn-md" value="Tambah">
            </div>
            </form>
        </div>
    </div>
</div>