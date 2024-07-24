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
		<div class="row justify-content-center">
			<div class="col-xl-6 col-md-12 mb-4">
				<div class="card shadow mb-4">
					<!-- Card Header - Dropdown -->
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
						<div class="dropdown no-arrow">
							<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
								aria-labelledby="dropdownMenuLink">
								<div class="dropdown-header">Action:</div>
								<a class="dropdown-item" type="submit" href="<?= base_url('user/profil') ; ?>">Back</a>
							</div>
						</div>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title"></h3>
							</div>
							<!-- /.box-header -->
							<!-- form start -->

							<form action="<?= base_url('Profile/update');?>" method="post"
								enctype="multipart/form-data">
								<div class="box-body text-center">

									<input type="hidden" name="id_user"
										value="<?=$this->fungsi->user_login()->id_user ?>">
									<div class="form-floating mb-3">
										<input type="text" class="form-control" name="nama"
											value="<?=$this->fungsi->user_login()->nama ?>" id="floatingInput2"
											placeholder="">
										<label for="floatingInput2">Nama</label>
									</div>
									<div class="form-floating mb-3">
										<select name="kelas" class="form-control">
											<option value="">- Pilih -</option>
											<option value="XI RA"
												<?php if($this->fungsi->user_login()->kelas == 'XI RA'){echo 'selected';}?>>
												XI RA</option>
											<option value="XI RB"
												<?php if($this->fungsi->user_login()->kelas == 'XI RB'){echo 'selected';}?>>
												XI RB</option>
											<option value="XI RC"
												<?php if($this->fungsi->user_login()->kelas == 'XI RC'){echo 'selected';}?>>
												XI RC</option>
										</select>
										<label>Kelas</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" class="form-control" name="alamat"
											value="<?=$this->fungsi->user_login()->alamat ?>" id="floatingInput4"
											placeholder="">
										<label for="floatingInput4">Alamat</label>
									</div>
									<img class="img-profile rounded mb-3 border border-dark-subtle" style="width:15rem;"
										src="<?= base_url('assets/sbadmin/upload/') . $this->fungsi->user_login()->gambar ?>">
									<div class="form-floating mb-3">
										<div class="mb-3">
											<input type="file" name="gambar" class="form-control"
												aria-label="file example">
										</div>

									</div>
								</div>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
		<?php require_once('layoutt/_footer.php')?>
		<?php require_once('layoutt/_js.php')?>


</body>

</html>
