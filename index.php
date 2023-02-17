<?php include 'loadUser.php'; ?>
<?php include 'logout.php'; ?>
<?php include 'modals.php'; ?>
<?php include 'sectionAuth.php'; ?>
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
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script> -->
    <style>
        label {
        display: block;
        margin-bottom: 10px;
        }
        textarea {
        width: 100%;
        height: 300px;
        }
    </style>
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
                   

                    <form action="#" method="POST" enctype="multipart/form-data">
                        <label for="id">Select Section:</label>
                        <select name="section" class="form-control" onchange="fetchDescription(this.value)" >
                        <?php 
                            $jsonobj =  file_get_contents("http://api.globestationers.com/api/section/loadAllSections.php");
                            
                            $PHPSecObj = json_decode($jsonobj);
                            
                            if ($PHPSecObj->success == 0) {
                                $sect_error = $PHPSecObj->message;
                            } elseif ($PHPSecObj->success == 1) {
                                $sect_data = $PHPSecObj->sections;
                                for ($x = 0; $x < count($sect_data); $x++) {
                                    echo '
                                    <option  value="' . $sect_data[$x]->section_id . '">
                                    ' . $sect_data[$x]->section_title . '
                                    </option>                               
                                    ';
                                }
                            }
                        ?>
                        </select>
                        <br>
                        <label for="description">Description:</label>
                        <textarea name="description" id="description"></textarea>
                        <!-- <textarea name="description" id="ck_editor_textarea" cols="30" rows="10"></textarea> -->
                        <!-- id="ck_editor_textarea" -->
                        <br>
                        <p>
                            Upload Image
                        </p>
                        <input type="file" name="fileToUpload"  required><br>
        
                        <div class="w3-container w3-section">
                            <input type="submit" name="submit_section_update" value="submit" class="w3-btn w3-blue w3-round-large w3-right">
                        </div>

                    </form>
                </div>
            </div>
            <!-- End Form detail to add a room -->
        </div>

    </div>
    <!-- EndMain Contents Here with the top navbar -->


    <!-- Capture Session ID Script -->
    <script>
        function fetchDescription(id) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `http://api.globestationers.com/api/section/loadSingleSection.php?id=${id}`);
        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                const description = response.section_data.description;
                const textarea = document.querySelector('textarea[name="description"]');
                textarea.value = description;
                // ClassicEditor.create(textarea);
                
            // const description = JSON.parse(xhr.responseText).section_data.description;
            // document.querySelector('textarea[name="description"]').value = description;
            }
        };
        xhr.send();
        }

        // fetch the initial description when the page is first loaded
        fetchDescription(document.querySelector('select[name="select_name"]').value);
    </script>
    
    <!-- ckeditor js for form textarea -->
    <script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ck_editor_textarea');
        // CKEDITOR.replace('ck_editor_textarea1');
    </script>

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