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
	<link rel="stylesheet" href="css/w3.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="css/style.css" />
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet" />
	<script src="jquery.min.js"></script>
	<script src="js/customiseJs/Jquery.js"></script>	
</head>
<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  margin: auto;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<body>
	<!-- Check for  the side bar label -->
	<input type="checkbox" id="toggler">

	<!-- Start Side Navigation Bar -->
	<div class="sidebar" >
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
					<a href="quotation.php" class="food"> <i class="fa fa-user-plus"></i> <span> Upload Images</span></a>
				</li>
				<li>
					<a href="#"> <i class="	fa fa-shopping-bag"></i> <span>Settings</span></a>
				</li>
				</li>
				<li>
					<a href="/"> <i class="	fa fa-power-off"></i> <span>Logout</span></a>
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
        <div class="main mx-auto">
            <br><br><br><br>
            <div class="w-100 w3-container">
                <table class="table  table-striped">
                    <tr>
                        <th>Name / Company</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th></th>
                    </tr>  
                    <?php 
                        foreach($obj as $j){?>
                            <tr>
                                <td><?php echo $j->company_name; ?></td>
                                <td><?php echo $j->contact; ?></td>
                                <td><a href="mailto:<?php echo $j->email; ?>"><?php echo $j->email; ?></a></td>
                                <td><?php echo $j->quotation_subject; ?></td>
                                <td><?php echo $j->quotation_message; ?></td>
                                <td id="myBtn"><i class="fa fa-eye" ></i></td>
                            </tr>               


                        <?php }
                    ?>     
                </table>

            </div>
        </div>
    </div>

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <div class="container">
            <p style="font-weight:bold;">Subject</p>
            <div class="container">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis velit perspiciatis voluptate ut vitae nostrum nobis quos ea sit illum praesentium fuga, aspernatur dolore obcaecati? Labore nostrum officiis ut ea.</p>
            </div>
            <p style="font-weight:bold;">Message</p>
            <div class="container">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque ad voluptas, aut quis dolor, vel corrupti obcaecati voluptatum libero provident tempore illo doloremque exercitationem autem nulla illum, distinctio quaerat ut.
                </p>
            </div>
            <p style="font-weight:bold;">Description</p>
            <div class="container">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt vel repellat sit temporibus veritatis, officia in eius saepe, vitae incidunt quidem quos, minus fugit? Iste pariatur ipsa ea vel voluptas.</p>
            </div>
          </div>
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
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
    </script>
</body>