<?php
session_start();
if($_SESSION['status']!="loggedin"){
  header("location:index.php");
}

if (isset($_SESSION['level'])){
	if ($_SESSION['level'] == "admin"){
   } else if ($_SESSION['level'] == "owner"){
       header('location:owner.php');
   }
}
if (!isset($_SESSION['level'])){
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>?</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
       <div class="container">
         <p class="navbar-brand mx-auto mb-0">kentang.</p>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
           <div class="navbar-nav ms-auto">
             <a class="nav-link text-danger mx-2" href="logout.php">Logout</a>
           </div>
         </div>
       </div>
     </nav>

     <div class="container">
       <h2 class="header-title mt-4">Input Data ?</h2>

       <div class="row">
         <div class="col-xxl-2 col-xl-2 col-lg-2 d-sm-none d-md-none d-lg-block"></div>

         <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-12">
           <form class="">
               <div class="form-group">
                 <label for="">Tanggal Produksi</label>
                 <input id="" class="w-100" type="date">
               </div>

               <div class="form-group">
                 <label for="">Jumlah Permintaan</label>
                 <input id="" class="w-100" type="number">
               </div>

               <div class="form-group">
                 <label for="">Jumlah Persediaan</label>
                 <input id="" class="w-100" type="number">
               </div>

               <div class="form-group">
                 <label for="">Jumlah Produksi</label>
                 <input id="" class="w-100" type="number">
               </div>

               <div class="form-row mt-5">
                 <button class="red me-3" type="reset">Reset</button>
                 <button class="green" type="submit">Hitung</button>
               </div>
           </form>
         </div>
       </div>
     </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
  </body>
</html>

<!--
Developed by Aditya Suryana
github.com/adityasuryana
-->
