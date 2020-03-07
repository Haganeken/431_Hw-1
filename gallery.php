<!DOCTYPE html>
<html>
<head>
  <title>Gallery</title>
  <body>
    <a href="index.html">Upload photo</a>
    <form action='gallery.php' method='post' name='value'>
      <!-- drop down menu -->
      <select name="value">
        <option value="AZ">Name:A-Z</option>
        <option value="ZA">Name:Z-A</option>
        <option value="Photog">Photographer</option>
        <option value="Loc">Location</option>
      </select>
      <br />
      <input type='submit' value= 'Filter'>
    </form>
    <h1>Photo gallery</h1>
    <div align="center">



<?php
  //initialize db connection
  $db = mysqli_connect("localhost", "root", "", "image_upload");


//check fann_get_total_connections
if (!$db) {
  die("Connection to db failed: " . mysqli_connect_error());
}

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
    //image BLOB?
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
      echo "<img src='uploads/".$row['image']."' height=15% width=15% >";
      echo "<p>".$row['name']."</p>";
      echo "<p>".$row['date']."</p>";
      echo "<p>".$row['photographer']."</p>";
      echo "<p>".$row['location']."</p>";
    echo "</div>";
  }
  // Post value for drop down menu
  if(isset($_POST['value'])) {

    //set table column to query value
    $column = $_POST['value'];

    //Selection query
    $query = "SELECT ". $column . " FROM images";

    //db query
    $sql = mysqli_query($db,$query);

    // Loop through results
    while ($row = mysqli_fetch_array ($sql)){
      echo "<div id='img_div'>";
        echo "<img src='uploads/".$row['image']."' height=15% width=15% >";
        echo "<p>".$row['name']."</p>";
        echo "<p>".$row['date']."</p>";
        echo "<p>".$row['photographer']."</p>";
        echo "<p>".$row['location']."</p>";
        echo "</div>";
      }

?>
<!--

 </tr>
-->
</div>
</body>
</html>
