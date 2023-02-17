<?php include 'loadUser.php'; ?>
<?php include 'logout.php'; ?>
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
	<link rel="stylesheet" href="css/w3.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="css/style.css" />
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet" />
	<script src="jquery.min.js"></script>
	<script src="js/customiseJs/Jquery.js"></script>	
</head>

<body>
	<!--  include side bar  -->
	<?php include 'sidebar.php'; ?>

	<!-- StartMain Contents Here with the top navbar -->
	<div class="main-content">
		<!-- include top Navigation bar -->
		<?php include 'navbar.php'; ?>
        <div class="main ">
            <!-- Start Form detail to add a room -->
            <br><br><br>
            <div class="rooms mx-auto w-50 w3-section w3-padding-16">
                <div class="room-card 	w3-card-2 w3-white w3-width w3-padding w3-round-large">
                    <h3 class="w3-container w3-center w3-padding" style="font-family: cursive;">Update Website</h3>
                    <form action="." method="POST" enctype="multipart/form-data">
                        <p>
                            Section
                        </p>
                        <select name="section" class="form-control">
                            <option value="equipment">Facilities/ Equipments</option>
                            <option value="equipment">Services offered</option>
                            <option value="equipment">Slider Images</option>
                        </select>
                        <br>
                        <p>
                            Description
                        </p>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                       <br>
                        <p>
                            Upload Image
                        </p>
                        <input type="file" name="room_img"  required><br>
        
                        <div class="w3-container w3-section">
                            <!-- <input type="reset" class="w3-btn w3-yellow w3-round-large"> -->
                            <input type="submit" name="submit" value="submit" class="w3-btn w3-blue w3-round-large w3-right">
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form detail to add a room -->
        </div>

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