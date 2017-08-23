<!-- Main START -->
<main>
<style media="screen">
  .informasi{
    position: fixed;
    float: right;
  }

  .isi-info{
    display: block;
    padding: 5px;
    color: #ffffff;
  }

  .jumlah-diterima{
    text-align: center;
    font-size: 15pt;
  }
</style>
<div class="alert primary-color informasi">
  <a href="javascript:;" onclick="viewDiterima">
  <span class="isi-info">
    Diterima
    <div class="jumlah-diterima">
      -
    </div>
  </span>
</a>
</div>

  <div class="container">
    <div id="dashboard">
      <div class="section">
        <div id="responsive" class="section">
          <div class="row">
            <div class="col m6 s12">
              <h4>
                Seleksi Penerima Beasiswa

              </h4>
            </div>
            <div class="col m6 s12">
              <p>
                <blockquote>
                  <font size="4pt" class="blue-text">Select Beasiswa: </font><br>
                  <select class="" name="filterBea" id="filterBea" onChange="viewTabel()">
                    <option value="kosong">-Pilih Beasiswa</option>
                    <?php
                    $arr=0;
                    foreach ($comboBea as $cb) {
                      echo "<option value='".$arr."-".$cb->id."'>".$cb->namaBeasiswa."</option>";
                      $arr+=1;
                    }
                    ?>
                  </select>
                  <div id="colorText" class="red-text">
                    <span id="infoSelektor"></span>
                  </div>
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
                    <th data-field="updated">Updated</th>
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
var myVar;

document.addEventListener("DOMContentLoaded", function(event) {
  //already
});

function viewTabel() {
  dataArr = $("#filterBea").val().split("-");
  this.idBea = dataArr[1];
  viewDetailBea(dataArr[0]);
  datatable();

  reloadJs('materialize', 'min');
  reloadJs('initialize', 'nomin');
}

function myTimer() {
  getDiterima();
  reload_table();
}

function viewDetailBea(indexArr) {
  if(indexArr!="kosong"){
    infoBea = <?php echo json_encode($comboBea)?>;
    selektor = infoBea[indexArr]['selektor'];
    if (selektor == "3") {
      $("#infoSelektor").html("[ 2 Selektor ]");
      $("#colorText").attr("class","red-text");
      this.myVar = setInterval(myTimer ,5000);
    } else {
      $("#infoSelektor").html("[ 1 Selektor ]");
      $("#colorText").attr("class","success-text");
      window.clearInterval(this.myVar);
    }
  } else {
    $("#infoSelektor").html("");
    window.clearInterval(this.myVar);
  }
  getDiterima();
}

function seleksi(idPendaftar, status)
{
  var url = "<?php echo site_url('kasubag/C_seleksi/seleksi')?>";
  $.ajax({
    url : url+"/"+idPendaftar+"/"+status,
    type: "POST",
    data: $('#formInput').serialize(),
    dataType: "JSON",
    success: function(data)
    {
      getDiterima();
      reload_table();
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      alert('Error adding/update data');
    }
  });
}

function reload_table(){
  dataTable.ajax.reload(null,false);
}

function getDiterima()
{
  if($("#filterBea").val()!="kosong"){
    dataArr = $("#filterBea").val().split("-");
    id_bea = dataArr[1];
    var url = "<?php echo site_url('kasubag/C_seleksi/getDiterima')?>";
    $.ajax({
      url : url+"/"+id_bea,
      type: "POST",
      dataType: "JSON",
      success: function(data)
      {
        $(".jumlah-diterima").html(data);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data!');
      }
    });
  }else{
    $(".jumlah-diterima").html("-");
  }
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
        "targets":[0,-1],
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
