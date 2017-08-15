<!DOCTYPE html>
<html lang="en">

<!-- -------------------------------------------------+
Title: MateriAll - Admin Template
Framework: Materialize
Version: 1.0 stable
Author: Jozef Dvorský, http://www.creatingo.com
+-------------------------------------------------- -->


<!-- Mirrored from mate.creatingo.com/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Apr 2017 12:22:32 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="MateRio is a responsive Admin Template based on Material Design by Google.">
  <meta name="keywords" content="materialize, admin template, dashboard template, responsive admin template,">
  <title>MateriAll - Material Design Admin Template</title>
  <!-- -------------------------------------------------+
  Template Styles
  +-------------------------------------------------- -->
  <link href="<?php echo base_url('assets/css/materialize.css')?>" type="text/css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- Additional plugins styles -->
  <link href="<?php echo base_url('assets/css/plugins/prism.css')?>" type="text/css" rel="stylesheet" media="screen">
  <link href="<?php echo base_url('assets/css/plugins/simplebar.css')?>" type="text/css" rel="stylesheet" media="screen">
  <!-- Assistance.css are used only for template support. No need to use it on "production" -->
  <link href="<?php echo base_url('assets/css/assistance.css')?>" type="text/css" rel="stylesheet" media="screen">
  <style type="text/css">
  html,
  body{
    height: 100%;
  }
  main {
    padding: 0 !important;
  }
  .form-header {
    padding: 12px 24px 12px 12px;
  }
  .form-header .col{
    height:64px;
  }
  .form-body {
    padding: 12px 24px;
  }
  </style>
</head>

<body>

  <!-- Main Start -->
  <main class="valign-wrapper">
    <div class="container valign">

      <!--  Tables Section-->
      <div id="login" class="row">
        <!-- <h1 class="thin">Login</h1> -->
        <div class="col s12 m12 l12 card-panel">
          <form class="login-form">
            <div class="row primary-color form-header">
              <div class="col s4">
                <img src="<?php echo base_url('imgs/admin-logo-full.svg')?>" alt="logo" class="logo responsive-img-height">
              </div>
              <div class="col s8 right-align">
                <h4 class="light white-text">Formulir Pendaftaran Beasiswa <span class="blue-text"> <?php echo $namaBea->namaBeasiswa; ?></span></h4>
              </div>
            </div>
            <div class="row">
              <div class="col m6 s12">
                <div class="form-body">
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="mdi-action-lock-open prefix"></i>
                      <input id="username" type="text" class="validate">
                      <label for="username" class="center-align">NIM</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="mdi-action-perm-identity prefix"></i>
                      <input id="email" type="text" class="validate">
                      <label for="email" class="center-align">Nama Lengkap</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s2 m2 l1">
                      <i class="mdi-action-label-outline prefix"></i>
                    </div>
                    <div class="input-field col s10 m10 l11">
                      <select>
                        <option value="" disabled selected>-Pilihan Jurusan</option>
                        <?php
                          foreach ($jurusan as $jur) {
                            echo '<option value="'.$jur->id.'">'.$jur->namaJur.'</option>';
                          }
                         ?>
                      </select>
                      <label>Jurusan</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s2 m2 l1">
                      <i class="mdi-action-turned-in-not prefix"></i>
                    </div>
                    <div class="input-field col s10 m10 l11">
                      <select>
                        <option value="" disabled selected>-Pilihan Semester</option>
                        <?php
                        for ($i=1; $i < 15; $i++) {
                          echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                      </select>
                      <label>Semester</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="mdi-action-assignment prefix"></i>
                      <input id="username" type="text" class="validate">
                      <label for="username" class="center-align">SKS</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="mdi-action-book prefix"></i>
                      <input id="username" type="text" class="validate">
                      <label for="username" class="center-align">IPK</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="mdi-action-face-unlock prefix"></i>
                      <input id="username" type="text" class="validate">
                      <label for="username" class="center-align">Tempat Lahir</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="mdi-action-event prefix"></i>
                      <input id="username" type="text" class="validate">
                      <label for="username" class="center-align">Tanggal Lahir</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="mdi-action-home prefix"></i>
                      <input id="username" type="text" class="validate">
                      <label for="username" class="center-align">Alamat Asal</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="mdi-action-markunread-mailbox prefix"></i>
                      <input id="username" type="text" class="validate">
                      <label for="username" class="center-align">Alamat Malang</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="mdi-action-settings-cell prefix"></i>
                      <input id="username" type="text" class="validate">
                      <label for="username" class="center-align">Nomor Telepon</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col m6 s12">
                <div class="form-body">

                  <?php
                    echo $combo;
                   ?>

                  <div class="row">
                    <small class="blue-text">
                      **Pastikan semua data yang anda masukkan adalah benar. <br>
                      **Dengan meng-klik "Daftar Sekarang", berarti anda telah menyetuji prasyarat dan ketentuan yang telah ditetapkan oleh Kemahasiswaan.
                    </small>
                    <div class="input-field col s12 right">
                      <a href="register.html" class="btn-large waves-effect waves-light col s12 blue">Daftar Sekarang</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><!-- container end -->

  </main>
  <!-- Main End -->

  <!-- -------------------------------------------------+
  Template Scripts
  +-------------------------------------------------- -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/bin/jquery-2.1.4.min.js')?>"></script>
  <script>if (!window.jQuery) { document.write('<script src="<?php echo base_url('assets/js/bin/jquery-2.1.4.min.js')?>"><\/script>'); }</script>
  <!-- jQuery Plugins -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/bin/plugins/prism.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/bin/plugins/simplebar.min.js')?>"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?php echo base_url('assets/js/bin/materialize.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/bin/initialize.js')?>"></script>
  <!-- ScrollFire initialize -->

</body>

<!-- Mirrored from mate.creatingo.com/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Apr 2017 12:22:32 GMT -->
</html>
