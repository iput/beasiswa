<!-- Main START -->
<main>
  <div class="container">
    <div id="dashboard">
      <div class="section">
        <div id="responsive" class="section">
          <form id="formInput">
          <div class="row">
            <h4>
              Pengaturan Beasiswa <span class="blue-text"><?php echo $nama; ?></span>
            </h4>
            <?php
              if ($keterangan!=null) {
                echo '
                  <div class="row">
                    <div class="col m12">
                      <div class="card-panel primary-color">
                        <span>
                        Catatan: <span class="alert-text">'.$keterangan.'</span>
                        </span>
                      </div>
                    </div>
                  </div>
                ';
              }
             ?>
            <div class="col m6">
              <div class="card-panel">
                <div class="row">
                  <div class="col s12">
                    <div class="row">
                      <input name="idSetBea" type="hidden" class="validate" value="<?php echo $idSetBea;?>">
                      <div class="input-field col m12">
                        <i class="material-icons prefix">local_library</i>
                        <input id="nama" name="nama" type="text" class="validate" value="<?php echo $nama;?>">
                        <label for="nama">Nama Beasiswa</label>
                      </div>
                      <div class="input-field col m12">
                        <i class="material-icons prefix">location_city</i>
                        <input id="penyelenggara" name="penyelenggara" type="text" class="validate" value="<?php echo $penyelenggara;?>">
                        <label for="penyelenggara">Penyelenggra</label>
                      </div>
                      <div class="input-field col m12">
                        <i class="material-icons prefix">alarm</i>
                        <input id="dibuka" name="dibuka" type="date" class="validate datepicker" value="<?php echo $dibuka;?>">
                        <label for="dibuka">Beasiswa Dibuka <span>*Thn-Bln-Tgl</span></label>
                      </div>
                      <div class="input-field col m12">
                        <i class="material-icons prefix">alarm_off</i>
                        <input id="ditutup" name="ditutup" type="date" class="validate datepicker" value="<?php echo $ditutup;?>">
                        <label for="ditutup">Beasiswa Ditutup <span>*Thn-Bln-Tgl</span></label>
                      </div>
                      <div class="input-field col m12">
                        <i class="material-icons prefix">open_in_browser</i>
                        <input id="kuota" name="kuota" type="text" class="validate" value="<?php echo $kuota;?>">
                        <label for="kuota">Kuota</label>
                      </div>
                      <div class="input-field col m12">
                        <i class="material-icons" style="font-size: 2rem; margin-right: 10px;">account_circle</i>
                        Selektor Penerima Beasiswa
                        <br>
                        <?php
                            $kms="";
                            $fks="";
                            $dua="";
                            if ($selektor=="1") {
                              # kasubag kemahasiswaan
                              $kms = "checked";
                            }elseif ($selektor=="2") {
                              # kasubag kemahasiswaan fakultas
                              $fks = "checked";
                            }elseif ($selektor=="3") {
                              # keduanya
                              $dua = "checked";
                            }
                         ?>
                        <input class="with-gap" name="selektor" type="radio" value="1" id="kemahasiswaan" <?php echo $kms; ?>>
                        <label for="kemahasiswaan">Kasubag Kemahasiswaan</label>
                        <br>
                        <input class="with-gap" name="selektor" type="radio" value="2" id="fakultas" <?php echo $fks; ?>>
                        <label for="fakultas">Kasubag Fakultas</label>
                        <br>
                        <input class="with-gap" name="selektor" type="radio" value="3" id="keduanya" <?php echo $dua; ?>>
                        <label for="keduanya">Keduanya</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col m10">
                    <a href="<?php echo base_url('kasubag/C_requested')?>" class="waves-effect waves-light btn"><i class="material-icons left">navigate_before</i>Kembali</a>
                    <button class="waves-effect waves-light btn blue" onclick="save('<?php echo $nama?>')" type="button">Simpan<i class="material-icons right">navigate_next</i></button>
                  </div>
                  <div class="col m2">
                    <?php
                      if ($idSetBea != "") {
                    ?>
                        <button type="button" onclick="remove_data('<?php echo $idSetBea ?>', '<?php echo $nama ?>')" class="btn-floating waves-effect waves-light red" title="Hapus Pengaturan Beasiswa"><i class="material-icons">clear</i></button>
                    <?php
                      }
                     ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col m6">
              <div class="card-panel">
                <div class="row">
                  <div class="col s12">
                    <div class="row" id="scoring">
                      <!-- area scoring -->
                      <?php
                        $arrPhp = 0;
                        $metode = "add";
                        if ($idSetBea != null) {
                          $metode = "update";
                          foreach ($skor as $sk) {
                            $dt = '
                            <div class="input-field col m12">
                              <input type="hidden" name="idSet[]" value="'.$sk->id.'">
                              <select name="score[]">
                                <option value="" disabled selected>-Pilihan</option>
                            ';
                            foreach ($combo as $cm) {
                              if ($sk->idKategoriSkor == $cm->id) {
                                $dt .= '<option value="'.$cm->id.'" selected>'.$cm->nama.'</option>';
                              }else {
                                $dt .= '<option value="'.$cm->id.'">'.$cm->nama.'</option>';
                              }
                            }
                            $dt .= '
                                <option value="HAPUS">-HAPUS-</option>
                              </select>
                              <label>Scoring '.($arrPhp+1).'</label>
                            </div>
                            ';
                            echo $dt;
                            $arrPhp+=1;
                          }
                        }
                       ?>
                    </div>
                    <hr>
                    <button class="btn-floating waves-effect waves-light" title="Tambah Scoring" onclick="add_score()" type="button"><i class="material-icons">add</i></button>
                    Tambahkan untuk scoring beasiswa. <br><br><small class="blue-text">**Pilihan "HAPUS" untuk menghapus scoring.</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- container END -->
