<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>transaksi</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<?php require_once('layoutt/_css.php')?>
</head>

<body>

	<?php require_once('layoutt/_sidebar.php')?>
	<?php require_once('layoutt/_navbar.php')?>

	<div class="container-fluid">
		<!-- Button trigger modal -->
		<div class="d-sm-flex align-items-center justify-content-between mb-2">
			<!-- Button trigger modal -->
			<a href="<?= base_url('transaksi/tambah/')?>" type="button"
				class="btn d-none d-sm-inline-block btn btn-sm btn-primary shadow-smrut absen" data-toggle="modal"
				data-target="#exampleModalCenter">
				Tambah Transaksi
			</a>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
				aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Tambahkan Transaksi</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?= base_url('transaksi/tambah');?>" method="post">
								<!-- <input type="hidden" name="username" value="<?php $this->fungsi->user_login()->username ?>"> -->
								<div class="form-floating mb-3">
									<input type="hidden" class="form-control" name="username" id="floatingInput1"
										value="<?=$this->fungsi->user_login()->username ?>" readonly>
								</div>
								<div class="form-floating mb-3">
									<select name="jenis_transaksi" class="form-select">
										<option value="">- Pilih -</option>
										<option value="Pemasukan">Pemasukan</option>
										<option value="Pengeluaran">Pengeluaran</option>
									</select>
									<label>Jenis Transaksi</label>
								</div>
								<div class="form-floating mb-3">
									<input type="text" class="form-control" name="keterangan" id="floatingInput2"
										placeholder="">
									<label for="floatingInput2">Keterangan</label>
								</div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" name="nominal" id="floatingInput4"
										placeholder="">
									<label for="floatingInput4">nominal</label>
								</div>
								<div class="form-floating mb-3">
									<input type="date" class="form-control" name="tanggal" id="floatingInput5"
										placeholder="">
									<label for="floatingInput5">Tanggal</label>
								</div>
								<div class="button" style="float:right;">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Save</button>
								</div>
							</form>
						</div>
						<div class="modal-footer">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="ngilang">
			<?php echo $this->session->flashdata('alert', true)?>
		</div>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Daftar Pemasukan</h6>
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-bordered dataTable" id="table1" width="100%" cellspacing="0"
									role="grid" aria-describedby="dataTable_info" style="width: 100%;">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Tanggal</th>
											<?php if($this->fungsi->user_login()->level == 'Admin'){?>
											<th scope="col">Penginput</th>
											<?php }?>
											<th scope="col">Keterangan</th>
											<th scope="col">Nominal</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; foreach ($transaksi as $b) {?>
										<?php if($b['jenis_transaksi']=='Pemasukan'){?>
										<tr>
											<th scope="row"><?= $no++;?></th>
											<td><?= $b['tanggal']?></td>
											<?php if($this->fungsi->user_login()->level == 'Admin'){?>
											<td><?= $b['username']?></td>
											<?php }?>
											<td><?= $b['keterangan']?></td>
											<td align="right">Rp. <?= number_format($b['nominal'], 2)?></td>
											<td align="center"> <a
													href="<?=base_url('transaksi/hapus/'.$b['id_transaksi'])?>"
													onClick="return confirm('apakah anda yakin akan menghapus?')"
													style="color:red;"><i class="fa fa-trash"></i></a></td>
										</tr>
										<?php }} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Daftar Pengeluaran</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-bordered dataTable" id="dataTable" width="100%"
									cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Tanggal</th>
											<?php if($this->fungsi->user_login()->level == 'Admin'){?>
											<th scope="col">Penginput</th>
											<?php }?>
											<th scope="col">Keterangan</th>
											<th scope="col">Nominal</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $n = 1; foreach ($transaksi as $bb) {?>
										<?php if($bb['jenis_transaksi']=='Pengeluaran'){?>
										<tr>
											<th scope="row"><?= $n++;?></th>
											<td><?= $bb['tanggal']?></td>
											<?php if($this->fungsi->user_login()->level == 'Admin'){?>
											<td><?= $bb['username']?></td>
											<?php }?>
											<td><?= $bb['keterangan']?></td>
											<td align="right">Rp. <?= number_format($bb['nominal'], 2)?>
											</td>
											<td align="center"> <a
													href="<?=base_url('transaksi/hapus/'.$bb['id_transaksi'])?>"
													onClick="return confirm('apakah anda yakin akan menghapus?')"
													style="color:red;"><i class="fa fa-trash"></i></a></td>
										</tr>
										<?php };} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Laporan Semua-->
	<div class="modal fade" id="ModalPrint1" tabindex="-1" aria-labelledby="exampleModalLabe1l" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel1">Laporan</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="<?= base_url('transaksi/laporan_masuk'); ?>" method="post" target="_blank">
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
	<!-- Modal -->
	<div class="modal fade" id="ModalPrint" tabindex="-1" aria-labelledby="exampleModalLabe1l" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel1">Laporan</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="<?= base_url('transaksi/laporan_masuk'); ?>" method="post" target="_blank">
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


	<?php require_once('layoutt/_footer.php')?>
	<?php require_once('layoutt/_js.php')?>
