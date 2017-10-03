<!-- Main START -->
<main>
  <div class="container">
    <h1 class="thin">Tambah berita</h1>
    <div id="dashboard">
      <div class="section">
      <h4>Edit Berita</h4>
      <form action="<?php echo base_url('staf_kemahasiswaan/modulBerita/updateBerita') ?>" method="POST" >
        <div class="row">
          <div class="input-field">
          <input type="hidden" name="idBerita" value="<?php echo $berita->idBerita ?>">
            <input type="text" name="editjudulBerita" id="editjudulBerita" value="<?php echo $berita->judulBerita ?>">
            <label for="editjudulBerita">Judul Berita Terbaru</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field">
            <input type="text" id="editTopikBerita" name="editTopikBerita" value="<?php echo $berita->topikBerita ?>">
            <label for="editTopikBerita">Topik Berita</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field">
            <input type="text" name="editpenulisBerita" value="<?php echo $berita->penulisBerita ?>">
            <label for="editpenulisBerita">Nama Penulis</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field">
            <textarea name="editkontenBerita" rows="8" class="materialize-textarea"><?php echo $berita->kontenBerita ?></textarea>
          </div>
        </div>
        <div class="row">
          <div class="input-field">
            <a href="<?php echo base_url('staf_kemahasiswaan/C_Staff/daftarBerita') ?>" class="modal-action modal-close waves-effect red btn"><i class="mdi-navigation-cancel left"></i>Tutup</a>
            <button type="submit" class="btn green"><i class="mdi-navigation-refresh left"></i>Update</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
  <!-- container END -->
</main>
<script type="text/javascript">
  $(function(){
    CKEDITOR.replace('editkontenBerita');
  });
</script>