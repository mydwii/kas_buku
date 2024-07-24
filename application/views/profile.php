<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php require_once('layoutt/_css.php')?>
</head>

<body>
	<?php require_once('layoutt/_sidebar.php')?>
	<?php require_once('layoutt/_navbar.php')?>

	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-xl-6 col-md-12 mb-4">
				<div class="card shadow mb-4">
					<!-- Card Header - Dropdown -->
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">Profile</h6>
						<div class="dropdown no-arrow">
							<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
								aria-labelledby="dropdownMenuLink">
								<div class="dropdown-header">Action:</div>
								<a class="dropdown-item" href="<?= base_url('Profile/edit') ; ?>">Edit
									Profil</a>
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
							<form role="form">
								<div class="box-body text-center">
									<img class="img-profile rounded-circle" style="width:8rem;"
										src="<?= base_url('assets/sbadmin/upload/') . $this->fungsi->user_login()->gambar ?>">

									<div class="form-group">
										<label for="exampleInputEmail1">Nama : </label>
										<?=$this->fungsi->user_login()->nama ?>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Kelas : </label>
										<?=$this->fungsi->user_login()->kelas ?>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Alamat : </label>
										<?=$this->fungsi->user_login()->alamat ?>
									</div>

								</div>
						</div>
					</div>
				</div>
			</div>
		</div>

</body>

<?php require_once('layoutt/_footer.php')?>
<?php require_once('layoutt/_js.php')?>

</html>
