<?php

session_start();

include "db.inc.php";

$movieTitle = $_POST['movieName'];
$genre = $_POST['movieGenre'];

echo $movieTitle;

$genreArray = json_encode($genre);

echo $genreArray;

if(isset($_POST['addMovie'])) {

    $sql = "INSERT INTO movies (movieTitle, movieGenre)
  VALUES ('$movieTitle', '$genreArray')";
  if (mysqli_query($conn, $sql)) {
  $_SESSION['message'] = 'movieAdded';
  header("Location: index.php");

  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  }


  // Delete a Guest
if(isset($_POST['deleteMovie'])) {

  $sql = "DELETE FROM movies WHERE id='{$_POST['movieId']}'";
  if (mysqli_query($conn, $sql)) {
  $_SESSION['message'] = 'moviedeleted';
  header("Location: index.php");
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  }
// end of delete


// Update a guest
if(isset($_POST['updateGuest'])) {
  
  $sql = "UPDATE movies SET movieTitle='{$movieTitle}', movieGenre='{$genreArray}' WHERE id='{$_POST['movieId']}'";
  if (mysqli_query($conn, $sql)) {
  $_SESSION['message'] = 'movieupdated';
  header("Location: index.php");
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  }
mysqli_close($conn);


?>
