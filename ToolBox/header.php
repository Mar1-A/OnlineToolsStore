
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mystylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body id="page-body">
        
<nav class="navbar navbar-expand-lg py-4 sticky-top navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="logo-wraper">
        <a class="brand-logo" href="index.php"><img src="img/logo2.png" class="logo-img"/> </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
      <ul class="navbar-nav mx-auto mb-2  mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="products.php">Tools</a>
        </li>
        <li class="nav-item">
            <div>
                <a class="nav-link" href="basket.php">YourBasket</a>
            </div>
        </li>
        <?php
        if (isset($_SESSION["cusid"])){
            echo '<li class="nav-item">
                        <div>
                            <a class="nav-link " href="customerAccount.php">YourAccount</a>
                        </div>
                    </li>';
            echo '<li class="nav-item">
                        <div>
                            <a class="nav-link " href="logout.php">Logout</a>
                        </div>
                </li>';
        }
        else{
            echo '<li class="nav-item">
                    <div>
                        <a class="nav-link " href="login.php">logIn/signup</a>
                    </div>
                </li>';
        }
        ?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="What are you Looking for?" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Search</button>
      </form>
    </div>
    </div>
  </div>
</nav>

        
        
    