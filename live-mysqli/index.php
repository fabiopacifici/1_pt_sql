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

//var_dump(empty($_POST['name']));

if (empty($_POST['name'])) {
  $sql = "SELECT `students`.`name`, `students`.`surname`,
`students`.`date_of_birth`, `students`.`fiscal_code`,
`students`.`enrolment_date`, `students`.`registration_number`,
`students`.`email`, `degrees`.`name` AS `degree_name`  FROM `students` JOIN `degrees` ON
`students`.`degree_id` = `degrees`.`id` WHERE `degrees`.`name`
= 'Corso di Laurea in Economia'
";
  $result = $connection->query($sql);
}

if (!empty($_POST['name'])) {
  //var_dump('filter the data dude');
  $name = $_POST['name'];
  $sql = "SELECT `students`.`name`, `students`.`surname`,
  `students`.`date_of_birth`, `students`.`fiscal_code`,
  `students`.`enrolment_date`, `students`.`registration_number`,
  `students`.`email`, `degrees`.`name` AS `degree_name` 
  FROM `students` JOIN `degrees` ON `students`.`degree_id` = `degrees`.`id` 
  WHERE `degrees`.`name` LIKE '%" .   $name . "%'";
  //var_dump($sql);
  //die;
  $result = $connection->query($sql);
}


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
  <title>Students</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand navbar-light bg-light">
      <div class="nav navbar-nav">
        <a class="nav-link" href="/index.php">Students</a>
        <a class="nav-link" href="/departments.php">Departments</a>
      </div>
    </nav>
  </header>


  <main>


    <div class="container py-4">

      <form action="" method="post" class="d-flex mb-5">
        <input type="text" name="name" id="name" class="form-control" placeholder="search a department by name">
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="/" class="text-muted nav-link">Reset</a>
      </form>



      <!-- // Loop over the results -->
      <?php while ($row = $result->fetch_assoc()) :

        // array destructuring
        ['name' => $name, 'degree_name' => $degree_name] = $row;
        //var_dump($row['name']);

      ?>

        <div>
          <p>name: <strong><?= $name ?></strong></p>
          <p>degree_name: <strong><?= $degree_name ?></strong></p>

          <!-- <p>name: <strong><?= $row['name'] ?></strong></p>
      <p>degree_name: <strong><?= $row['degree_name'] ?></strong></p> -->
          <hr>
        </div>

      <?php endwhile; ?>

      <?php if ($result->num_rows === 0) : ?>
        <p>No results found</p>
      <?php endif ?>

    </div>

  </main>


</body>

</html>