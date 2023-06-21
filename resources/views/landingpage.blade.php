<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>KOPERASI POLIBATAM</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo-poltek.png" />
    <link rel="manifest" href="assets/img/favicons/manifest.json" />
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png" />
    <meta name="theme-color" content="#ffffff" />

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
          <a class="navbar-brand" href="index.html"><img src="assets/img/koperasi-polibatam.png.png" height="31" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"> </span>
          </button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#feature">Fitur</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#validation">Keunggulan</a></li>
              <!-- <li class="nav-item"><a class="nav-link" aria-current="page" href="#superhero">Pricing</a></li> -->
              <!-- <li class="nav-item"><a class="nav-link" aria-current="page" href="#marketing">Resources</a></li> -->
            </ul>
            <div class="d-flex ms-lg-4"><a class="btn btn-secondary-outline" href="{{ route('login') }}">Masuk</a><a class="btn ms-3" href="/register" style="background-color: #F2D230">Daftar</a></div>
          </div>
        </div>
      </nav>
      <section class="pt-7">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
              <h1 class="mb-4 fs-9 fw-bold">Koperasi Polibatam</h1>
              <p class="mb-6 lead text-secondary">Koperasi Polibatam yang akan digunakan, oleh<br class="d-none d-xl-block" />untuk para staff yang berada di<br class="d-none d-xl-block" />Politeknik Negeri Batam.</p>
              <div class="text-center text-md-start">
                <a class="btn me-3 btn-lg" style="background-color: #F2D230" href="#!" role="button">Masuk</a
                ><a class="btn btn-link fw-medium" style="color: #F2D230" href="#!" role="button" data-bs-toggle="modal" data-bs-target="#popupVideo"><span class="fas fa-play me-2"></span>Tonton Video Presentasi </a>
              </div>
            </div>
            <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid" src="assets/img/hero/hero-img.png" alt="" /></div>
          </div>
        </div>
      </section>

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5 pt-md-9 mb-6" id="feature">
        <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block" style="background-image: url(assets/img/category/shape.png); opacity: 0.5"></div>
        <!--/.bg-holder-->

        <div class="container">
          <h1 class="fs-9 fw-bold mb-4 text-center">Koperasi Polibatam <br class="d-none d-xl-block" />Memiliki Fitur Sebagai Berikut</h1>
          <div class="row">
            <div class="col-lg-3 col-sm-6 mb-2">
              <img class="mb-3 ms-n3" src="assets/img/category/icon1.png" width="75" alt="Feature" />
              <h4 class="mb-3">Simpanan</h4>
              <p class="mb-0 fw-medium text-secondary">Para Staff Dapat Menyimpan Dana Yang Diperoleh,</p>
            </div>
            <div class="col-lg-3 col-sm-6 mb-2">
              <img class="mb-3 ms-n3" src="assets/img/category/icon2.png" width="75" alt="Feature" />
              <h4 class="mb-3">Pinjaman</h4>
              <p class="mb-0 fw-medium text-secondary">Para Staff Dapat Meminjam Dana Yang di Sediakan Koperasi Polibatam</p>
            </div>
            <div class="col-lg-3 col-sm-6 mb-2">
              <img class="mb-3 ms-n3" src="assets/img/category/icon3.png" width="75" alt="Feature" />
              <h4 class="mb-3">Ramah Pengguna</h4>
              <p class="mb-0 fw-medium text-secondary">Pengguna dapat menggunakan Koperasi Polibatam dengan Mudah.</p>
            </div>
            <div class="col-lg-3 col-sm-6 mb-2">
              <img class="mb-3 ms-n3" src="assets/img/category/icon4.png" width="75" alt="Feature" />
              <h4 class="mb-3">Proses Cepat</h4>
              <p class="mb-0 fw-medium text-secondary">Pengguna Dapat Melakukan Simpan dan Pinjam Dengan Cepat.</p>
            </div>
          </div>
          <div class="text-center"><a class="btn" style="background-color: #F2D230" href="/register" role="button">Daftar Sekarang</a></div>
        </div>
        <!-- end of .container-->
      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <!-- <section class="pt-5" id="validation">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h5 class="text-secondary">Effortless Validation for</h5>
              <h2 class="mb-2 fs-7 fw-bold">Design Professionals</h2>
              <p class="mb-4 fw-medium text-secondary">The Myspace page defines the individual,his or her characteristics, traits, personal choices and the overall<br />personality of the person.</p>
              <h4 class="fs-1 fw-bold">Accessory makers</h4>
              <p class="mb-4 fw-medium text-secondary">While most people enjoy casino gambling, sports betting,<br />lottery and bingo playing for the fun</p>
              <h4 class="fs-1 fw-bold">Alterationists</h4>
              <p class="mb-4 fw-medium text-secondary">If you are looking for a new way to promote your business<br />that won't cost you money,</p>
              <h4 class="fs-1 fw-bold">Custom Design designers</h4>
              <p class="mb-4 fw-medium text-secondary">If you are looking for a new way to promote your business<br />that won't cost you more money,</p>
            </div>
            <div class="col-lg-6"><img class="img-fluid" src="assets/img/validation/validation.png" alt="" /></div>
          </div>
        </div>
       
      </section> -->
      <!-- end of .container-->
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <!-- <section class="pt-5" id="manager">
        <div class="container">
          <div class="row">
            <div class="col-lg-6"><img class="img-fluid" src="assets/img/manager/manager.png" alt="" /></div>
            <div class="col-lg-6">
              <h5 class="text-secondary">Easier decision making for</h5>
              <p class="fs-7 fw-bold mb-2">Product Managers</p>
              <p class="mb-4 fw-medium text-secondary">The Myspace page defines the individual,his or her characteristics, traits, personal choices and the overall<br />personality of the person.</p>
              <div class="d-flex align-items-center mb-3">
                <img class="me-sm-4 me-2" src="assets/img/manager/tick.png" width="35" alt="tick" />
                <p class="fw-medium mb-0 text-secondary">Never worry about overpaying for your<br />energy again.</p>
              </div>
              <div class="d-flex align-items-center mb-3">
                <img class="me-sm-4 me-2" src="assets/img/manager/tick.png" width="35" alt="tick" />
                <p class="fw-medium mb-0 text-secondary">We will only switch you to energy companies<br />that we trust and will treat you right</p>
              </div>
              <div class="d-flex align-items-center mb-3">
                <img class="me-sm-4 me-2" src="assets/img/manager/tick.png" width="35" alt="tick" />
                <p class="fw-medium mb-0 text-secondary">We track the markets daily and know where the<br />savings are.</p>
              </div>
            </div>
          </div>
        </div>
        
      </section> -->
      <!-- end of .container-->
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5" id="validation">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h5 class="text-secondary">Keunggulan dari</h5>
              <p class="mb-2 fs-8 fw-bold">Koperasi Polibatam</p>
              <p class="mb-4 fw-medium text-secondary">Koperasi Polibatam adalah sebuah koperasi yang beroperasi<br />di kawasan Politeknik Negeri Batam. Koperasi Polibatam<br />memiliki beberapa keunggulan.</p>
              <h4 class="fw-bold fs-1">Keamanan dan Kepercayaan</h4>
              <p class="mb-4 fw-medium text-secondary">Koperasi Polibatam memberikan kepastian dan keamanan<br />terhadap simpanan dan transaksi keuangan Anda</p>
              <h4 class="fw-bold fs-1">Kualitas Layanan</h4>
              <p class="mb-4 fw-medium text-secondary">
                Koperasi Polibatam mengutamakan kualitas layanan <br />
                dengan menjamin responsifitas dan kecepatan
              </p>
            </div>
            <div class="col-lg-6"><img class="img-fluid" src="assets/img/marketer/marketer.png" alt="" /></div>
          </div>
        </div>
        <!-- end of .container-->
      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-md-11 py-8" id="superhero">
        <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block background-position-top" style="background-image: url(assets/img/superhero/oval.png); opacity: 0.5; background-position: top !important"></div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <h1 class="fw-bold mb-4 fs-7">Butuh Koperasi Polibatam?</h1>
              <p class="mb-5 text-info fw-medium">Anda mecari solusi keuangan yang aman,mudah, dan memberikan manfaat nyata?<br />Koperasi Polibatam hadir untuk memenuhi kebutuhan Anda</p>
              <a class="btn btn-secondary-outline btn-md" href="/login">Masuk</a>
              <a class="btn btn-md" style="background-color: #F2D230" href="/register">Daftar</a>
            </div>
          </div>
        </div>
        <!-- end of .container-->
      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <!-- <section class="pt-5" id="marketing">
        <div class="container">
          <h1 class="fw-bold fs-6 mb-3">Marketing Strategies</h1>
          <p class="mb-6 text-secondary">Join 40,000+ other marketers and get proven strategies on email marketing</p>
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card">
                <img class="card-img-top" src="assets/img/marketing/marketing01.png" alt="" />
                <div class="card-body ps-0">
                  <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                  <h3 class="fw-bold">Increasing Prosperity With Positive Thinking</h3>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card">
                <img class="card-img-top" src="assets/img/marketing/marketing02.png" alt="" />
                <div class="card-body ps-0">
                  <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                  <h3 class="fw-bold">Motivation Is The First Step To Success</h3>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card">
                <img class="card-img-top" src="assets/img/marketing/marketing03.png" alt="" />
                <div class="card-body ps-0">
                  <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                  <h3 class="fw-bold">Success Steps For Your Personal Or Business Life</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
      <!-- end of .container-->
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <!-- <section class="pb-2 pb-lg-5">
        <div class="container">
          <div class="row border-top border-top-secondary pt-7">
            <div class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1"><img class="mb-4" src="assets/img/koperasi-polibatam.png.png" width="184" alt="" /></div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-3 order-md-3 order-lg-2">
              <p class="fs-2 mb-lg-4">Quick Links</p>
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">About us</a></li>
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Blog</a></li>
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Contact</a></li>
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">FAQ</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-4 order-md-4 order-lg-3">
              <p class="fs-2 mb-lg-4">Legal stuff</p>
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Disclaimer</a></li>
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Financing</a></li>
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Privacy Policy</a></li>
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Terms of Service</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0 order-2 order-md-2 order-lg-4">
              <p class="fs-2 mb-lg-4">knowing you're always on the best energy deal.</p>
              <form class="mb-3">
                <input class="form-control" type="email" placeholder="Enter your phone Number" aria-label="phone" />
              </form>
              <button class="btn btn-warning fw-medium py-1">Sign up Now</button>
            </div>
          </div>
        </div>
      </section> -->
      <!-- end of .container-->
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="text-center py-0">
        <div class="container">
          <div class="container border-top py-3">
            <div class="row justify-content-between">
              <div class="col-12 col-md-auto mb-1 mb-md-0">
                <p class="mb-0">&copy; Koperasi Polibatam</p>
              </div>
              <!-- <div class="col-12 col-md-auto">
                <p class="mb-0">Made with<span class="fas fa-heart mx-1 text-danger"> </span>by <a class="text-decoration-none ms-1" href="https://themewagon.com/" target="_blank">ThemeWagon</a></p>
              </div> -->
            </div>
          </div>
        </div>
        <!-- end of .container-->
      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <iframe
            class="rounded"
            style="width: 100%; height: 500px"
            src="https://www.youtube.com/embed/_lhdhL4UDIo"
            title="YouTube video player"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
      </div>
    </div>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet" />
  </body>
</html>
