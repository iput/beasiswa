<main>
	<div class="container">
<<<<<<< HEAD
		<h1 class="thin">My Account</h1>
		<!--  Tables Section-->
=======
		<h3>Profile Mahasiswa</h3>
>>>>>>> d50ebeafa6ff82066b715ff9c8949394abda9428
		<div id="messages" class="mailbox section">
			<div class="row">
				<div class="col s12">
					<div class="z-depth-1">
						<ul class="tabs account">
							<li class="col s4 tab"><a class="active" href="#personal">Profile</a></li>
							<li class="col s4 tab"><a href="#password">Password</a></li>
							<li class="col s4 tab"><a href="#privacy">Privacy</a></li>
						</ul>
					</div>
				</div>
				<div class="col s12">
					<div class="card-panel no-padding">
						<!-- Personal tab START -->
						<div id="personal">
<<<<<<< HEAD
							<form>
								<div class="form-pad">
									<div class="row">
										<div class="col s12 m8 push-m4">
											<!-- Personal info FIELDS -->
											<div class="input-field">
												<input id="first_name" type="text" class="validate" value="Caroline">
												<label for="first_name">First Name</label>
											</div>
											<div class="input-field">
												<input id="last_name" type="text" class="validate" value="Doe">
												<label for="last_name">Last Name</label>
											</div>
											<div class="input-field">
												<input id="phone" type="tel" class="validate" value="+1 22 333 444 555">
												<label for="phone">Phone</label>
											</div>
											<div class="input-field">
												<input id="email" type="email" class="validate" value="info(at)cretingo.com">
												<label for="email" data-error="wrong" data-success="right">Email</label>
											</div>
											<div class="input-field with-note">
												<input id="skills" type="text" class="validate" value="html, css, sass, js, php">
												<label for="skills">Skills</label>
												<span class="note">Please, provide comma separated list.</span>
											</div>
											<div class="input-field">
												<textarea id="about" class="materialize-textarea">Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. </textarea>
												<label for="about">About</label>
											</div>
											<div class="input-field">
												<input placeholder="http://www.creatingo.com" id="weburl" type="text" class="validate">
												<label for="weburl">Website Url</label>
											</div>
										</div>
										<div class="col s12 m4 pull-m8">
											<!-- Personal info PROFILE PHOTO -->
											<div class="form-pad center-align">
												<img class="responsive-img circle" src="<?php echo base_url();?>imgs/operator-female-smile_sml01.jpg">
												<div class="file-field input-field">
													<div class="btn no-float primary-color">
														<i class="material-icons large">file_upload</i>
=======
							<form method="post" action="<?php echo base_url(); ?>mahasiswa/C_profileMhs/simpan">
								<div class="form-pad">
									<div class="row">
										<div class="col s12 m6 push-m6">
											<!-- Personal info FIELDS -->
											<div class="input-field">
												<input id="asalKota" name="asalKota" type="text" class="validate" placeholder="Asal Kota" value="<?php echo $this->session->userdata('asalKota');?>" >
												<label for="last_name">Asal Kota</label>
											</div>
											<div class="input-field">
												<input id="namaOrtu" name="namaOrtu" type="text" class="validate" placeholder="Angkatan" value="<?php echo $this->session->userdata('namaOrtu');?>">
												<label for="first_name">Nama Orang Tua</label>
											</div>
											<div class="input-field">
												<input id="alamatOrtu" name="alamatOrtu" type="text" class="validate" placeholder="NIM" value="<?php echo $this->session->userdata('alamatOrtu');?>" >
												<label for="last_name">Alamat Orang Tua</label>
											</div>
											<div class="input-field">
												<input id="kotaOrtu" name="kotaOrtu" type="tel" class="validate" placeholder="Nama Mahasiswa" value="<?php echo $this->session->userdata('kotaOrtu');?>" >
												<label for="phone">Kota Orang Tua</label>
											</div>
											<div class="input-field">
												<input id="provinsiOrtu" name="provinsiOrtu" type="text" class="validate" placeholder="Tempat Lahir" value="<?php echo $this->session->userdata('provinsiOrtu');?>" >
												<label for="last_name">Provinsi Orang Tua</label>
											</div>
												<div class="input-field">
												<input id="alamat" name="alamat" type="text" class="validate" placeholder="NIM" value="<?php echo $this->session->userdata('alamat');?>" >
												<label for="last_name">Alamat Lengkap</label>
											</div>
											<div class="input-field with-note">
												<input id="email" name="email" type="text" class="validate" value="<?php echo $this->session->userdata('email');?>">
												<label for="skills">Email</label>
												<span class="note">Example : name@gmail.com</span>
											</div>
											<div class="input-field">
												<input id="noTelp" name="noTelp" type="tel" class="validate" placeholder="Tempat Lahir" value="<?php echo $this->session->userdata('noTelp');?>" >
												<label for="last_name">Nomor Telephon</label>
											</div>
										</div>
										<div class="col s12 m6 pull-m6" >
											<!-- Personal info PROFILE PHOTO -->
											<div class="form-pad center-align col s12 m6 offset-m3">
												<img class="responsive-img square" src="<?php echo base_url();?>imgs/operator-female-smile_sml01.jpg">
												<div class="file-field input-field">
													<div class="btn no-float primary-color">
														<i class="material-icons large" title="Upload Foto">file_upload</i>
