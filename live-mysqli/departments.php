<?php

/* Database connection */

// 1. Define some constants
define('DB_SERVERNAME', 'localhost:5506');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', '1_pt_university');
// 2. create an instance of the new connection
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// 3. check if there is a connection error
if ($connection && $connection->connect_error) {
  echo "Connection failed: " . $connection->connect_error;
  die;
}

//var_dump($connection);

var_dump(empty($_POST['name']));

if (empty($_POST['name'])) {
  $sql = "SELECT * FROM `departments`";
  $result = $connection->query($sql);
}

if (!empty($_POST['name'])) {
  //var_dump('filter the data dude');
  $name = $_POST['name'];
  $sql = "SELECT * FROM `departments` WHERE `name` LIKE '%" .   $name . "%'";
  //var_dump($sql);
  //die;
  $result = $connection->query($sql);
}

//var_dump($result);
/* while ($row = $result->fetch_assoc()) : ?>
  var_dump($row['name']);

  ['name' => $name, 'website' => $website] = $row;

  var_dump($name, $website);


  die;


endwhile; */
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Departments</title>
</head>

<body>

  <nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
      <a class="navbar item" href="/index.php">Students</a>
      <a class="navbar item" href="/departments.php">Departments</a>
    </div>
  </nav>

  <form action="" method="post">
    <input type="text" name="name" id="name" placeholder="search a department by name">
    <button type="submit">Search</button>
    <a href="/">Reset</a>
  </form>




  <!-- // Loop over the results -->
  <?php while ($row = $result->fetch_assoc()) :

    // array destructuring
    ['name' => $name, 'website' => $website] = $row;
    //var_dump($row['name']);

  ?>

    <div>
      <p>name: <strong><?= $name ?></strong></p>
      <p>website: <strong><?= $website ?></strong></p>

      <!-- <p>name: <strong><?= $row['name'] ?></strong></p>
      <p>website: <strong><?= $row['website'] ?></strong></p> -->
      <hr>
    </div>

  <?php endwhile; ?>

  <?php if ($result->num_rows === 0) : ?>
    <p>No results found</p>
  <?php endif ?>

</body>

</html>