<?php
$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => "https://covid-19-coronavirus-statistics.p.rapidapi.com/v1/stats?country=Indonesia",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
	/* Masukkan x-rapidapi-key yang ada di akun RapidApi kamu. */
		"x-rapidapi-host: covid-19-coronavirus-statistics.p.rapidapi.com",
		"x-rapidapi-key: xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
	),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
	$teks = "<p align='center' class='label label-danger'>Ada kesalahan atau error pada server.</p>";
} else {
	$json_objek = json_decode($response, true);
	$teks = "";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Aplikasi Pemantauan COVID-19</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Status COVID-19.">
		<meta name="keywords" content="COVID-19">
		<meta name="author" content="Dwi A Lestari">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">		
		<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600" rel="stylesheet">
	</head>
	<body>
		<div class="wrapper">
			<!-- header -->
			<header>
				<!-- navigation -->
				<nav class="navbar navbar-default" role="navigation">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active"><a href="index.php">Beranda</a></li>
								<li class="active"><a href="other.php">Negara Lain</a></li>
							</ul>			
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</header>
				<!-- benefits -->
				<div class="benefits pad">
					<h2 align="center">PEMANTAUAN COVID-19 DI INDONESIA</h2>
					<?php echo $teks; ?>
					<p align="center">Waktu Terakhir : <?php echo date('d-m-Y H:i A',strtotime($json_objek['data']['lastChecked'])); ?></p>
						<div class="container">
						<div class="row">
						<div class="col-lg-4 col-md-4">
							<p align="center"><i class="fa fa-user" style="font-size:70px; color:yellow;"></i><br>
							Total Kasus :  <?php echo $json_objek['data']['covid19Stats'][0]['confirmed']; ?> kasus.<br></p>
						</div>
						<div class="col-lg-4 col-md-4">
							<p align="center"><i class="fa fa-user" style="font-size:70px; color:green;"></i><br>
							Total Sembuh : <?php echo $json_objek['data']['covid19Stats'][0]['recovered']; ?> orang.<br></p>
						</div>
						<div class="col-lg-4 col-md-4">
							<p align="center"><i class="fa fa-user" style="font-size:70px; color:red;"></i><br>
							Total Meninggal Dunia : <?php echo $json_objek['data']['covid19Stats'][0]['deaths']; ?> orang<br></p>
						</div>
						</div>
						</div>
					</div>
			<!-- footer -->
			<footer>
				<div class="container">
				<div class="row" style="background:#dddddd;">
					<p class="copy-right">Copyright &copy; 2020 <a href="https://dwitari.my.id/covid19/stat">www.dwitari.my.id</a>, All rights reserved. </p>
				</div>
				</div>
			</footer>
		</div>		
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>	
</html>
