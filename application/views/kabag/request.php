<!-- Main START -->
<main>
  <div class="container">
    <div id="dashboard">
      <div class="section">
        <div id="responsive" class="section">
          <div class="row">
            <div class="col s6">
              <h4>
                Daftar Beasiswa
                <a class="btn-floating waves-effect waves-light primary-color z-depth-0" title="Confirmed"><i class="material-icons">add</i></a>
              </h4>
            </div>
            <div class="col s6">
              <p>
                <blockquote>
                <font size="4pt">Keterangan: </font><br> <i class="material-icons">radio_button_checked</i> = Kasubag. Kemahasiswaan. <br> <i class="material-icons">radio_button_unchecked</i> = Kasubag. Kemahasiswaan Fakultas. <br> <i class="material-icons">star</i> = Keduanya.
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
                    <th data-field="bea">Beasiswa</th>
                    <th data-field="dibuka">Dibuka</th>
                    <th data-field="berakhir">Berakhir</th>
                    <th data-field="selektor">Selektor</th>
                    <th data-field="status">Konfirm</th>
                    <th data-field="konfirmasi">Keterangan</th>
                    <th data-field="aksi">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>BRI</td>
                  <td>11 Agustus 2017</td>
                  <td>14 September 2017</td>
                  <td><i class="material-icons" title="Kasubag. Kemahasiswaan">radio_button_checked</i></td>
                  <td>
                    <a class="btn-floating waves-effect waves-light primary-color" title="Confirmed"><i class="material-icons">done</i></a>
                  </td>
                  <td class="success-text">Telah Dikonfirmasi</td>
                  <td>
                    <a class="btn-floating waves-effect waves-light" title="Kirim Permintaan"><i class="material-icons">send</i></a>
                    <a class="btn-floating waves-effect waves-light blue" title="Lihat Detail"><i class="material-icons">description</i></a>
                    <a class="btn-floating waves-effect waves-light yellow accent-4" title="Edit"><i class="material-icons">mode_edit</i></a>
                    <a class="btn-floating waves-effect waves-light red" title="Hapus"><i class="material-icons">delete</i></a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Prestasi</td>
                  <td>11 Agustus 2017</td>
                  <td>14 September 2017</td>
                  <td><i class="material-icons" title="Kasubag. Kemahasiswaan Fakultas">radio_button_unchecked</i></td>
                  <td>
                    <a class="btn-floating waves-effect waves-light red" title="Not Confirmed"><i class="material-icons">clear</i></a>
                  </td>
                  <td class="alert-text" style="max-width: 330px;">Scoring pekerjaan orang tua belum masuk</td>
                  <td>
                    <a class="btn-floating waves-effect waves-light" title="Kirim Permintaan"><i class="material-icons">send</i></a>
                    <a class="btn-floating waves-effect waves-light blue" title="Lihat Detail"><i class="material-icons">description</i></a>
                    <a class="btn-floating waves-effect waves-light yellow accent-4" title="Edit"><i class="material-icons">mode_edit</i></a>
                    <a class="btn-floating waves-effect waves-light red" title="Hapus"><i class="material-icons">delete</i></a>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>BNI</td>
                  <td>11 Agustus 2017</td>
                  <td>14 September 2017</td>
                  <td><i class="material-icons" title="Keduanya">star</i></td>
                  <td>
                    <a class="btn-floating waves-effect waves-light red" title="Not Confirmed"><i class="material-icons">clear</i></a>
                  </td>
                  <td class="alert-text" style="max-width: 330px;"></td>
                  <td>
                    <a class="btn-floating waves-effect waves-light" title="Kirim Permintaan"><i class="material-icons">send</i></a>
                    <a class="btn-floating waves-effect waves-light blue" title="Lihat Detail"><i class="material-icons">description</i></a>
                    <a class="btn-floating waves-effect waves-light yellow accent-4" title="Edit"><i class="material-icons">mode_edit</i></a>
                    <a class="btn-floating waves-effect waves-light red" title="Hapus"><i class="material-icons">delete</i></a>
                  </td>
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
  document.addEventListener("DOMContentLoaded", function(event) {
    datatable();
  });

  function datatable() {
    $('#tabel').DataTable( {
        // columnDefs: [
        //     {
        //         targets: [ 0, 1, 2 ],
        //         className: 'mdl-data-table__cell--non-numeric'
        //     }
        // ],
        columnDefs: [
            {
                targets: [ -1 ],
                orderable: false,
            }
        ],
        "dom": '<"row" <"col s6 m6 l3 left"l><"col s6 m6 l3 right"f>><"bersih tengah" rt><"bottom"ip>',
        language : {
            sLengthMenu: "Tampilkan _MENU_",
            sSearch: "Cari:"
        }
    });
  }
</script>
