 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Data Penerima beasiswa</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/main.min.css'); ?>">
    </head>
    <body onload="window.print();">
        <div class="wrapper">
            <!-- Main content -->
            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <img width="35px" height="25px" src="<?php echo base_url('imgs/admin-logo-full.svg'); ?>">&nbsp;Data Penerima Beasiswa
                            <small class="pull-right">Tanggal : <?php echo date('Y-m-d'); ?></small>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        Data rekap penerima beasiswa
                        <address>
                            <strong>Kemahasiswan UIN Maulana Malik Ibrahim Malang</strong><br>
                            Jalan  Gajayana Nomor 50 Kecamatan Lowokwaru Malang<br>
                        </address>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php foreach ($databea as $data): ?>
                    <?php 
                    $id = $data['nim'];
                    $namauser = $data['namaLengkap'];
                    $fakultas = $data['namaFk'];
                    $jurusan = $data['namaJur'];
                    $angkatan = $data['angkatan'];

                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $namauser; ?></td>
                            <td><?php echo $fakultas; ?></td>
                            <td><?php echo $jurusan; ?></td>
                            <td><?php echo $angkatan; ?></td>
                        </tr>
                    <?php endforeach; ?>      
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">Jumlah Total</td>
                                    <td >1</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.col -->      
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- ./wrapper -->
    </body>
</html>
