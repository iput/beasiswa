<!-- Main START -->
<main>
    <div class="container">
        <h1 class="thin">Grafik perbandingan Pendaftar dan Penerima Beasiswa</h1>
        <div id="dashboard">
            <div class="section">

                <div class="row">
                  <?php
                  $nama_bea = array();
                  $terima = array();
                  $daftar = array();
                  foreach ($view_grafik as $vg) {
                    $nama_bea[] = $vg->namaBeasiswa;
                    $terima[] = $vg->penerima;
                    $daftar[] = $vg->mhsDaftar;
                  }
                   ?>
                  <div class="col m6">
                    <font size="4pt" class="blue-text">Pilih periode beasiswa: </font><br>
                    <select class="" name="pilih_tahun" id="pilih_tahun" onChange="refresh_chart()">
                      <option value="kosong">-Pilih Tahun</option>
                      <?php
                      foreach ($tahun as $th) {
                        if ($selected_tahun==$th->tahun) {
                          $selected="selected";
                        }else {
                          $selected="";
                        }
                        echo '<option value="'.$th->tahun.'" '.$selected.'>'.$th->tahun.'</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col m12">
                    <canvas id="grafik" style="overflow-x: scroll;"></canvas>
                  </div>
            </div>
        </div>
    </div>
    <!-- container END -->
</main>
<script type="text/javascript">
function refresh_chart() {
  id_data = $('#pilih_tahun').val();
  url = "<?php echo site_url('kasubag/ModulLaporan/viewGrafik')?>";
  window.location.href=url+'/'+id_data;
}
</script>

<script>
    var linechartData = {
        labels: <?php echo json_encode($nama_bea); ?>,
        datasets: [
            {
                label: "Penerima ",
                fillColor: "rgba(60,141,188,0.9)",
                strokeColor: "rgba(60,141,188,0.8)",
                pointColor: "#3b8bba",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(152,235,239,1)",
                data: <?php echo json_encode($terima) ?>
            },
            {
                label: "Pendaftar ",
                fillColor: "rgba(40,200,10,0.9)",
                strokeColor: "rgba(40,200,10,0.8)",
                pointColor: "#3b8bba",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(120,235,239,1)",
                data: <?php echo json_encode($daftar) ?>
            }
        ]
    }

    var options = {
      responsive: true,
      pointDotRadius: 10,
      bezierCurve: false,
      scaleShowVerticalLines: false,
    };
    var myLine = new Chart(document.getElementById("grafik").getContext("2d")).Bar(linechartData, options);
</script>