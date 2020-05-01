<div class="container mt-2">
    <div class="card">
        <div class="card-header text-center">
            Data Akun
        </div>
        <div class="card-body text-center">
            <table class='table' id="has_wis">
                <thead>
                    <th>No</th>
                    <th>Nama Akun</th>
                    <th>Username</th>
                    <th>Akses</th>
                </thead>
                <?php
                $no=1;
                foreach ($wisata as $val):
                    ?>
                <tbody>
                    <td><?=$no++?></td>
                    <td><?=$val['nama']?></td>
                    <td><?=$val['username']?></td>
                    <td><?=$val['akses'] == 1 ? '<b>Admin</b>' : '<b>Content Writer</b>'?></td>
                </tbody>
                <?php
                endforeach;
                ?>
            </table>
        </div>
    </div>
</div>