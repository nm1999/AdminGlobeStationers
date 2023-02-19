<?php 
	$url = file_get_contents('https://www.admin.globestationers.com/fetchQuotation.php');
	$obj = json_decode($url);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Admin dashboard</title>
	<link rel="stylesheet" href="css/w3-css/w3.css">
	<link rel="stylesheet" href="css/w3-css/w3pro.css">
	<link rel="stylesheet" href="fonts/font-awesome.min.css">
	<!-- Bootstrap 4.5 CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="w3css.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="css/style.css" />
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet" />
	<script src="jquery.min.js"></script>
	<script src="js/customiseJs/Jquery.js"></script>	
</head>

<body>
	<!-- Check for  the side bar label -->
	<input type="checkbox" id="toggler">

	<!-- Start Side Navigation Bar -->
	<div class="sidebar w3-blue" >
		<div class="sidebrand">
			<h2>
				<i class="fab fa-accusoft"></i>
				<span>Admin</span>
			</h2>
		</div>
		<div class="sidebar-menu">
			<ul>
				<li class="active-li">
					<a href="base.php" class="active"><i class="fa fa-home"></i><span>Dashboard</span></a>
				</li>
				
				<li>
					<a href="quotation.php" class="add_room"> <i class="fas fa-bed"></i> <span>View Quotations</span></a>
				</li>
				<li>
					<a href="index.php" class="food"> <i class="fa fa-user-plus"></i> <span> Upload Images</span></a>
				</li>
				<li>
					<a href="#"> <i class="	fa fa-shopping-bag"></i> <span>Settings</span></a>
				</li>
				</li>
				<li>
					<a href="login.php"> <i class="	fa fa-power-off"></i> <span>Logout</span></a>
				</li>
			</ul>
		</div>
	</div>
	<!-- End Side Navigation Bar -->

	<!-- StartMain Contents Here with the top navbar -->
	<div class="main-content">
		<!-- Start top Navigation bar -->
		<header>
			<label for="toggler">
				<h2>
					<i class="fa fa-bars "></i>
					<span>Dashboard</span>
				</h2>
			</label>
			<div class="search-wrapper">
				<!-- <span class="fa fa-search"></span> -->
				<!-- <input type="search" placeholder="search here" /> -->
			</div>
			<div class="profile-picture">
				<span class="fa fa-user fa-3x"></span>
				<div>
					<h4>
						<span></span>
					</h4>
					<span class="admin">Super Admin</span>
				</div>
			</div>
		</header>
		<!-- End top Navigation bar -->

		<!-- Start Contents of the main container -->
		<main class="main">
			<div class="cards">
				<div class="card-single">
					<div class="details">
						<span>Quotations</span>
						<b><h1> <?php count( $obj )?> </h1></b>
						
					</div>
					<div class="icon">
						<i class="fa fa-users fa-2x"></i>
					</div>
				</div>
				<div class="card-single">
					<div class="details">
						<span>Images</span>
						<h1>8</h1>
					</div>
					<div class="icon">
						<i class="fas fa-bed"></i>
					</div>			
				</div>
			
				<div class="card-single">
					<div class="details">
						<span>Expenses</span>
						<h1>2300</h1>
					</div>
					<div class="icon">
						<i class="fab fa-adn fa-2x"></i>
					</div>
			
				</div>
				<div class="card-single">
					<div class="details">
						<span> Last login</span>
						<h4> 13.2.2023</h4>
					</div>
					<div class="icon">
						<i class="fa fa-shopping-bag fa-2x"></i>
					</div>
			
				</div>
			   
			</div>
			
				
			
			<!-- End Admin Analysis Cards -->
			
			<!-- Start Analytical graphs for the adminstrator -->
			<div class="graph-admin">
				<div class="container   py-2 px-2">
					<div class="container-fluid">
						<div class="row ">
							<div class="col lg-8  md-5">
								<div id="chart_div" class="graph_1"></div>
							</div>
							<div class="col lg-4 md-4">
								<div id="piechart_3d" class="graph_2"></div>
							</div>
						</div>
					</div>
				</div>
			   
			</div>
		</main>
		<!-- End Contents of the main container -->

	</div>
	<!-- EndMain Contents Here with the top navbar -->

	<!-- Custom jquery file -->
	<!-- Google Script to load the graph -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<!-- Line Chart Script -->
	<script src="js/customiseJs/lineChart.js"></script>
	<!-- Pie Chaart Script -->
	<script src="js/customiseJs/piechart.js"></script>
	<!-- jQuery -->
	<script src="js/defaultLibrarys/jquery-3.5.1.min.js"></script>
	<!-- Bootstrap 4.5 JS -->
	<script src="js/defaultLibrarys/bootstrap.min.js"></script>
	<!-- Popper JS -->
	<script src="js/defaultLibrarys/popper.min.js"></script>
	<!-- Font Awesome -->
	<script src="js/defaultLibrarys/all.min.js"></script>
</body>

</html>