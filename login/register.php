<?php 
	include '../config/conn.php';
	include '../class/validation.php';
	$validate = new validation;
	if(isset($_POST['daftar'])) {
		$validate->register($conn,$_POST['nama'],$_POST['email'],$_POST['pass'],$_POST['telp']);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Flocity</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body style="background-color: #666666;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<span class="login100-form-title p-b-43">
						Register
					</span>

					<div class="wrap-input100 validate-input" data-validate="Masukkan nama anda">
						<input class="input100" type="text" name="nama">
						<span class="focus-input100"></span>
						<span class="label-input100">Nama</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Masukkan nomor telepon anda">
						<input class="input100" type="text" name="telp">
						<span class="focus-input100"></span>
						<span class="label-input100">No. Telepon</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Email valid diperlukan ex: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Masukkan password anda">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="container-login100-form-btn mt-4">
						<button class="login100-form-btn" stype="submit" name="daftar" style="background-color:#d62d20;">
							Daftar
						</button>
					</div>

					<div class="text-center p-t-20 p-b-20">
						<small>Sudah mempunyai akun?
							<a href="./"> Login</a>
						</small>
					</div>
				</form>
				<div class="login100-more"
					style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40), rgba(0, 0, 0, 0.40)), no-repeat url('https://instagram.fcgk18-1.fna.fbcdn.net/vp/087ee5b32b5208fa6344cfdf150a1899/5D4C4687/t51.2885-15/e35/54800599_300549157290889_2951617467859233100_n.jpg?_nc_ht=instagram.fcgk18-1.fna.fbcdn.net&_nc_cat=101'); background-size: cover;">
				</div>
			</div>
		</div>
	</div>





	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>