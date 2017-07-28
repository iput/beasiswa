<main>
	<div class="container">
		<h1 class="thin">Laporan Pemohon Beasiswa</h1>
	<div id="dashboard">
		<div class="section">
		<form>
			<div class="row">
				<div class="input-field col s2">
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
				<div class="input-field col s2">
				<label>Fakultas</label>
					<select>
						<option>Semua</option>
						<?php foreach ($fakultas as $rowFK): ?>
							<option value="<?php echo $rowFK['id'] ?>"><?php echo $rowFK['namaFk'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="input-field col s3">
				<label>jurusan</label>
					<select>
						<option>Semua</option>
						<?php foreach ($jurusan as $rowsJR): ?>
							<option value="<?php echo $rowsJR['id'] ?>"><?php echo $rowsJR['namaJur'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="input-field col s3">
				<label>Jenis Beasiswa</label>
					<select>
						<option>Semua</option>
						<?php foreach ($beasiswa as $rowsBea): ?>
							<option value="<?php echo $rowsBea['id'] ?>"><?php echo $rowsBea['namaBeasiswa'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="input-field col s2">
					<button type="submit" class="btn blue"><i class="material-icons left">search</i>Cari</button>
				</div>
			</div>
		</form>
		<div class="row">
			<div class="input-field col s5">
				<button  class="btn green"><i class="material-icons left">print</i>Cetak Data</button>
			</div>
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
		</table>
	</div>
	</div>
	</div>

</main>