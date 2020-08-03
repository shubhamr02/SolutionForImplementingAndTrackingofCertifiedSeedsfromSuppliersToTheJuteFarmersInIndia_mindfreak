<?php
include_once 'config/database.php';
if(isset($_POST['submit']))
{
    $test = $_POST['test'];
    $result = mysqli_query($conn,"SELECT * FROM inventory where bag=$test OR lot=$test");
    $row = mysqli_fetch_assoc($result);
      $bag=$row['bag'];
      $lot=$row['lot'];
    
      if($bag==$test)
      {
        echo '<script>alert("Verified")</script>';
        
      }
      elseif($lot==$test)
      {
         echo '<script>alert("Verified")</script>';
       
      }
      else
      {
         echo '<script>alert("Not Verified contact Supplier")</script>';
        
      }
  
}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/pricing/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src= "https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>  
    <!-- Bootstrap core CSS -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      i.fas.fa-user {
        font-size: 100px;
      }
      .click-btn{
        border-radius: 50px;
        background-color aqua: 
      }

      .brand {
          position: absolute;
          left: 50%;
          margin-left: -50px !important;  /* 50% of your logo width */
          display: block;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <img class="my-0 mr-md-auto" src="./logo/jute.jpg" width="250px;">
      <img src="./logo/rpb.png" class="brand" width="250px;">
      <img src="./logo/min.png" width="175px;">
    </div>

<div class="container p-5">
  
  <div id="show" class="mb-3 text-center">
    <div id="google_translate_element"></div>
  </div>
  <div class="card-deck mb-3 text-center p-3">
    <div class="card mb-6 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Official</h4>
      </div>
      <div class="card-body ">
       <!-- <img src="./img/user.png" class="card-img-top" style="max-height: 250px; max-width: 250px" alt="...">-->
       <i class="fas fa-user"></i>
        <button type="button" onclick="offlogin()" class="btn btn-lg btn-block font-weight-bolder btn-outline-primary mt-4">Official Login</button>
      </div>
    </div>
    <div class="card mb-6 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Supplier</h4>
      </div>
      <div class="card-body">
        <i class="fas fa-user"></i>
        <button type="button" onclick="suplogin()" class="btn btn-lg btn-block btn-outline-primary font-weight-bolder mt-4 font-awesome">Click here to login or register</button>
      </div>
    </div>  
  </div>
  <div class="col-sm-12 mx-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-row align-content-center">
                      <div class="col-sm-12">
                        <input type="number" class="form-control col-sm-12 p-3 mb-3 font-awesome" name="test" id="test" placeholder="Enter Bag No or Lot No">
                      </div>
                      <div class="col-sm-12">
                      <button type="submit" name="submit" id="submit" class="btn btn-outline-primary font-weight-bolder btn-block">Verify</button>
                      </div>
                    </div>
                  </form>
              </div>
              <br>
              <div id="show" class="mb-3 text-center">
                <a  href="yieldsub.php"role="button" id="farmer" class="btn btn-lg btn-secondary " >Farmer </a>
              </div>
              
</div>

<footer class="pt-4 my-md-5 pt-md-5 border-top">

   
   <p class="text-center">
            Copyright © MindFreak 
   </p>
   
  
    

   
  </footer>
  
     <script>
      function suplogin()
      {
        location.href="login.php";
      }
    </script>

    <script>
      function offlogin()
      {
        location.href="login.php";
      }
    </script>
    <script type="text/javascript">  
            function googleTranslateElementInit() {  
                new google.translate.TranslateElement( 
                    {pageLanguage: 'en'},  
                    'google_translate_element' 
                );  
            }  
        </script> 

</body>
</html>
