<?php
$data_user_login = $user->row();
?>
<main>
	<div class="container">
		<h3><span class="blue-text">Profile Admin</span></h3>
		<!--  Tables Section-->
		<div class="col s12 m4 l6">
		<?php echo $this->session->flashdata('pesan');?></div>
		<div id="messages" class="mailbox section">
			<div class="row">
				<div class="col s12">
					<div class="z-depth-1">
						<ul class="tabs account">
							<li class="col s4 tab"><a class="active" href="#personal">Profile</a></li>
							<li class="col s4 tab"><a href="#password">Password</a></li>
						</ul>
					</div>
				</div>
				<div class="col s12">
					<div class="card-panel no-padding">
						<!-- Personal tab START -->
						<div id="personal">
							<form method="post" action="<?php echo base_url(); ?>C_admin/updateProfile" enctype="multipart/form-data">
								<div class="form-pad">
									<div class="row">
										<div class="col s12 m6 l6">
											<div class="col s12" >
												<!-- Personal info PROFILE PHOTO -->
												<div class="form-pad center-align col s12 m6 offset-m3">
													<img class="responsive-img square" src="<?=base_url()?>/assets/img/profile/<?=$data_user_login->foto;?>">
													<div class="file-field input-field">
														<div class="btn no-float primary-color">
															<i class="material-icons large" >file_upload</i>
															<input type="file" title="Upload Foto" name="filefoto">
															<input type="hidden" name="id" class="form-control" value="<?php echo $data_user_login->id;?>">
															<input type="hidden" name="filelama" value="<?php echo $data_user_login->foto;?>">
														</div>
														<div class="file-path-wrapper hide">
															<input class="file-path validate center-align" type="text">
														</div>
														<div>
															<small class="blue-text">** Max.size 100Kb, [jpeg |jpg |png]</small>
														</div>
													</div>
												</div>						
											</div>
											<div class="col s12">
												<div class="input-field">
													<i class="mdi-image-filter-1 prefix"></i>
													<input id="first_name" type="text" class="validate" value="<?php echo $data_user_login->idAkses;?>" readonly>
													<label for="first_name">ID Akses</label>
												</div>
											<div class="input-field">
												<i class="mdi-action-account-box prefix"></i>
												<input name="nama" id="nama" type="tel" class="validate" placeholder="Nama" value="<?php echo $data_user_login->nama;?>" >
												<label for="phone">Nama</label>
											</div>
											</div>
										</div>
										<div class="col s12 m6 l6">
											<div class="input-field">
												<i class="mdi-action-home prefix"></i>
												<input id="alamat" name="alamat" type="text" class="validate" placeholder="Alamat Lengkap" value="<?php echo $data_user_login->alamat;?>" >
												<label for="last_name">Alamat Lengkap</label>
											</div>

											<div class="input-field with-note">
												<i class="mdi-communication-call prefix"></i>
												<input id="noTelp" name="noTelp" type="tel" class="validate" placeholder="Nomor Telephon" value="<?php echo $data_user_login->noTelp;?>" onkeyup="validAngka(this)" maxlength="12">
												<label for="skills">Nomor Telephon</label>
												<small class="blue-text">** Isi hanya dengan Angka</small>
											</div>
											<div class="input-field with-note">
												<i class="mdi-communication-email prefix"></i>
												<input id="email" name="email" type="text" class="validate" value="<?php echo $data_user_login->email;?>">
												<label for="skills">Email</label>
												<small class="blue-text">** Example : name@gmail.com</small>
											</div>
										</div>

									</div>
									<!-- Save Cancel -->
									<div class="row">
										<div class="col s12 m8 push-m4 buttons">
											<button class="waves-effect waves-light btn" type="submit" name="action1"><i class="material-icons right">done</i>Save</button>
											<button class="waves-effect waves-light btn blue-grey lighten-2" type="submit" name="action2" disabled=""><i class="material-icons right">clear</i>Cancel</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						<!-- Personal tab END -->
						<!-- Password tab START -->
						<div id="password">
							<form>
								<div class="form-pad">
									<div class="row">
										<div class="col s12">
											<div class="input-field">
												<input id="current" type="password" class="validate">
												<label for="current">Current Password</label>
											</div>
											<div class="input-field">
												<input id="new" type="password" class="validate">
												<label for="new">New Password</label>
											</div>
											<div class="input-field">
												<input id="re-type-new" type="password" class="validate">
												<label for="re-type-new">Re-type New Password</label>
											</div>
											<div class="buttons">
												<button class="waves-effect waves-light btn" type="submit" name="action1"><i class="material-icons right">done</i>Save changes</button>
												<button class="waves-effect waves-light btn blue-grey lighten-2" type="submit" name="action2"><i class="material-icons right">clear</i>Cancel</button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<!-- Password tab END -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- container END --> 
</main>