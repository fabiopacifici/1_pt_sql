<?php

/* Connect to the database via PHP */

define('DB_SERVERNAME', 'localhost:5506');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', '1_pt_university');

$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($connection && $connection->connect_error) {
  echo 'Database Connection Failed';
  die;
}

// Check the connection object
var_dump($connection);

if (!empty($_POST['year'])) {
  $year_of_birth = $_POST['year'];
  var_dump($year_of_birth);
}

$sql = "SELECT * FROM `students` WHERE `date_of_birth` LIKE ? " . $year_of_birth . "%";
var_dump($sql);
//$result = $connection->query($sql);

//var_dump($result);


$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University</title>
</head>

<body>


  <form action="" method="post" class="d-flex mb-5">
    <input type="number" name="year" id="year" class="form-control" placeholder="Filter by year of birth ie. 1990" value="1990">
    <button type="submit" class="btn btn-primary">Search</button>
    <a href="/" class="text-muted nav-link">Reset</a>
  </form>





  <?php
  if ($result->num_rows > 0) :
    while ($row = $result->fetch_assoc()) : ?>


      <div><?php echo $row['name'] ?></div>


  <?php endwhile;
  endif;  ?>


</body>

</html>