<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="card">

	<div class="card-body">
		<div class="card-title mb-4">
			<div class="d-flex justify-content-start">
				<div class="image-container">
					<img src="/img/default.png" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
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
							<a href="/guru/ubah/<?php //echo $guru['nisn'];
														?>" class="btn btn-warning btn-sm mr-1">Ubah</a>
							<a href="/guru" class="btn btn-primary btn-sm">Kembali ke daftar guru</a>
						</div>
						<h2><?= $title; ?></h2>
						<div class="row mt-3">
							<div class="col-sm-3 col-md col-5">
								<label style="font-weight:bold;">Nama Lengkap</label>
							</div>
							<div class="col-md-8 col-6">
								<?= $teacher['nama']; ?>
							</div>
						</div>
						<hr />

						<div class="row">
							<div class="col-sm-3 col-md col-5">
								<label style="font-weight:bold;">Jabatan</label>
							</div>
							<div class="col-md-8 col-6">
								<?php
								if ($teacher['jabatan'] == 'kepsek')
									echo "Kepala Sekolah";
								elseif ($teacher['jabatan'] == 'waka_pend')
									echo "Waka Pendidikan";
								elseif ($teacher['jabatan'] == 'waka_sis')
									echo "Waka Kesiswaan";
								elseif ($teacher['jabatan'] == 'waka_hum')
									echo "Waka Humas";
								elseif ($teacher['jabatan'] == 'guru')
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
								<?= $teacher['mapel']; ?>
							</div>
						</div>
						<hr />

						<div class="row">
							<div class="col-sm-3 col-md col-5">
								<label style="font-weight:bold;">Tempat, tanggal lahir</label>
							</div>
							<div class="col-md-8 col-6">
								<?= "{$teacher['tem_lahir']}, {$teacher['tan_lahir']}"; ?>
							</div>
						</div>
						<hr />

						<div class="row">
							<div class="col-sm-3 col-md col-5">
								<label style="font-weight:bold;">Jenis Kelamin</label>
							</div>
							<div class="col-md-8 col-6">
								<?= $teacher['j_kelamin'] == "laki - laki" ? 'Laki - laki' : 'Perempuan' ?>
							</div>
						</div>
						<hr />

						<div class="row">
							<div class="col-sm-3 col-md col-5">
								<label style="font-weight:bold;">Alamat</label>
							</div>
							<div class="col-md-8 col-6">
								<?= $teacher['alamat']; ?>
							</div>
						</div>
						<hr />

						<div class="row">
							<div class="col-sm-3 col-md col-5">
								<label style="font-weight:bold;">Pendidikan</label>
							</div>
							<div class="col-md-8 col-6">
								<?php
								if ($teacher['pendidikan'] == 'perguruan_tinggi')
									echo 'Perguruan Tinggi';
								elseif ($teacher['pendidikan'] == 'sma_sederajat')
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
								<?= $teacher['lembaga']; ?>
							</div>
						</div>
						<hr />

					</div>
				</div>
			</div>
		</div>


	</div>

</div>

<?= $this->endSection(); ?>