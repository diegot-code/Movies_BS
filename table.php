<div class="container">
<div class="row">
<div class="col-md-12">

<table class="table table-hover table-striped table-bordered">
<tr>
<th>ID</th>
<th>Movie</th>
<th>Genre</th>
<th></th>
<th></th>
</tr>
<?php

// FTP creds were here

include "db.inc.php";


$sql = "SELECT * FROM movies";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    ?>
<tr>
<td><?=$row['movieId']?></td>
<td><?=$row['movieTitle']?></td>
<td><?=$row['movieGenre']?></td>
<td>
<form action="index.php" method="POST">
  <input type="hidden" name="movieId" value="<?=$row['movieId']?>">
  <input type="hidden" name="movieTitle" value="<?=$row['movieTitle']?>">
<button type="submit" name="editGuest" class="btn btn-success btn-xs">Edit</button>
</form>
</td>
<td>
<form action="functions.php" method="POST">
  <input type="hidden" name="movieId" value="<?=$row['movieId']?>">
<button type="submit" name="deleteGuest" class="btn btn-danger btn-xs">X</button>
</form>
</td>
</tr>


<?php
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>

</table>
</div>
</div>
</div>