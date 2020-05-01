<?php
if (isset($edit_data)) {
  $lat = $edit_data['lat'];   
  $lon = $edit_data['lon'];
}else {
  $lat = '0.790990';
  $lon = '101.640015';
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/plugins/datatables/dataTables.bootstrap4.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/plugins/summernote/summernote-bs4.css">
  <!-- Leaflet Maps css -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/plugins/datatables/dataTables.bootstrap4.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/plugins/toastr/toastr.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    #mapid { height: 400px; width: 100% }
    #mapidedit { height: 400px; width: 100% }
  </style>
  		<script>
			var exports = {};
		</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> <?=$this->session->userdata('username')?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Settings</span>
          <div class="dropdown-divider"></div>
          <label class="ml-3"><?=$this->session->userdata('username')?> </label>: <i><?=$this->session->userdata('akses') ==1 ? 'Administrator' : 'Content Writer'?></i>
          <a href="<?=base_url()?>login/logout" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> Log Out
          </a>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url() ?>assets_admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sistem Wisata</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>assets_admin/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$this->session->userdata('nama')?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url()?>admin/index" class="nav-link <?= $this->uri->segments[2] == 'index' ? 'active' : '' ?>">
              <i class="fas fa-tachometer-alt nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/galeri" class="nav-link <?= $this->uri->segments[2] == 'galeri' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>Gallery</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/wisata" class="nav-link <?= $this->uri->segments[2] == 'wisata' ? 'active' : '' ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Wisata</p>
            </a>
          </li>
          <li class="nav-header" style="display:<?= $this->session->userdata('akses') == '2' ? 'none' : '' ?>">Laporan</li>
          <li class="nav-item" style="display:<?= $this->session->userdata('akses') == '2' ? 'none' : '' ?>">
            <a href="<?=base_url()?>admin/laporan" class="nav-link <?= $this->uri->segments[2] == 'laporan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-file-pdf"></i>
              <p>Lap. Wisata</p>
            </a>
          </li>
          <li class="nav-header">Pengaturan</li>
          <li class="nav-item " style="display:<?= $this->session->userdata('akses') == '2' ? 'none' : '' ?>">
            <a href="<?=base_url()?>admin/setting" class="nav-link <?= $this->uri->segments[2] == 'setting' ? 'active' : '' ?>" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Akun</p>
            </a>
          </li>
          <li class="nav-item " style="display:<?= $this->session->userdata('akses') == '2' ? 'none' : '' ?>">
            <a href="<?=base_url()?>admin/akun" class="nav-link <?= $this->uri->segments[2] == 'akun' ? 'active' : '' ?>" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text">Data Akun</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>login/logout" class="nav-link">
              <i class="nav-icon fas fa-lock text-info"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
      if (isset($content)) {
          echo $content;
      }
    ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?=date('Y')?> PycodeDev.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets_admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets_admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets_admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>assets_admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets_admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url() ?>assets_admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>assets_admin/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets_admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets_admin/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets_admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets_admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url() ?>assets_admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>assets_admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets_admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets_admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets_admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets_admin/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets_admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets_admin/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- Js Maps Leaflet  -->
<script src="https://unpkg.com/leaflet-drift-marker@1.0.3/lib/DriftMarker/Drift_Marker.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url() ?>assets_admin/plugins/toastr/toastr.min.js"></script>
<script>
  $(function () {
    $("#wisata").DataTable();
  });
</script>

<!-- Tambah Wisata -->
<script>
// data map 
var osmUrl = 'https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=stOvTjFchSGDaT6JwokJ',
    osmAttrib = '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
    osm = L.tileLayer(osmUrl, {
        maxZoom: 18,
        attribution: osmAttrib
    });
  
// zoom maps berada pada posisi lat dan lon yang telah ditentukan
var map = L.map('mapid').setView([0.790990, 101.640015], 7).addLayer(osm);

// marker diawali dengan daerah yang telah ditentukan
var marker = new Drift_Marker([0.790990, 101.640015], {
        draggable: true,
        title: "Resource location",
        alt: "Resource Location",
        riseOnHover: true
      }).addTo(map);

// edit data klik
function onMapClick(e) {
    var latlng = map.mouseEventToLatLng(e.originalEvent);
      marker.slideTo(	latlng, {
            duration: 2
          });
    var lat = latlng.lat;
    var longi = latlng.lng;
    $.ajax({
    url: 'https://api.longdo.com/map/services/address',
    type: 'POST',
    dataType: 'json',
    data: { 
      'key': '0c3afa061bddb01632612ec00019ca37',
      'lat': lat, 
      'lon' : longi
    } ,
    success: function (response) {
        console.log(response);
        var neg = response.country ? response.country : '<b>Tidak Ada</b>';
        var prov = response.province ? response.province : '<b>Tidak Ada</b>';
        var kab = response.district ? response.district : '<b>Tidak Ada</b>';
        var kec = response.subdistrict ? response.subdistrict : '<b>Tidak Ada</b>';
        marker.bindPopup("Negara : "+response.country+"<br>Provinsi : "+response.province+"<br>Kabupaten : "+kab+"<br>Kecamatan : "+kec ).openPopup();
        document.getElementById("negara").value = neg;
        document.getElementById("provinsi").value = prov;
        document.getElementById("kabupaten").value = response.district ? response.district : 'Tidak ada';
        document.getElementById("kecamatan").value = response.subdistrict ? response.subdistrict : 'Tidak Ada';
        // form send to database
        document.getElementById("neg").value = neg;
        document.getElementById("pro").value = prov;
        document.getElementById("kab").value = response.district ? response.district : 'Tidak ada';
        document.getElementById("kec").value = response.subdistrict ? response.subdistrict : 'Tidak Ada';
        document.getElementById("lat").value = lat;
        document.getElementById("lon").value = longi;
    },
    error: function () {
        alert("check your connection and refresh the page");
    }
}); 
  
}
map.on('click', onMapClick);
marker.slideTo(	[0.790990, 101.640015], {
  duration: 2
});
</script>

<!-- Edit Wisata -->
<script>
// data map 
var mapUrl = 'https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=stOvTjFchSGDaT6JwokJ',
    Attribute = '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
    osm1 = L.tileLayer(mapUrl, {
        maxZoom: 18,
        attribution: Attribute
    });
var lat = <?= $lat?>;
var lon = <?= $lon?>;
console.log(lon);
// zoom maps berada pada posisi lat dan lon yang telah ditentukan
var map = L.map('mapidedit').setView([lat, lon], 7).addLayer(osm1);

// marker diawali dengan daerah yang telah ditentukan
var marker = new Drift_Marker([lat, lon], {
        draggable: true,
        title: "Resource location",
        alt: "Resource Location",
        riseOnHover: true
      }).addTo(map);

// edit data klik
function onMapClick(e) {
    var latlng = map.mouseEventToLatLng(e.originalEvent);
      marker.slideTo(	latlng, {
            duration: 2
          });
    var lat = latlng.lat;
    var longi = latlng.lng;
    $.ajax({
    url: 'https://api.longdo.com/map/services/address',
    type: 'POST',
    dataType: 'json',
    data: { 
      'key': '0c3afa061bddb01632612ec00019ca37',
      'lat': lat, 
      'lon' : longi
    } ,
    success: function (response) {
        console.log(response);
        var neg = response.country ? response.country : '<b>Tidak Ada</b>';
        var prov = response.province ? response.province : '<b>Tidak Ada</b>';
        var kab = response.district ? response.district : '<b>Tidak Ada</b>';
        var kec = response.subdistrict ? response.subdistrict : '<b>Tidak Ada</b>';
        marker.bindPopup("Negara : "+response.country+"<br>Provinsi : "+response.province+"<br>Kabupaten : "+kab+"<br>Kecamatan : "+kec ).openPopup();
        document.getElementById("negara").value = neg;
        document.getElementById("provinsi").value = prov;
        document.getElementById("kabupaten").value = response.district ? response.district : 'Tidak ada';
        document.getElementById("kecamatan").value = response.subdistrict ? response.subdistrict : 'Tidak Ada';
        // form send to database
        document.getElementById("neg").value = neg;
        document.getElementById("pro").value = prov;
        document.getElementById("kab").value = response.district ? response.district : 'Tidak ada';
        document.getElementById("kec").value = response.subdistrict ? response.subdistrict : 'Tidak Ada';
        document.getElementById("lat").value = lat;
        document.getElementById("lon").value = longi;
    },
    error: function () {
        alert("check your connection and refresh the page");
    }
}); 
  
}
map.on('click', onMapClick);
marker.slideTo(	[lat, lon], {
  duration: 2
});
</script>
<?php if ($this->session->flashdata('fail_edit')): ?>
  <script type="text/javascript">
  $(function() {
      toastr.error('Gagal Mengedit Data')
  });

</script>
<?php endif; ?>

<?php if ($this->session->flashdata('fail_save')): ?>
  <script type="text/javascript">
  $(function() {
      toastr.error('Gagal Menyimpan Data')
  });

</script>
<?php endif; ?>

<?php if ($this->session->flashdata('success_edit')): ?>
  <script type="text/javascript">
  $(function() {
      toastr.success('Berhasil Mengedit Data')
  });

</script>
<?php endif; ?>

<?php if ($this->session->flashdata('success_save')): ?>
  <script type="text/javascript">
  $(function() {
      toastr.success('Berhasil Menyimpan Data')
  });

</script>
<?php endif; ?>

<?php if ($this->session->flashdata('success_d')): ?>
  <script type="text/javascript">
  $(function() {
      toastr.success('Data Berhasil Dihapus')
  });

</script>
<?php endif; ?>
<script>
  $("#btn_wis").click(function(){
    var id = $("#wis").val();
      get_data(id);
      var b = '<a href="<?=base_url()?>admin/t_galeri/'+ id +'" class="btn btn-md btn-info" style="color:#fff;">Tambah Data</a>';
      $('#btn_tambah').html(b);
      $("#btn_tambah").show();
      console.log(id);
  });

  function get_data(id){
      console.log(id);
    $.ajax({
        type: "POST",
        url: "<?=base_url()?>galeri/data_galeri",
        data: {id:id},
        dataType: 'json',
        success: function(data){
                var len = data.length;
                var no = 1;
                var hasil =[];
                var akses = '<?= $this->uri->segments[2] ?>';
                if (data[0].id_g != null) {
                    for (var i= 0; i < len; i++) {
                    var coba = '<a href="<?=base_url()?>galeri/act_d/'+ data[i].id_g +'" id="btn_tambah" class="btn btn-sm btn-danger text-white mx-1 my-1">Hapus</a> <a href="<?=base_url()?>admin/e_galeri/'+ data[i].id_g +'/'+ data[i].id_w +'" id="btn_tambah" class="btn btn-sm btn-warning text-white">Edit</a>';
                    var oo = '<a href="<?=base_url()?>admin/act_l/'+ data[i].id_g +'" id="btn_tambah" class="btn btn-sm btn-info text-white mx-1 my-1">Cetak</a>';
                    var aa = akses == 'galeri' ? coba : oo;
                    var row = $('<tr>' +
                                '<td>' + no + '</td>' +
                                '<td>' + data[i].nama_wisata + '</td>' +
                                '<td>' + data[i].lokasi + '</td>' + 
                                '<td><img style="border:1px solid #000;border-radius:10px;width:100px;height:100px" src="<?=base_url()?>uploads/'+ data[i].galeri_name +'"></td>' + '<td>'+ aa +'</td>');
                    
                    hasil.push(row);
                    no=no+1;
                    console.log(data)
                }
                $('#has_wis tbody').html(hasil);
                }else{
                    $('#has_wis tbody').html('<td colspan="5" align="center">Data Tidak Ada</td>');
                }
        },
        error: function() {
            $('#dt tbody').html('<td colspan="5" align="center">Error</td>');
        }
        });
    }
</script>
</body>
</html>