>>>>>>> d50ebeafa6ff82066b715ff9c8949394abda9428
														<input type="file">
													</div>
													<div class="file-path-wrapper hide">
														<input class="file-path validate center-align" type="text">
													</div>
												</div>
<<<<<<< HEAD
=======
											</div>						
										</div>
										<div class="col s12 m6 pull-m6">
											<div class="input-field">
												<input id="angkatan" name="angkatan" type="text" class="validate" placeholder="Angkatan" value="<?php echo $this->session->userdata('angkatan');?>" readonly>
												<label for="first_name">Angkatan</label>
											</div>
											<div class="input-field">
												<input name="nim" id="nim" type="text" class="validate" placeholder="NIM" value="<?php echo $this->session->userdata('username');?>" readonly>
												<label for="last_name">NIM</label>
											</div>
											<div class="input-field">
												<input name="namaMhs" id="namaMhs" type="tel" class="validate" placeholder="Nama Mahasiswa" value="<?php echo $this->session->userdata('nama');?>" >
												<label for="phone">Nama Mahasiswa</label>
											</div>

											<div class="input-field">
												<input name="tempatLahir" id="tempatLahir" type="text" class="validate" placeholder="Tempat Lahir" value="<?php echo $this->session->userdata('tempatLahir');?>" >
												<label for="last_name">Tempat Lahir</label>
											</div>
											<div class="input-field">
												<input name="tglLahir" id="tglLahir" type="date" class="validate datepicker" placeholder="Tanggal Lahir" value="<?php echo $this->session->userdata('tglLahir');?>" >
												<label for="last_name">Tanggal Lahir  <span>*Thn-Bln-Tgl</span></label>
>>>>>>> d50ebeafa6ff82066b715ff9c8949394abda9428
											</div>
										</div>
									</div>
									<!-- Save Cancel -->
									<div class="row">
										<div class="col s12 m8 push-m4 buttons">
											<button class="waves-effect waves-light btn" type="submit" name="action1"><i class="material-icons right">done</i>Save changes</button>
											<button class="waves-effect waves-light btn blue-grey lighten-2" type="submit" name="action2"><i class="material-icons right">clear</i>Cancel</button>
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
<<<<<<< HEAD
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
=======
												<input id="current" type="text" class="validate" value="<?php echo $this->session->userdata('username');?>" required>
												<label for="current">UserId</label>
											</div>
											<div class="input-field">
												<input id="new" type="password" class="validate" value="<?php echo $this->session->userdata('username');?>" required>
												<label for="new">Password</label>
>>>>>>> d50ebeafa6ff82066b715ff9c8949394abda9428
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
						<!-- Privacy tab START -->
						<div id="privacy">
							<form>
								<div class="form-pad">
									<div class="row">
										<div class="col s12">
											<div class="row" style="margin-top: 20px;">
												<!-- Switch Title -->
												<div class="col s12 m8">
													<span>Pariatur prehenderit enim eiusmod</span>
												</div>
												<!-- Switch -->
												<div class="col s12 m4">
													<div class="switch right">
														<label>
															Off
															<input type="checkbox" checked="checked">
															<span class="lever"></span>
															On
														</label>
													</div>
												</div>
											</div>
											<div class="divider"></div>
											<div class="row" style="margin-top: 20px;">
												<!-- Switch Title -->
												<div class="col s12 m8">
													<span>Suspendisse nisi sem</span>
												</div>
												<!-- Switch -->
												<div class="col s12 m4">
													<div class="switch right">
														<label>
															Off
															<input type="checkbox">
															<span class="lever"></span>
															On
														</label>
													</div>
												</div>
											</div>
											<div class="divider"></div>
											<div class="row" style="margin-top: 20px;">
												<!-- Switch Title -->
												<div class="col s12 m8">
													<span>Ut vestibulum nunc convallis</span>
												</div>
												<!-- Switch -->
												<div class="col s12 m4">
													<div class="switch right">
														<label>
															Off
															<input type="checkbox" checked="checked">
															<span class="lever"></span>
															On
														</label>
													</div>
												</div>
											</div>
											<div class="divider"></div>
											<div class="row" style="margin-top: 20px;">
												<!-- Switch Title -->
												<div class="col s12 m8">
													<span>Cras vitae lobortis lectus</span>
												</div>
												<!-- Switch -->
												<div class="col s12 m4">
													<div class="switch right">
														<label>
															Off
															<input type="checkbox" checked="checked">
															<span class="lever"></span>
															On
														</label>
													</div>
												</div>
											</div>
											<div class="divider"></div>
											<div class="row" style="margin-top: 20px;">
												<!-- Switch Title -->
												<div class="col s12 m8">
													<span>Cras laoreet dui</span>
												</div>
												<!-- Switch -->
												<div class="col s12 m4">
													<div class="switch right">
														<label>
															Off
															<input type="checkbox">
															<span class="lever"></span>
															On
														</label>
													</div>
												</div>
											</div>
											<div class="divider"></div>
											<div class="buttons" style="margin-top: 20px;">
												<button class="waves-effect waves-light btn" type="submit" name="action1"><i class="material-icons right">done</i>Save changes</button>
												<button class="waves-effect waves-light btn blue-grey lighten-2" type="submit" name="action2"><i class="material-icons right">clear</i>Cancel</button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>