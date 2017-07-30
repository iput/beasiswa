<main>
	<div class="container">
		<h3>Profile Mahasiswa</h3>
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
							<form>
								<div class="form-pad">
									<div class="row">
										<div class="col s12 m8 push-m4">
											<!-- Personal info FIELDS -->
											<div class="input-field">
												<input id="first_name" type="text" class="validate" placeholder="Angkatan">
												<label for="first_name">Angkatan</label>
											</div>
											<div class="input-field">
												<input id="last_name" type="text" class="validate" placeholder="NIM">
												<label for="last_name">NIM</label>
											</div>
											<div class="input-field">
												<input id="phone" type="tel" class="validate" placeholder="Nama Mahasiswa" readonly>
												<label for="phone">Nama Mahasiswa</label>
											</div>
											<div class="input-field">
												<input id="last_name" type="text" class="validate" placeholder="Tempat Lahir">
												<label for="last_name">Tempat Lahir</label>
											</div>
											<div class="input-field">
												<input id="last_name" type="text" class="validate" placeholder="Tanggal Lahir">
												<label for="last_name">Tanggal Lahir</label>
											</div>
											<div class="input-field">
												<input id="last_name" type="text" class="validate" placeholder="Asal Kota">
												<label for="last_name">Asal Kota</label>
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
														<input type="file">
													</div>
													<div class="file-path-wrapper hide">
														<input class="file-path validate center-align" type="text">
													</div>
												</div>
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