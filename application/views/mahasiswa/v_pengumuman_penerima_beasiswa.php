<main>
  <div class="container">
    <div id="dashboard">
      <div class="section">
        <h4 class="header" align="center">PENGUMUMAN PENERIMA BEASISWA</h4>
        <div id="responsive" class="section">
          <div class="row">
            <form action="<?php echo base_url('mahasiswa/C_mahasiswa/searchFilter'); ?>" method="post" class="col s12">
              <div class="row">
                <div class="input-field col s2">
                  <select id="tahun" name="tahun">
                    <option value="" disabled selected>Pilih Tahun</option>
                    <?php
                    foreach ($tahun as $row) {
                      ;?>
                      <option value="<?php echo $row->tahun;?>"><?php echo $row->tahun;?></option>
                      <?php }?>
                  </select>
                  <label>Tahun</label>
                </div>

                <div class="input-field col s3">
                  <select id="fakultas" name="fakultas">
                    <option value="" disabled selected>Fakultas</option>
                    <?php
                    foreach ($fakultas as $row) {
                      ;?>
                      <option value="<?php echo $row->id;?>"><?php echo $row->namaFk;?></option>
                      <?php }?>
                    </select> 
                    <label>Fakultas</label>                   
                  </div>

                  <div class="input-field col s3" id="comboJurusan">
                    <select id="jurusan" name="jurusan">
                      <!-- <option value="" disabled selected>Jurusan</option> -->
                      <option value="6">Pilihlah Jurusan</option>
                    </select>
                    <label>Jurusan</label>
                  </div>
                  <div class="input-field col s3">
                    <select id="beasiswa" name="beasiswa">
                      <option value="" disabled selected>Beasiswa</option>
                      <?php
                    foreach ($beasiswa as $row) {
                      ;?>
                      <option value="<?php echo $row->id;?>"><?php echo $row->namaBeasiswa;?></option>
                      <?php }?>
                    </select>
                    <label>Nama Beasiswa</label>
                  </div>
                  <div class="input-field col s1">
                     <button class="waves-effect cyan lighten-2 btn" type="submit" name="filter" value="Filter Data">Filter
                     </button>
                  </div>
                </div>
              </form>
              <div class="row">
                <div id="striped" class="section">

                  <div class="col s12">
                    <table class="striped" id="tabel">
                      <thead>
                        <tr>
                          <th data-field="id">No</th>
                          <th data-field="id">Nim</th>
                          <th data-field="name">Nama</th>
                          <th data-field="price">Fakultas</th>
                          <th data-field="price">Jurusan</th>
                          <th data-field="price">Beasiswa</th>
                          <th data-field="price">Tahun</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php
                          $no=1;
                          foreach ($data as $key) 
                          {
                            ?>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $key->nim ;?></td>
                            <td><?php echo $key->namaLengkap ;?></td>
                            <td><?php echo $key->namaFk ;?></td>
                            <td><?php echo $key->namaJur ;?></td>
                            <td><?php echo $key->namaBeasiswa ;?></td>
                            <td><?php echo $key->tahun ;?></td>
                          </tr>
                          <?php }?> 
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
        url:"<?php echo base_url('mahasiswa/C_mahasiswa/datatable'); ?>",
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
        sSearch: "Cari :"
      }
    });
  }
</script>

<script type="text/javascript">
  function reload_table(){
    dataTable.ajax.reload(null,false);
  }
</script>

<script src="<?php echo base_url('assets/js/js-script.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery.js')?>"  type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#fakultas").change(function(){
      var fakultas = $("#fakultas").val();
      $.ajax({
        url: "<?php echo base_url('mahasiswa/C_mahasiswa/getjurusan'); ?>",
        type: "get",
        data: "fakultas="+fakultas,
        dataType: 'json',
        success: function(msg){   
                var fakultas=`<select id="jurusan" name="jurusan">
                <option value="6">Pilihlah Jurusan</option>`;
                for (var i = 0; i < msg.length; i++) {
                  fakultas+='<option value="'+msg[i].id+'">'+msg[i].namaJur+'</option>';
                }
                fakultas+=`</select>
                    <label>Jurusan</label>`;
                console.log(fakultas)
                $("#comboJurusan").html(fakultas);
                reloadJs('materialize', 'min');
                reloadJs('initialize', 'nomin');
              }
        });
    });
  });
</script>