</main>
<script type="text/javascript">
  var arr = <?php echo $arrPhp ?>;
  var save_method = '<?php echo $metode ?>';

  document.addEventListener("DOMContentLoaded", function(event) {
    // document ready
  });

  function save(nama)
  {
    var url;
    if(save_method == 'add')
    {
      url = "<?php echo site_url('kasubag/C_requested/add_data')?>";
    }
    else
    {
      url = "<?php echo site_url('kasubag/C_requested/update_data')?>";
    }
    $.ajax({
      url : url,
      type: "POST",
      data: $('#formInput').serialize(),
      dataType: "JSON",
      success: function(data)
      {
        window.location.href="<?php echo base_url('kasubag/C_requested')?>";
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error adding/update data');
      }
    });
  }

  function add_score() {
    $.ajax({
      url : "<?php echo site_url('kasubag/C_requested/get_scoring_data')?>",
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        score = `
          <div class="input-field col m12">
            <input type="hidden" name="idSet[]" value="">
            <select name="score[]">
              <option value="" disabled selected>-Pilihan</option>`;
        for (var i = 0; i < data.length; i++) {
          score +='<option value="'+data[i].id+'">'+data[i].nama+'</option>';
        }
        score +=`
              <option value="HAPUS">-HAPUS-</option>
            </select>
            <label>Scoring `+(arr+1)+`</label>
          </div>
        `;
        $("#scoring").append(score);
        arr+=1;
        reloadJs('materialize', 'min');
        reloadJs('initialize', 'nomin');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data');
      }
    });
  }

  function remove_data(id, nama) {
    swal({
  		title: '"'+nama+'"',
  		text: "Apakah anda yakin ingin menghapus pengaturan beasiswa ini?",
  		type: "warning",
  		showCancelButton: true,
  		confirmButtonColor: '#F44336',
  		confirmButtonText: 'Hapus',
  		cancelButtonText: "Batal",
  		closeOnConfirm: false,
  		closeOnCancel: false
  	},
  	function(isConfirm){
      if (isConfirm){
        $.ajax({
          url : "<?php echo site_url('kasubag/C_requested/delete_data')?>",
          type: "POST",
          dataType: "JSON",
          data: {'idSetBea': id},
          success: function(data)
          {
            swal("Terhapus :(", "Jenis pengaturan beasiswa telah berhasil dihapus!", "success");
            window.location.href = "<?php echo site_url('kasubag/C_requested')?>";
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            swal("Erorr!", "Terjadi masalah saat penghapusan data!", "error");
          }
        });
      } else {
        swal("Dibatalkan :)", "Penghapusan jenis scoring dibatalkan!", "error");
      }
  	});
  }
</script>
