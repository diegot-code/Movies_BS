<?php
session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Movies</title>
    <link rel="shortcut icon" type="image/x-icon" href="movies.ico">
</head>
<body>

<!-- Horizontal Form -->
<div class="container">
<div class="row">
  <div class="col-md-12">
    <div class="jumbotron">
  <h1 class="text-center">Movies</h1>      
  
</div>
  </div>
<div class="col-md-4">

    <h2>Movie Form</h2>

<?php
//$_SESSION['message'] = 'movieAdded'


if(isset($_SESSION['message'])) {

    if($_SESSION['message'] == 'movieAdded') {
        echo '<div class="alert alert-info alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Movie has been Successfully added.
      </div>';
    }
}

?>

<form action="functions.php" method="POST">
    <div class="form-group">
      <label for="email">Movie Title:</label>
      <input type="text" class="form-control" id="movieName" placeholder="Enter Movie Name" name="movieName" required>
      <input type="text" class="form-control" name="movieName"
  <?php if(isset($_POST['movieName'])) {
    echo 'value="'. $_POST['movieName'] .'"';
  }  else {
    echo 'placeholder="Enter Movie Name"';
  }
  ?> 
  required>
    </div>

    <label>Select Genre:</label> <br>
    <!-- <select name="movieGenre" id="movieGenre" > -->
<?php
$genres = array("Action","Comedy","Kids and Family","Drama","Fantasy","Horror","Mystery","Romance","Thriller","Western");

foreach($genres as $genre) {
    $lower = strtolower($genre);
    echo '<input type="radio" id="'.$lower.'" name="movieGenre[]" value="'.$genre.'">'.$genre.'<br>';
}
?>

<!-- </select>  -->
<br> <br>
    <?php
if(isset($_POST['editGuest'])) {
echo '<input type="hidden" name="id" value="'.$_POST['movieId'].'">';
echo '<button type="submit" name="updateMovie" class="btn btn-warning">Update Movie</button>';
} else {
echo '<button type="submit" name="addMovie" class="btn btn-info">Add Movie</button>';
}
?>
<!-- Display Message after Added/Deleted/Updated -->
  <?php
  if(isset($_SESSION['message'])) {
  
  if($_SESSION['message'] == 'movieupdated') {

      echo '<div class="alert alert-success">
      <strong>Success!</strong> Movie Updated.
      </div><br><br>';
      }
  if($_SESSION['message'] == 'movieadded') {
    echo '<div class="alert alert-success">
    <strong>Success!</strong> Movie Added.
    </div><br><br>';
    
    }
  if($_SESSION['message'] == 'moviedeleted') {
    echo '<div class="alert alert-warning">
    <strong>Movie Deleted!</strong> 
    </div><br><br>';
    }
    unset($_SESSION['message']);

}

?>
  </form>
  
</div></div></div>


<?php

include "table.php";

?>




</body>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>