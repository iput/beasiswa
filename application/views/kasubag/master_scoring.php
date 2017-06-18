<!-- Main START -->
<main>
  <div class="container">
    <div id="dashboard">
      <div class="section">
        <div id="responsive" class="section">
          <div class="row">
            <div class="col s12 m6">
              <h4>
                Master Scoring Beasiswa
                <a class="btn-floating waves-effect waves-light primary-color z-depth-0" title="Confirmed"><i class="material-icons">add</i></a>
              </h4>
            </div>
          </div>
        <div class="row">
          <div class="col s12">
            <table class="striped" id="tabel">
              <thead>
                <tr>
                    <th data-field="id" style="width: 3%;">#</th>
                    <th data-field="jenis_scoring">Jenis Scoring</th>
                    <th data-field="opsi_scoring">(Bobot) Opsi Scoring</th>
                    <th data-field="aksi">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Rekening Listrik</td>
                  <td>
                    <div class="chip light-blue darken-1 white-text">(2) >100.000</div>
                    <div class="chip light-blue darken-2 white-text">(3) 81.000-100.000</div>
                    <div class="chip light-blue darken-3 white-text">(4) 51.000-80.0000</div>
                    <div class="chip light-blue darken-4 white-text">(5) <50.000</div>
                  </td>
                  <td>
                    <a class="btn-floating waves-effect waves-light yellow accent-4" title="Edit"><i class="material-icons">mode_edit</i></a>
                    <a class="btn-floating waves-effect waves-light red" title="Hapus"><i class="material-icons">delete</i></a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Pekerjaan Ayah</td>
                  <td>
                    <div class="chip light-blue darken-1 white-text">(2) Almarhum</div>
                    <div class="chip light-blue darken-2 white-text">(3) Tidak Bekerja</div>
                    <div class="chip light-blue darken-3 white-text">(4) Nelayan/Buruh</div>
                    <div class="chip light-blue darken-4 white-text">(5) Petani/Pedagang/Wiraswasta</div>
                    <div class="chip light-blue darken-3 white-text">(6) Pegawai Swasta</div>
                    <div class="chip light-blue darken-2 white-text">(7) Pegawai Negeri/TNI/Polri</div>
                  </td>
                  <td>
                    <a class="btn-floating waves-effect waves-light yellow accent-4" title="Edit"><i class="material-icons">mode_edit</i></a>
                    <a class="btn-floating waves-effect waves-light red" title="Hapus"><i class="material-icons">delete</i></a>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Pekerjaan Ibu</td>
                  <td>
                    <div class="chip light-blue darken-1 white-text">(2) Almarhum</div>
                    <div class="chip light-blue darken-2 white-text">(3) Tidak Bekerja</div>
                    <div class="chip light-blue darken-3 white-text">(4) Nelayan/Buruh</div>
                    <div class="chip light-blue darken-4 white-text">(5) Petani/Pedagang/Wiraswasta</div>
                    <div class="chip light-blue darken-3 white-text">(6) Pegawai Swasta</div>
                    <div class="chip light-blue darken-2 white-text">(7) Pegawai Negeri/TNI/Polri</div>
                  </td>
                  <td>
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
