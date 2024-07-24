<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>dashboard</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<?php require_once('layoutt/_css.php')?>
</head>

<body>
	<!-- <div class="container-xxl position-relative bg-white d-flex p-0"> -->

	<?php require_once('layoutt/_sidebar.php')?>
	<?php require_once('layoutt/_navbar.php')?>
	<div class="container-fluid">
		<a href="<?= base_url('User/tambah/')?>" type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
			data-bs-target="#exampleModal">
			Tambah User
		</a>
		<div id="ngilang">
			<?php echo $this->session->flashdata('alert', true)?>
		</div>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-bordered dataTable" id="table1" width="100%"
									cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Username</th>
											<th scope="col">Name</th>
											<th scope="col">kelas</th>
											<th scope="col">Alamat</th>
											<th scope="col">Level</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; foreach ($user as $b) {?>
										<tr>
											<th scope="row"><?= $no;?></th>
											<td><?= $b['username'];?></td>
											<td><?= $b['nama'];?></td>
											<td><?= $b['kelas'];?></td>
											<td><?= $b['alamat'];?></td>
											<td><?= $b['level'];?></td>
											<td>
												<a href="<?=base_url('user/hapus/'.$b['id_user'])?>"
													onClick="return confirm('apakah anda yakin akan menghapus?')"
													class="" style="color:red;margin-right:1rem;"><i
														class="fa fa-trash"></i>
												</a>
												<a href="<?=base_url('user/edit/'.$b['id_user'])?>" class=""
													style="color:green;"><i class="fa fa-edit"></i></a>

											</td>
										</tr>
										<?php $no++ ;}?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('user/simpan');?>" method="post">
						<div class="form-floating mb-3">
							<input type="text" class="form-control" name="username" id="floatingInput1" placeholder="" required>
							<label for="floatingInput1">Username</label>
						</div>
						<div class="form-floating mb-3">
							<input type="text" class="form-control" name="nama" id="floatingInput2" placeholder=""  required>
							<label for="floatingInput2">Nama</label>
						</div>
						<div class="form-floating mb-3">
							<select name="kelas" class="form-select"  required>
								<option value="">- Pilih -</option>
								<option value="XI RA">XI RA</option>
								<option value="XI RB">XI RB</option>
								<option value="XI RC">XI RC</option>
							</select>
							<label>Kelas</label>
						</div>
						<div class="form-floating mb-3">
							<input type="text" class="form-control" name="alamat" id="floatingInput4" placeholder=""  required>
							<label for="floatingInput4">Alamat</label>
						</div>
						<div class="form-floating mb-3">
							<input type="password" class="form-control" name="password" id="floatingPassword1"
								placeholder=""  required>
							<label for="floatingPassword1">Password</label>
						</div>
						<div class="form-floating mb-3">
							<select name="level" class="form-select"  required>
								<option value="">- Pilih -</option>
								<option value="User">User</option>
								<option value="Admin">Admin</option>
							</select>
							<label>Level</label>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>

		</div>
	</div>
	<?php require_once('layoutt/_footer.php')?>
	<?php require_once('layoutt/_js.php')?>
	<script>
		$('#ngilang').delay('slow').slideDown('slow').delay(4000).slideUp(600);

	</script>
