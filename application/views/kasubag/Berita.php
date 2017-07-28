<!-- Main START -->
<main>
  <div class="container">
    <h1 class="thin">Berita</h1>
    <div id="dashboard">
      <div class="section">
      <div class="card-panel success" style="display: none;"></div>
      <a class="modal-trigger waves-effect waves-light btn blue" href="#tambahBerita"><i class="material-icons left">add</i>Tambah Berita</a>
        <table class="bordered striped" id="tabelBerita">
        	<thead>
        		<tr>
        			<td>#</td>
        			<td>Judul Berita</td>
        			<td>Topik Berita</td>
        			<td>Penulis</td>
        			<td>Tanggal Input Berita</td>
        			<td>Konten</td>
        			<td>Aksi</td>
        		</tr>
        	</thead>
        	<tbody id="dataBerita">
        		<?php foreach ($berita as $rows): ?>
        			<tr>
        				<td><?php echo $rows['idBerita'] ?></td>
        				<td><?php echo $rows['judulBerita'] ?></td>
        				<td><?php echo $rows['topikBerita'] ?></td>
        				<td><?php echo $rows['penulisBerita'] ?></td>
        				<td><?php echo $rows['tglInBerita'] ?></td>
        				<td><?php echo $rows['kontenBerita'] ?></td>
        				<td>
        					<a href="javascript:;" data="<?php echo $rows['idBerita'] ?>" class="btn-floating btn green btnEditBerita" ><i class="material-icons">mode_edit</i></a>
        					<a href="<?php echo base_url('kasubag/ModulBerita/hapusBerita/'.$rows['idBerita']) ?>" class="btn btn-floating red" onclick="return confirm('apakah anda yakin akan menghapus berita <?php echo $rows['judulBerita'] ?> ?')"><i class="material-icons">delete</i></a>
        				</td>
        			</tr>
        		<?php endforeach ?>
        	</tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- container END -->
</main>
  <div id="tambahBerita" class="modal">
    <div class="modal-content">
      <h4>Tambah Berita</h4>
      <form action="<?php echo base_url('kasubag/ModulBerita/tambahBerita') ?>" method="POST" >
      	<div class="row">
      		<div class="input-field">
      			<input type="text" name="judulBerita" id="judulBerita" class="validate">
      			<label for="judulBerita">Judul Berita Terbaru</label>
      		</div>
      	</div>
      	<div class="row">
      		<div class="input-field">
      			<input type="text" id="TopikBerita" name="TopikBerita" class="validate">
      			<label for="TopikBerita">Topik Berita</label>
      		</div>
      	</div>
      	<div class="row">
      		<div class="input-field">
      			<input type="text" name="penulisBerita">
      			<label for="penulisBerita">Nama Penulis</label>
      		</div>
      	</div>
      	<div class="row">
      		<div class="input-field">
      			<textarea name="kontenBerita" rows="8" class="materialize-textarea" id="kontenBerita"></textarea>
            <label for="kontenBerita">Isi Berita</label>
      		</div>
      	</div>
      	<div class="row">
      		<div class="input-field">
      			<a href="#!" class="modal-action modal-close waves-effect waves-green btn red"><i class="mdi-navigation-close left"></i>Tutup</a>
      			<button type="submit" class="btn green"><i class="material-icons left">done</i>Simpan Berita</button>
      		</div>
      	</div>
      </form>
    </div>
  </div>

  <div id="editBerita" class="modal">
    <div class="modal-content">
      <h4>EditBerita Berita</h4>
      <form action="<?php echo base_url('kasubag/modulBerita/updateBerita') ?>" method="POST" >
      	<div class="row">
      		<div class="input-field">
      		<input type="hidden" name="idBerita">
      			<input type="text" name="editjudulBerita" id="editjudulBerita" placeholder="..">
      			<label for="editjudulBerita">Judul Berita Terbaru</label>
      		</div>
      	</div>
      	<div class="row">
      		<div class="input-field">
      			<input type="text" id="editTopikBerita" name="editTopikBerita" placeholder="..">
      			<label for="editTopikBerita">Topik Berita</label>
      		</div>
      	</div>
      	<div class="row">
      		<div class="input-field">
      			<input type="text" name="editpenulisBerita" placeholder="..">
      			<label for="editpenulisBerita">Nama Penulis</label>
      		</div>
      	</div>
      	<div class="row">
      		<div class="input-field">
      			<textarea name="editkontenBerita" rows="8" class="materialize-textarea"></textarea>
      		</div>
      	</div>
      	<div class="row">
      		<div class="input-field">
      			<a href="#!" class="modal-action modal-close waves-effect red btn"><i class="mdi-navigation-cancel left"></i>Tutup</a>
      			<button type="submit" class="btn green"><i class="mdi-navigation-refresh left"></i>Update Berita</button>
      		</div>
      	</div>
      </form>
    </div>
  </div>
  <script type="text/javascript">
  	$(function() {
  		$('#dataBerita').on('click','.btnEditBerita', function() {
  			var id = $(this).attr('data');
  			$('#editBerita').openModal('show');
        $.ajax({
          type :'ajax',
          method : 'GET',
          url : '<?php echo base_url('kasubag/modulBerita/editBerita') ?>',
          data : {id:id},
          async : false,
          dataType : 'json',
          success : function(data){
            $('input[name=idBerita]').val(data.idBerita);
            $('input[name=editjudulBerita]').val(data.judulBerita);
            $('input[name=editTopikBerita]').val(data.topikBerita);
            $('input[name=editpenulisBerita]').val(data.penulisBerita);
            $('textarea[name=editkontenBerita]').val(data.kontenBerita);
          },
          error : function(e){
            alert(e);
          }
        });
  		});
  	});
  </script>
<script type="text/javascript">
  $('#tabelBerita').dataTable();
</script>