<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>houseBuy</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="index.php">HouseBuy</a>

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>

      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Products</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Apartment</a>
          <a class="dropdown-item" href="#">Villa</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Contact Us</a>
      </li>

    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <a class="nav-link p-2" href="#"><img src="img/topnav_fb.png"></a>
      </li>
      <li class="nav-item">
      <a class="nav-link p-2" href="#"><img src="img/topnav_tw.png"></a>
      </li>
      <li class="nav-item">
      <a class="nav-link p-2" href="#"><img src="img/topnav_gp.png"></a>
      </li>
      <li class="navbar-nav">
            <a href="#" class="nav-item nav-link">Login</a>
      </li>

    </ul>
</nav>

<div class="jumbotron"> <!--Sign up Form [Start]-->
    <div class="container col-sm-4 mt-3"> 
      <div class="row">
          <h3  id="sUp"class="text-left ml-3">Create your HouseBuy Account</h3>    
          </div>
      </div>
  </div>

    <div class="container">

    <div class="row">

    <div class="col-lg-1"></div>

      <div class="col-lg-9">

        <form class="form-group" action="x.php" method="post">

          <div class="row">

            <div class="col-lg-6">
              <div class="form-group font-weight-bold">
                  <label for="uName ">User Name: </label>
                      <input type="text" class="form-control" id="uName" placeholder="Create a Username" name="uNname">
                </div>
              </div> 

                
            <div class="col-lg-6">
              <div class="form-group font-weight-bold">
                  <label for="email ">Email: </label>
                      <input type="email" class="form-control" id="email" placeholder="Enter your Email" name="emial">
                  </div>
                </div>

                
            <div class="col-lg-6">
              <div class="form-group font-weight-bold">
                  <label for="name ">Name: </label>
                      <input type="text" class="form-control" id="name" placeholder="Enter your Full Name" name="Nname">
                  </div>
                </div>

                
            <div class="col-lg-6">
              <div class="form-group font-weight-bold">
                  <label for="phnNo ">Phone Number: </label>
                  <input type="number minlength=11 maxlength=11" class="form-control" id="phoneNo" placeholder="Contact No" name="phoneNo"  minlength="11" maxlength=11>
                </div>
              </div>

                
            <div class="col-lg-6">
              <div class="form-group font-weight-bold">
                  <label for="pwd ">Password: </label>
                  <input type="password minlength=8" class="form-control" id="pwd" placeholder="Create a Password (Minimum length 8)" name="pwd"  minlength="8">
                </div>
              </div> 

              <div class="col-lg-6">
                <div class="form-group font-weight-bold">
                  <label for="Gender">Gender: </label>
                    <select class="form-control" id="sel1">
                        <option disabled selected>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                      </select>
                  </div>
                </div>                                                                            
            </div>

            <div class="form-group  font-weight-bold">
                <label for="address ">Address: </label>
                <input type="adrs" class="form-control" id="adrs" placeholder="Enter your Address" name="adrs1">
            </div>

            <br>

            <p class=text-center>By clicking Sign Up, you agree to HouseBuy's <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>
            <br>
            <br>
              <div class="col text-center">
                <button type="submit" class="btn btn-danger">Sign me Up! </button>
                </div>  
          </form>
    </div>



<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>



