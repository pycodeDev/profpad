<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Freelancer - Start Bootstrap Theme</title>

  <!-- Custom fonts for this theme -->
  <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="<?php echo base_url() ?>assets/css/freelancer.min.css" rel="stylesheet">

</head>
<body id="page-top">

<!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#sejarah">Sejarah</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#info">Info Wisata</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#galery">Galery</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="<?= base_url() ?>assets/img/avataaars.svg" alt="">

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Start Bootstrap</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">Graphic Artist - Web Designer - Illustrator</p>

    </div>
  </header>

 <!-- Sejarah -->
  <section class="page-section bg-white text-black mb-0" id="sejarah">
    <!-- class="container"> -->

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-black">Sejarah</h2>

      <!-- Icon Divider -->
      <div class="divider-custom divider-black">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- About Section Content -->
      <div class="row">
        <div class="col-lg-4 ml-auto">
          <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional SASS stylesheets for easy customization.</p>
        </div>
        <div class="col-lg-4 mr-auto">
          <p class="lead">You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!</p>
        </div>
      </div>

      <!-- About Section Button -->
      <div class="text-center mt-4">
        <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/themes/freelancer/">
          <i class="fas fa-download mr-2"></i>
          Free Download!
        </a>
      </div>

    </!-->
  </section>
 <!-- end Sejarah -->

<!-- Contact Section -->
<section class="page-section bg-primary" id="info">
    <!-- Portfolio Section Heading -->
    <h2 class="page-section-heading text-center text-uppercase  text-white mb-0" >Info Wisata</h2>
    <!-- Icon Divider -->
    <div class="divider-custom">
      <div class="divider-custom-line" style="background-color:#fff"></div>
          <div class="divider-custom-icon">
            <i style="color:#fff" class="fas fa-star"></i>
          </div>	
      <div class="divider-custom-line" style="background-color:#fff"></div>
    </div>
    
    <div class="container">
      
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <?php $no=0; foreach ($join as $a): ?>
          <?php $no=$no+1; ?>
          
          <div class="carousel-item <?=$no == 1 ? 'active' : '' ?>" >
            <div class="col-6 mx-auto" >
              <div class="card" data-toggle="modal" data-target="#portfolioModal2<?=$a['id_w']?>">
             
                <div class="card-body" >
                  <!-- <a href="" style="text-decoration:none"> -->
                    <h4 class="card-title" ><?= $a['nama_wisata']?></h4>
                    <p class="card-text"><?=(str_word_count($a['deskripsi']) > 28 ? substr($a['deskripsi'],0,28).".. Baca Selengkapnya" : $a['deskripsi'])?></p>
                    <p class="card-text">
                      <small class="text-muted">Create By : <?= $a['nama']?></small>
                    </p>
                  <!-- </a> -->
                </div>
                
              </div>
            </div>
          </div>
          <?php endforeach ;?>

        </div>

        <a class="carousel-control-prev " href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon " aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>  


    </div>
</section>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="galery">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Galery</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      
    <!-- start buat disini --> 
      <div class="container" id="search_gal">
        <label>Pencarian</label>
        <div class="row">
          <div class="col-11">
            <div class="form-group">
              <select class="form-control" id="search_gg" >
                <?php foreach($wis as $b): ?>
                  <option value="<?= $b['id_w'] ?>"><?= $b['nama_wisata'] ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-1 text-right">
              <button id="btn_search" class="btn btn-md btn-success">Cari</button>
          </div>
        </div>
      </div>
    <!-- end buat disini -->
      <!-- Portfolio Grid Items -->
      <div class="text-center">
        <span class="mx-auto" id="text" style="display:none">Tidak Ada Data</span>
        <span class="mx-auto" id="first" style="display:block">Pilih Pencarian</span>
      </div>
      <div class="row" id="hasil">
        <!-- <div ></div> -->
      </div>
      <!-- /.row -->

      
</div>
  </section>

    <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">2215 John Daniel Drive
            <br>Clark, MO 65243</p>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Around the Web</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-linkedin-in"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About Freelancer</h4>
          <p class="lead mb-0">Freelance is a free to use, MIT licensed Bootstrap theme created by
            <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
        </div>

      </div>
    </div>
  </footer>


<!-- start modal -->

  <?php foreach ($join as $a): ?>
  <!-- Portfolio Modal 2 -->
  <div class="portfolio-modal modal fade" id="portfolioModal2<?= $a['id_w'] ?>" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-12">
                <h4 class="card-title"><?= $a['nama_wisata']?></h4>
                  <img class="card-img-top" src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" height="320px" style="border:1px solid #000;width:100%" >
              </div>
              <!-- <br> -->
              <div class="col-lg-12">
                <div class="row mt-2">
                  <div class="col-9 py-2 text-center bg-warning">
                    <p class="card-text"><?=$a['deskripsi']?></p>
                    <p class="card-text">
                      <small class="text-muted">Create By : <?= $a['nama']?></small>
                    </p>
                  </div>
                  <div class="col-3 bg-primary py-3" style="border-radius:2px;">
                    Maps
                    <img class="card-img-top" src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" height="320px" style="border:1px solid #000;width:160px" >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>

<!-- end modal-->



  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </section>

  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="<?= base_url() ?>assets/js/jqBootstrapValidation.js"></script>
  <script src="<?= base_url() ?>assets/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?= base_url() ?>assets/js/freelancer.min.js"></script>
  <script>
  $("#btn_search").click(function(){
      var id = $("#search_gg").val();
      get_data(id);
      $("#first").hide();
      // console.log(id);
  });

  function get_data(id){
      console.log(id);
    $.ajax({
        type: "POST",
        url: "<?=base_url()?>dashboard/data_search",
        data: {id:id},
        dataType: 'json',
        success: function(data){
          var hasil =[];
          if (data.length > 0) {
            for (let i = 0; i < data.length; i++) {
              var img = data[i].galeri_name;
              var nama = data[i].nama_wisata;
              var row = $('<div class="col-md-6 col-lg-4 mb-3"> <div class="card" style="width: 23rem;"> <img class="card-img-top" src="<?=base_url()?>uploads/'+ img +'" alt="img img-responsive" height="320px"> <div class="card-body"> <div class="card-footer text-center"> <h5 class="card-title">'+ nama +'</h5> </div></div></div></div>');
                        
              hasil.push(row);
            }
            $("#text").hide();
          } else {
            $("#text").show();
          }

          console.log(data);
          $('#hasil').html(hasil);
        },
        error: function() {
            $('#dt tbody').html('<td colspan="5" align="center">Error</td>');
        }
        });
    }
</script>
</body>

</html>
