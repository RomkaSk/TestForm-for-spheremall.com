<?php

require_once 'includes/global.inc.php';

if (count($_POST) == 4) {
    $user->save($_POST, $_FILES);
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Test task for spheremall.com</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/material-kit.css" rel="stylesheet"/>
	<link href="assets/css/style.css" rel="stylesheet"/>

</head>

<body class="signup-page">
    <div id="result"></div>
	<nav class="navbar navbar-transparent navbar-absolute">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<a class="navbar-brand">TestForm</a>
        	</div>
    	</div>
    </nav>

    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('assets/img/bg3.jpeg'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
						<div class="card card-signup">
							<form class="form" method="POST" action="" enctype="multipart/form-data">
								<p class="text-divider">Classic</p>
								<div class="content">

									<div class="input-group col-md-6">
										<span class="input-group-addon">
											<i class="material-icons">account_circle</i>
										</span>
										<input type="text" class="form-control" name="name" placeholder="First Name..." required>
									</div>

									<div class="input-group col-md-6">
										<span class="input-group-addon">
											<i class="material-icons">account_circle</i>
										</span>
										<input type="text" class="form-control" name="last_name" placeholder="Last Name..." required>
									</div>

									<div class="input-group col-md-6">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="email" class="form-control" name="email" placeholder="Email..." required>
									</div>

									<div class="input-group col-md-6 finput-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<input required type="file" name="file" id="file" class="inputfile"  onchange="getFileName();"  accept="image/*" />
										<label for="file" id="file-name">Select avatar</label>
									</div>
									
									<div class="input-group col-md-12">
										<span class="input-group-addon">
											<i class="material-icons">assignment</i>
										</span>
										<textarea class="form-control" name="comment" placeholder="Comment" rows="5" required></textarea>
									</div>

								</div>
								<div class="footer text-center">
                                    <input type="submit" class="btn btn-simple btn-primary btn-lg" value='Send'>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer">
		        <div class="container">
		            <div class="copyright pull-right">
		                &copy; Test task for spheremall.com
		            </div>
		        </div>
		    </footer>

		</div>
    </div>
</body>
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>
	<script src="assets/js/material-kit.js" type="text/javascript"></script>
	
	<script>
        if (location.hash == '#good') {
            document.getElementById('result').innerHTML = '<div class="good-result">Good</div>';
        } else if (location.hash == '#error') {
            document.getElementById('result').innerHTML = '<div class="error-result">Error</div>';
        }

		function getFileName () {
			var file = document.getElementById('file').value;
	        var idxDot = file.lastIndexOf(".") + 1;
	        var extFile = file.substr(idxDot, file.length).toLowerCase();

	        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png") {
	            file = file.replace(/\\/g, "/").split('/').pop();
				document.getElementById ('file-name').innerHTML = file;
	        } else {
	            alert("Only jpg/jpeg and png files are allowed!");
	            return;
	        } 
		}
	</script>


</html>
