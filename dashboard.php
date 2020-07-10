<?php  
  include("connection.php");
  $query = mysqli_query($connection,"SELECT * FROM mediclean_db");
  $total_query = mysqli_query($connection,"SELECT * FROM mediclean_db ORDER BY id DESC LIMIT 1");
  foreach ($total_query as $key) {
    $total = $key['id'];
  }
  
  $count_sql="SELECT * FROM mediclean_db ORDER BY id";

  if ($result=mysqli_query($connection,$count_sql))
    {
    // Return the number of rows in result set
    $collected=$total-mysqli_num_rows($result);
    // Free result set
    mysqli_free_result($result);
    }

  $covid_result=mysqli_query($connection,"SELECT count(covid_19) as total from mediclean_db");
  $covid_data=mysqli_fetch_assoc($covid_result);

  $other_result=mysqli_query($connection,"SELECT count(other) as total from mediclean_db");
  $other_data=mysqli_fetch_assoc($other_result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MediClean | Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Abel|Slabo+27px&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/user_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!-- START NAVBAR -->

<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
  <!-- Brand -->
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="navbar-brand p-2" href="dashboard.php"><img src="img/logo.png" width="50px"><span class="ml-2">MediClean</span></a>
    </li>
  </ul>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
       <ul class="navbar-nav ml-auto float-left mt-2">
          <li class="nav-item mr-2 active"><a class = "nav-link" href="dashboard.php">Dashboard</a></li>
          <li class="nav-item mr-2"><a class = "nav-link" href="details-2.html">Waste Category Details</a></li>
          <li class="nav-item mr-2"><a class = "nav-link" href="https://www.google.com/search?q=covid-19+related+news+and+awareness&oq=covid-19+related+news+and+awareness&aqs=chrome..69i57.10559j0j7&sourceid=chrome&ie=UTF-8" target="_blank">News and Awareness</a></li>
        </ul>
      <div class="clearfix"></div>
  </div>
</nav>
  <!-- START DASHBOARD -->
  <div class="container-fluid mt-5"></div>
  <div class="column text-center mt-5">
    <div class="row ml-2 mr-2">
      <div class="col card-one text-left m-3">
        <h4 class="text-center mb-3">Total Orders</h4>
        <ul>
          <li><?php   echo $total . " "?>orders</li>
        </ul>
      </div>
       <div class="col card-two text-left m-3">
        <h4 class="text-center mb-3">Wastes Collected</h4>
        <ul>
          <li><?php echo $collected . " "; ?> collected</li>
        </ul>
      </div>
       <div class="col card-three text-left m-3">
        <h4 class="text-center mb-3">Covid Wastes</h4>
        <ul>
          <li><?php echo $covid_data['total'] . " " ?> Covid Wastes</li>
        </ul>
      </div>
       <div class="col card-four text-left m-3">
        <h4 class="text-center mb-3">Other Wastes</h4>
        <ul>
          <li><?php echo $other_data['total'] ?> other wastes</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- END DASHBOARD -->
  <!-- table -->
  <div class="container-fluid">
    <div class="column">
      <div class="row">
        <div class="col-sm-9">
          <table class="table ml-2 mt-4">
            <thead class="table-dark">
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Place type</th>
                <th>Type of waste</th>
                <th>Waste Details</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php if ($query->num_rows > 0) {
             // output data of each row
              while($row = $query->fetch_assoc()) { ?>
            <tbody>
              <tr class="table-success">
                <td><?php echo $row['uname'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['address_line1']." ". $row['address_line2'] ." ". $row['city']." ". $row['pincode'] ?></td>
                <td><?php echo $row['phone_number'] ?></td>
                <td><?php echo $row['place'] ?></td>
                <td><?php echo $row['covid_19'] . " " .$row['other'] ?></td>
                <td><?php echo $row['textt'] ?></td>
                <td><button class="btn btn-success"><a style="color: #fff" href="dispose.php?id=<?php echo $row['id'] ?>">Disposed</a></button></td>
              </tr>
            </tbody>
          <?php } } ?>
          </table>
        </div>
        <!-- table 2 -->
        <div class="col-sm-3">
          <table class="table mr-4 mt-4">
            <thead class="table-dark">
              <tr>
                <th>Disposable centres</th>
                <th>Contact</th>
              </tr>
            </thead>
            <tbody>
              <tr class="table-secondary">
                <td>Greentech Environ Management Pvt. Ltd.</td>
                <td>2534-3649</td>
              </tr>
              <tr class="table-secondary">
                <td>Greenzen Bio Pvt. Ltd.</td>
                <td>0353-2595575</td>
              </tr>
              <tr class="table-secondary">
                <td>Medicare Environmental Management Pvt. Ltd.</td>
                <td>2651-3890/6207</td>
              </tr>
              <tr class="table-secondary">
                <td>Medicare Environmental Management Pvt. Ltd.</td>
                <td>2651-3890/6207</td>
              </tr>
              <tr class="table-secondary">
                <td>Medicare Environmental Management Pvt. Ltd.</td>
                <td>2651-3890/6207</td>
              </tr>
              <tr class="table-secondary">
      
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="footer mt-3">
        <div class="footer-endnote">
          <span class="ml-5">&copy; All rights reserved</span>
          <div class="footer-content-social">
            <a href="#"><span class="fab fa-facebook"></span></a>
            <a href="#"><span class="fab fa-instagram"></span></a>
            <a href="#"><span class="fab fa-twitter"></span></a>
          </div>
        </div>
    </div>
</body>
</html>
