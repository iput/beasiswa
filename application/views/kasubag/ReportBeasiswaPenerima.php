<main>
	<div class="container">
		<h1 class="thin">Laporan Penerima Beasiswa</h1>
	<div id="dashboard">
		<div class="section">
		<form>
			<div class="row">
				<div class="col s2">
				<label>tahun</label>
					<select>
						<option>Semua</option>
						<?php 
						$now = date('Y');
						for ($i=$now; $i > 1990; $i--) { 
							echo "<option value=".$i.">".$i."</option>";
						}
						 ?>
					</select>
				</div>
				<div class="col s2">
				<label>Fakultas</label>
					<select>
						<option>Semua</option>
						<?php foreach ($fakultas as $rowFK): ?>
							<option value="<?php echo $rowFK['id'] ?>"><?php echo $rowFK['namaFk'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col s3">
				<label>jurusan</label>
					<select>
						<option>Semua</option>
						<?php foreach ($jurusan as $rowsJR): ?>
							<option value="<?php echo $rowsJR['id'] ?>"><?php echo $rowsJR['namaJur'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col s3">
				<label>Jenis Beasiswa</label>
					<select>
						<option>Semua</option>
						<?php foreach ($beasiswa as $rowsBea): ?>
							<option value="<?php echo $rowsBea['id'] ?>"><?php echo $rowsBea['namaBeasiswa'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col s2">
					<button type="submit" class="btn blue"><i class="material-icons left">search</i>Cari</button>
				</div>
			</div>
		</form>
		<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    	<a class="btn-floating btn-large red">
      		<i class="large material-icons">print</i>
    	</a>
    		<ul>
      			<li><a class="btn-floating green" href="<?php echo base_url('kasubag/ModulLaporan/semuaData') ?>" title="Cetak Semua data"><i class="material-icons">view_headline</i></a></li>
      			<li><a class="btn-floating blue darken-1" title="Cetak data berdasarkan filter"><i class="material-icons">recent_actors</i></a></li>
    		</ul>
  		</div>
		<table class="striped highlight bordered">
			<thead>
				<tr>
					<td>NIM</td>
					<td>NAMA</td>
					<td>Fakultas</td>
					<td>Jurusan</td>
					<td>Jenis Beasiswa</td>
					<td>Tahun</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($detail as $rows): ?>
					<tr>
						<td><?php echo $rows['nim'] ?></td>
						<td><?php echo $rows['namaLengkap'] ?></td>
						<td><?php echo $rows['namaFk'] ?></td>
						<td><?php echo $rows['namaJur'] ?></td>
						<td><?php echo $rows['namaBeasiswa'] ?></td>
						<td><?php echo $rows['angkatan'] ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	</div>
	</div>

</main>