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
	<div class="container-fluid pt-4 px-4">
		<div class="row justify-content-center">
			<div class="col-sm-12 col-xl-4">
				<div class="card border shadow h-100 py-2  justify-content-center">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-danger">Edit User</h6>
					</div>
					<div class="card-body">
						<?php foreach ($user as $a) {?>
						<form action="<?= base_url('user/update');?>" method="post">
							<input type="hidden" name="id_user" value="<?= $a['id_user']?>">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" name="username" value="<?= $a['username']?>"
									id="floatingInput1" placeholder="" readonly>
								<label for="floatingInput1">Username</label>
							</div>
							<div class="form-floating mb-3">
								<input type="text" class="form-control" name="nama" value="<?= $a['nama']?>"
									id="floatingInput2" placeholder="">
								<label for="floatingInput2">Nama</label>
							</div>
							<div class="form-floating mb-3">
								<select name="kelas" class="form-control">
									<option value="">- Pilih -</option>
									<option value="XI RA" <?php if($a['kelas'] == 'XI RA'){echo 'selected';}?>>XI RA
									</option>
									<option value="XI RB" <?php if($a['kelas'] == 'XI RB'){echo 'selected';}?>>XI RB
									</option>
									<option value="XI RC" <?php if($a['kelas'] == 'XI RC'){echo 'selected';}?>>XI RC
									</option>
								</select>
								<label>Kelas</label>
							</div>
							<div class="form-floating mb-3">
								<input type="text" class="form-control" name="alamat" value="<?= $a['alamat']?>"
									id="floatingInput4" placeholder="">
								<label for="floatingInput4">Alamat</label>
							</div>
							<div class="form-floating mb-3">
								<select name="level" class="form-control">
									<option value="">- Pilih -</option>
									<option value="User" <?php if($a['level'] == 'User'){echo 'selected';}?>>User
									</option>
									<option value="Admin" <?php if($a['level'] == 'Admin'){echo 'selected';}?>>Admin
									</option>
								</select>
								<label>Level</label>
							</div>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</form>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once('layoutt/_footer.php')?>
	<?php require_once('layoutt/_js.php')?>


</body>

</html>
