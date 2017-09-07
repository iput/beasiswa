<main>
    <div class="container">
        <h1 class="thin">Laporan Penerima Beasiswa</h1>
        <div id="dashboard">
            <div class="section">
                <?php echo form_open('kasubag/ModulLaporan/penerimaBeaSiswa')?>
                    <div class="row">
                        <div class="col s2">
                            <label>tahun</label>
                            
                            <select name="filTahun">
                                <option>Semua</option>
                                <?php
                                $now = date('Y');
                                for ($i = $now; $i > 1990; $i--) {
                                    echo "<option value=" . $i . ">" . $i . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col s2">
                            <label>Fakultas</label>
                            <select name="filFakultas">
                                <option>Semua</option>
                                <?php foreach ($fakultas as $rowFK): ?>
                                    <option value="<?php echo $rowFK['id'] ?>"><?php echo $rowFK['namaFk'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col s3">
                            <label>jurusan</label>
                            <select name="filJurusan">
                                <option>Semua</option>
                                <?php foreach ($jurusan as $rowsJR): ?>
                                    <option value="<?php echo $rowsJR['id'] ?>"><?php echo $rowsJR['namaJur'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col s3">
                            <label>Jenis Beasiswa</label>
                            <select name="filBeasiswa">
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
                <?php echo form_close();?>
                <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating btn-large red" href="<?php echo base_url('kasubag/ModulLaporan/semuaDataPenerima') ?>">
                        <i class="large material-icons">print</i>
                    </a>
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