<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="card">

	<div class="card-body">
		<div class="card-title mb-2">
			<div class="d-flex justify-content-start">
				<div class="image-container">
					<img src="/img/<?= $guru['pic']; ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
					<div class="middle mt-4">
						<input type="file" style="display: none;" id="profilePicture" name="file" />
					</div>
				</div>
				<div class="ml-auto">
					<input type="button" class="btn btn-primary btn-lg d-none" id="btnDiscard" value="Discard Changes" />
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="tab-content ml-4" id="myTabContent">
					<div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
						<div class="float-right">
							<button type="button" class="btn btn-warning btn-sm mr-1" data-toggle="modal" data-target="#create-data">
								<p class="d-inline">Ubah</p>
							</button>
							<a href="/guru" class="btn btn-primary btn-sm">Kembali ke daftar guru</a>
						</div>
						<h2><?= $title; ?></h2>
						<div class="row mt-3">
							<div class="col-sm-3 col-md col-5">
								<label style="font-weight:bold;">Nama Lengkap</label>
							</div>
							<div class="col-md-8 col-6">
								<?= $guru['nama']; ?>
							</div>
						</div>
						<hr />

						<div class="row">
							<div class="col-sm-3 col-md col-5">
								<label style="font-weight:bold;">Jabatan</label>
							</div>
							<div class="col-md-8 col-6">
								<?php
								if ($guru['jabatan'] == 'kepsek')
									echo "Kepala Sekolah";
								elseif ($guru['jabatan'] == 'waka_pend')
									echo "Waka Pendidikan";
								elseif ($guru['jabatan'] == 'waka_sis')
									echo "Waka Kesiswaan";
								elseif ($guru['jabatan'] == 'waka_hum')
									echo "Waka Humas";
								elseif ($guru['jabatan'] == 'guru')
									echo "Guru";
								else
									echo "TU";
								?>
							</div>
						</div>
						<hr />

						<div class="row">
							<div class="col-sm-3 col-md col-5">
								<label style="font-weight:bold;">Mata pelajaran</label>
							</div>
							<div class="col-md-8 col-6">
								<?= $guru['mapel']; ?>
							</div>
						</div>
						<hr />

						<div class="row">
							<div class="col-sm-3 col-md col-5">
								<label style="font-weight:bold;">Tempat, tanggal lahir</label>
							</div>
							<div class="col-md-8 col-6">
								<?= "{$guru['tem_lahir']}, {$guru['tan_lahir']}"; ?>
							</div>
						</div>
						<hr />

						<div class="row">
							<div class="col-sm-3 col-md col-5">
								<label style="font-weight:bold;">Jenis Kelamin</label>
							</div>
							<div class="col-md-8 col-6">
								<?= $guru['j_kelamin'] == "laki - laki" ? 'Laki - laki' : 'Perempuan' ?>
							</div>
						</div>
						<hr />

						<div class="row">
							<div class="col-sm-3 col-md col-5">
								<label style="font-weight:bold;">Alamat</label>
							</div>
							<div class="col-md-8 col-6">
								<?= $guru['alamat']; ?>
							</div>
						</div>
						<hr />

						<div class="row">
							<div class="col-sm-3 col-md col-5">
								<label style="font-weight:bold;">Pendidikan</label>
							</div>
							<div class="col-md-8 col-6">
								<?php
								if ($guru['pendidikan'] == 'perguruan_tinggi')
									echo 'Perguruan Tinggi';
								elseif ($guru['pendidikan'] == 'sma_sederajat')
									echo 'SMA Sederajat';
								else
									echo 'Pondok Pesantren';

								?>
							</div>
						</div>
						<hr />

						<div class="row">
							<div class="col-sm-3 col-md col-5">
								<label style="font-weight:bold;">Lembaga</label>
							</div>
							<div class="col-md-8 col-6">
								<?= $guru['lembaga']; ?>
							</div>
						</div>
						<hr />

					</div>
				</div>
			</div>
		</div>


	</div>

	<!-- Modal -->
	<div class="modal fade" id="create-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ubah data siswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/guru/update/<?= $guru['id']; ?>" method="POST" class="md-10" enctype="multipart/form-data">
						<?= csrf_field(); ?>
						<input type="hidden" name="fotoLama" value="<?= $guru['pic']; ?>">
						<input type="hidden" name="id" value="<?= $guru['id']; ?>">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control <?= ($valid->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" placeholder="Nama" name="nama" autofocus autocomplete="off" value="<?= (old('nama')) ? old('nama') : $guru['nama'] ?>">
							<div id="validationServer03Feedback" class="invalid-feedback">
								<?= $valid->getError('nama'); ?>
							</div>
						</div>
						<div class="form-row form-group">
							<div class="col">
								<label for="tempatlahir">Tempat lahir</label>
								<input type="text" class="form-control" placeholder="Tempat lahir" id="tempatlahir" name="tem_lahir" autocomplete="off" value="<?= (old('tem_lahir')) ? old('tem_lahir') : $guru['tem_lahir'] ?>">
							</div>
							<div class="col">
								<label for="tanggallahir">Tanggal lahir</label>
								<div class="input-group flex-nowrap">
									<div class="input-group-prepend">
										<span class="input-group-text" id="addon-wrapping">
											<i class="fas fa-calendar"></i>
										</span>
									</div>
									<input type="text" class="form-control datepicker" placeholder="Tanggal lahir" id="tanggallahir" name="tan_lahir" autocomplete="off" value="<?= (old('tan_lahir')) ? old('tan_lahir') : $guru['tan_lahir'] ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="tmt">Tanggal mulai tugas</label>
							<div class="input-group flex-nowrap">
								<div class="input-group-prepend">
									<span class="input-group-text" id="addon-wrapping">
										<i class="fas fa-calendar"></i>
									</span>
								</div>
								<input type="text" class="form-control datepicker" placeholder="Tanggal mulai tugas" id="tmt" name="tmt" autocomplete="off" value="<?= (old('tmt')) ? old('tmt') : $guru['tmt'] ?>">
							</div>
						</div>
						<div class="form-row form-group">
							<div class="col">
								<label for="jabatan">Jabatan</label>
								<select id="jabatan" class="form-control" name="jabatan">
									<option value="kepsek" <?= ($guru['jabatan'] == 'kepsek') ? 'selected' : ''; ?>>Kepala Sekolah</option>
									<optgroup label="Wakil Kepala">
										<option value="waka_pend" <?= ($guru['jabatan'] == 'waka_pend') ? 'selected' : ''; ?>>Waka Pendidikan</option>
										<option value="waka_sis" <?= ($guru['jabatan'] == 'waka_sis') ? 'selected' : ''; ?>>Waka Kesiswaan</option>
										<option value="waka_hum" <?= ($guru['jabatan'] == 'waka_hum') ? 'selected' : ''; ?>>Waka Humas</option>
									</optgroup>
									<option value="guru" <?= ($guru['jabatan'] == 'guru') ? 'selected' : ''; ?>>Guru</option>
									<option value="tu" <?= ($guru['jabatan'] == 'tu') ? 'selected' : ''; ?>>Tata Usaha</option>
								</select>
							</div>
							<div class="col">
								<label for="mapel">Mapel</label>
								<select id="mapel" class="form-control" name="mapel">
									<optgroup label="Mapel Umum">
										<option value="Bahasa Indonesia" <?= ($guru['mapel'] == 'Bahasa Indonesia') ? 'selected' : ''; ?>>Bahasa Indonesia</option>
										<option value="Bahasa Inggris" <?= ($guru['mapel'] == 'Bahasa Inggris') ? 'selected' : ''; ?>>Bahasa Inggris</option>
										<option value="Matematika Wajib" <?= ($guru['mapel'] == 'Matematika Wajib') ? 'selected' : ''; ?>>Matematika Wajib</option>
										<option value="Ekonomi" <?= ($guru['mapel'] == 'Ekonomi') ? 'selected' : ''; ?>>Ekonomi</option>
										<option value="Sejarah" <?= ($guru['mapel'] == 'Sejarah') ? 'selected' : ''; ?>>Sejarah</option>
										<option value="Geografi" <?= ($guru['mapel'] == 'Geografi') ? 'selected' : ''; ?>>Geografi</option>
										<option value="Sosiologi" <?= ($guru['mapel'] == 'Sosiologi') ? 'selected' : ''; ?>>Sosiologi</option>
										<option value="PKn" <?= ($guru['mapel'] == 'PKn') ? 'selected' : ''; ?>>PKn</option>
										<option value="Sastra Inggris" <?= ($guru['mapel'] == 'Sastra Inggris') ? 'selected' : ''; ?>>Sastra Inggris</option>
										<option value="Fisika" <?= ($guru['mapel'] == 'Fisika') ? 'selected' : ''; ?>>Fisika</option>
										<option value="Kimia" <?= ($guru['mapel'] == 'Kimia') ? 'selected' : ''; ?>>Kimia</option>
										<option value="Biologi" <?= ($guru['mapel'] == 'Biologi') ? 'selected' : ''; ?>>Biologi</option>
										<option value="Matematika Peminatan" <?= ($guru['mapel'] == 'Matematika Peminatan') ? 'selected' : ''; ?>>Matematika Peminatan</option>
										<option value="Seni Budaya" <?= ($guru['mapel'] == 'Seni Budaya') ? 'selected' : ''; ?>>Seni Budaya</option>
										<option value="PDK" <?= ($guru['mapel'] == 'PDK') ? 'selected' : ''; ?>>PDK</option>
										<option value="Antropologi" <?= ($guru['mapel'] == 'Antropologi') ? 'selected' : ''; ?>>Antropologi</option>
										<option value="Pendidikan Jasmani" <?= ($guru['mapel'] == 'Pendidikan Jasmani') ? 'selected' : ''; ?>>Pendidikan Jasmani</option>
									</optgroup>
									<optgroup label="Mapel Lokal">
										<option value="Faroid" <?= ($guru['mapel'] == 'Faroid') ? 'selected' : ''; ?>>Faroid</option>
										<option value="Tafsir" <?= ($guru['mapel'] == 'Tafsir') ? 'selected' : ''; ?>>Tafsir</option>
										<option value="Risalatul Mahidl" <?= ($guru['mapel'] == 'Risalatul Mahidl') ? 'selected' : ''; ?>>Risalatul Mahidl</option>
										<option value="Fathul Qorib" <?= ($guru['mapel'] == 'Fathul Qorib') ? 'selected' : ''; ?>>Fathul Qorib</option>
										<option value="Tarbiyah" <?= ($guru['mapel'] == 'Tarbiyah') ? 'selected' : ''; ?>>Tarbiyah</option>
										<option value="Nahwu" <?= ($guru['mapel'] == 'Nahwu') ? 'selected' : ''; ?>>Nahwu</option>
										<option value="I'rob" <?= ($guru['mapel'] == "I'rob") ? 'selected' : ''; ?>>I'rob</option>
										<option value="SKUA" <?= ($guru['mapel'] == 'SKUA') ? 'selected' : ''; ?>>SKUA</option>
										<option value="Ushul Fiqih" <?= ($guru['mapel'] == 'Ushul Fiqih') ? 'selected' : ''; ?>>Ushul Fiqih</option>
										<option value="Adab Islamiyah" <?= ($guru['mapel'] == 'Adab Islamiyah') ? 'selected' : ''; ?>>Adab Islamiyah</option>
										<option value="Mustholahul Hadis" <?= ($guru['mapel'] == 'Mustholahul Hadis') ? 'selected' : ''; ?>>Mustholahul Hadis</option>
									</optgroup>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="jeniskelamin">Jenis Kelamin</label>
							<select id="jeniskelamin" class="form-control" name="j_kelamin">
								<option value="laki - laki" <?= ($guru['j_kelamin'] == 'laki - laki') ? 'selected' : ''; ?>>Laki - laki</option>
								<option value="perempuan" <?= ($guru['j_kelamin'] == 'perempuan') ? 'selected' : ''; ?>>Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="pendidikan">Pendidikan</label>
							<select id="pendidikan" class="form-control" name="pendidikan">
								<option value="perguruan_tinggi" <?= ($guru['pendidikan'] == 'perguruan_tinggi') ? 'selected' : ''; ?>>Perguruan Tinggi</option>
								<option value="ponpes" <?= ($guru['pendidikan'] == 'perempuan') ? 'ponpes' : ''; ?>>Pondok Pesantren</option>
								<option value="sma_sederajat" <?= ($guru['pendidikan'] == 'perempuan') ? 'sma_sederajat' : ''; ?>>SMA Sederajat</option>
							</select>
						</div>
						<div class="form-group">
							<label for="lembaga">Lembaga</label>
							<textarea class="form-control" id="lembaga" rows="2" name="lembaga"><?= (old('lembaga')) ? old('lembaga') : $guru['lembaga'] ?></textarea>
						</div>
						<div class="form-group">
							<label for="domisili">Domisili</label>
							<textarea class="form-control" id="domisili" rows="2" name="domisili"><?= (old('domisili')) ? old('domisili') : $guru['domisili'] ?></textarea>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<textarea class="form-control" id="alamat" rows="3" name="alamat"><?= (old('alamat')) ? old('alamat') : $guru['alamat'] ?></textarea>
						</div>
						<div class="form-group">
							<label for="pic">Tambah foto guru</label>
							<input type="file" class="form-control-file <?= ($valid->hasError('pic')) ? 'is-invalid' : ''; ?>" id="pic" name="pic" onchange="previewFoto()">
							<div id="validationServer03Feedback" class="invalid-feedback">
								<?= $valid->getError('pic'); ?>
							</div>
						</div>
						<div class="form-group col d-inline-block ">
							<img src="/img/default.png" class="img-thumbnail img-preview">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success" name="submit">Ubah</button>
				</div>
				</form>
			</div>
		</div>
	</div>

</div>

<?= $this->endSection(); ?>