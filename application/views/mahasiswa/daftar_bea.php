<!-- Main START -->
<main>
  <div class="container">
    <div id="dashboard">
      <div class="section">
        <div id="responsive" class="section">
          <div class="row">
            <div class="col s6">
              <h4>
                List Beasiswa
              </h4>
            </div>
          </div>
        <div class="row">
          <div class="col s12">
            <table class="striped" id="tabel">
              <thead>
                <tr>
                    <th data-field="id" style="width: 3%;">#</th>
                    <th data-field="bea">Beasiswa</th>
                    <th data-field="penyelenggara">Penyelenggara</th>
                    <th data-field="tglBuka">Tanggal Buka</th>
                    <th data-field="tglTutup">Tanggal Tutup</th>
                    <th data-field="keterangan">Keterangan</th>
                    <th data-field="aksi">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>BRI</td>
                  <td>Bank BRI</td>
                  <td>2017-08-01</td>
                  <td>2017-08-20</td>
                  <td class="success-text">Anda Sudah Terdaftar</td>
                  <td>
                    <a class="btn-floating waves-effect waves-light primary-color z-depth-0" title="Confirmed"><i class="material-icons">done</i></a>
                  </td
                </tr>
                <tr>
                  <td>2</td>
                  <td>Prestasi</td>
                  <td>UIN Maliki</td>
                  <td>2017-08-02</td>
                  <td>2017-08-22</td>
                  <td class="alert-text" style="max-width: 330px;">Scoring pekerjaan orang tua belum masuk</td>
                  <td>
                    <form action="<?php echo base_url('mahasiswa/C_daftar_bea/pengaturan')?>" method="post">
                      <button class="btn-floating waves-effect waves-light red" title="Not Confirmed" type="submit" name="idPengaturan" value="bismillah"><i class="mdi-action-account-balance-wallet"></i></button>
                    </form>
                  </td
                </tr>
                <tr>
                  <td>3</td>
                  <td>BNI</td>
                  <td>Bank BNI</td>
                  <td>2017-08-03</td>
                  <td>2017-08-23</td>
                  <td class="alert-text" style="max-width: 330px;"></td>
                  <td>
                    <form action="<?php echo base_url('mahasiswa/C_daftar_bea/pengaturan')?>" method="post">
                      <button class="btn-floating waves-effect waves-light red" title="Not Confirmed" type="submit" name="idPengaturan" value="bisa"><i class="mdi-action-account-balance-wallet"></i></button>
                    </form>
                  </td
                </tr>
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

document.addEventListener("DOMContentLoaded", function(event) {
  datatable();
});

function datatable() {
  dataTable = $('#tabel').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
        url:"<?php echo base_url('mahasiswa/C_daftar_bea/datatable'); ?>",
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
        sSearch: "Cari:"
    }
  });
}
</script>
