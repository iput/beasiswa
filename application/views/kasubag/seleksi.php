<!-- Main START -->
<main>
  <div class="container">
    <div id="dashboard">
      <div class="section">
        <div id="responsive" class="section">
          <div class="row">
            <div class="col s6">
              <h4>
                Seleksi Penerima Beasiswa
              </h4>
            </div>
            <div class="col s6">
              <p>
                <blockquote>
                  <font size="4pt" class="blue-text">Select Beasiswa: </font><br>
                  <select class="" name="filterBea" id="filterBea" onChange="viewTabel()">
                    <option value="0">-Pilih Beasiswa</option>
                    <?php
                    foreach ($comboBea as $cb) {
                      echo "<option value='".$cb->id."'>".$cb->namaBeasiswa."</option>";
                    }
                    ?>
                  </select>
                </blockquote>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <table class="striped" id="tabel">
                <thead>
                  <tr>
                    <th data-field="id" style="width: 3%;">#</th>
                    <th data-field="nim">NIM</th>
                    <th data-field="nama">Nama</th>
                    <th data-field="ipk">IPK</th>
                    <th data-field="skor">Skor</th>
                    <th data-field="jumlah">Nilai</th>
                    <th data-field="aksi">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- container END -->
</main>
<script type="text/javascript">

var dataTable;
var idBea;

document.addEventListener("DOMContentLoaded", function(event) {
  // datatable();
});

function viewTabel() {
  this.idBea = $("#filterBea").val();
  datatable();

  reloadJs('materialize', 'min');
  reloadJs('initialize', 'nomin');
}

function datatable() {
  dataTable = $('#tabel').DataTable({
    "destroy":true,
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"<?php echo base_url('kasubag/C_seleksi/datatable'); ?>/"+this.idBea,
      type:"POST"
    },
    "columnDefs":[
      {
        "targets":[2,-1],
        "orderable":false,
      },
    ],
    "dom": '<"row" <"col s6 m6 l3 left"l><"col s6 m6 l3 right"f>><"bersih tengah" rt><"bottom"ip>',
    language : {
      sLengthMenu: "Tampilkan _MENU_",
      sSearch: "Cari"
    }
  });
}
</script>
