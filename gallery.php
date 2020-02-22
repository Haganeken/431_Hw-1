<?php
  //initialize db connection
  $db = mysqli_connect("localhost", "root", "", "image_upload");

  // Initialize message variable
  $msg = "";

  //When upload button is clicked
  if (isset($_POST['upload'])) {
  	//image file name
  	$image = $_FILES['image']['name'];
  	//gets user inputted name/date/photog/loc
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $photographer = mysqli_real_escape_string($db, $_POST['photographer']);
    $location = mysqli_real_escape_string($db, $_POST['location']);

  	//target image file directory
  	$target = "uploads/".basename($image);

    //insert values into db
  	$sql = "INSERT INTO images (image, name, date, photographer, location) VALUES ('$image','$name', '$date','$photographer', '$location')";


  	mysqli_query($db, $sql);
  	if (move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$_FILES["image"]["name"])) {
      //if file uploaded, successful msg
  		$msg = "Successful";
  	}else{
  		$msg = "Failed to upload";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
  //query, get all from db
  //print image and data
  while ($row = mysqli_fetch_array($result)) {
    echo "<div id='img_div'>";
      echo "<img src='uploads/".$row['image']."' >";
      echo "<p>".$row['name']."</p>";
      echo "<p>".$row['date']."</p>";
      echo "<p>".$row['photographer']."</p>";
      echo "<p>".$row['location']."</p>";
    echo "</div>";
  }


?>
