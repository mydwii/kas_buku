<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>dashboard</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<?php require_once('layoutt/_css.php') ?>
</head>

<body>

	<?php require_once('layoutt/_sidebar.php') ?>
	<?php require_once('layoutt/_navbar.php') ?>


	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Selamat Datang</h1>
			<div class="d-flex justify-content-between">
				<button data-bs-toggle="modal" data-bs-target="#ModalPrint" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Detail Laporan</button>
			</div>
		</div>

		<!-- Content Row -->

		<div class="row">
			<!-- Earnings (Monthly) Card Example -->
			<div class=" col-xl-6 col-md-12 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-danger">Pemasukan</h6>
						<?php
						$date = date('d');
						$month = date('m');
						$u2 =  "SELECT sum(nominal) as nominal FROM transaksi WHERE MONTH(tanggal) = $month AND jenis_transaksi = 'Pemasukan'";
						$u =  "SELECT sum(nominal) as nominal FROM transaksi WHERE DAY(tanggal) = $date  AND jenis_transaksi = 'Pemasukan'";
						$hari = $this->db->query($u)->row_array();
						if ($hari['nominal'] == null) {
							$pemasukkan = 0;
						} else {
							$pemasukkan = $hari['nominal'];
						}
						$bulan = $this->db->query($u2)->row_array();
						foreach ($tMasuk as $totalMasuk) {
						?>

					</div>
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
									Hari ini</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
									<?= number_format($pemasukkan); ?></div>
							</div>
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
									bulan ini</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
									<?= number_format($bulan['nominal']); ?></div>
							</div>
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
									Total</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
									<?= number_format($totalMasuk); ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-dollar-sign  fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-6 col-md-12 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-danger">Pengeluaran</h6>
					<?php
					$date = date('d');
					$month = date('m');
					$u2 =  "SELECT sum(nominal) as nominal FROM transaksi WHERE MONTH(tanggal) = $month AND jenis_transaksi = 'Pengeluaran'";
					$u =  "SELECT sum(nominal) as nominal FROM transaksi WHERE DAY(tanggal) = $date  AND jenis_transaksi = 'Pengeluaran'";
					$harini = $this->db->query($u)->row_array();
					if ($harini['nominal'] == null) {

						$pengeluaranhariini = 0;
					} else {
						$pengeluaranhariini = $harini['nominal'];
					}
					$bulanni = $this->db->query($u2)->row_array();
					if ($bulanni['nominal'] == null) {

						$pengeluaranbulanini = 0;
					} else {
						$pengeluaranbulanini = $bulanni['nominal'];
					}
					foreach ($tKeluar as $totalKeluar) {
					?>
				</div>
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								hari ini</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
								<?= number_format($pengeluaranhariini); ?></div>
						</div>
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								bulan ini</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
								<?= number_format($pengeluaranbulanini); ?></div>
						</div>
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-Warning text-uppercase mb-1">
								total</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
								<?= number_format($totalKeluar); ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="row  justify-content-center">
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-4 col-md-12 mb-4">
			<div class="card border-left-warning shadow h-100 py-2  justify-content-center">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-danger">Saldo Akhir</h6>
				</div>
				<div class="card-body">


					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Total</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
								<?= number_format($totalMasuk - $totalKeluar); ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="ModalPrint" tabindex="-1" aria-labelledby="exampleModalLabe1l" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel1">Laporan</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="<?= base_url('transaksi/laporan'); ?>" method="post" target="_blank">
						<div class="modal-body">
							<div class="form-group mb-3">
								<label class="form-label">Tanggal Awal</label>
								<input type="date" class="form-control" name="tanggal1" required>
							</div>
							<div class="form-group mb-3">
								<label class="form-label">Tanggal Berakhir</label>
								<input type="date" class="form-control" name="tanggal2" required>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Print</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php require_once('layoutt/_footer.php') ?>
	<?php require_once('layoutt/_js.php') ?>