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
    <title>Admin</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
       <div class="container">
         <p class="navbar-brand mx-auto mb-0">Halo, <?php echo $_SESSION['name']; ?>!</p>
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

     <?php
       include 'connection.php';
       $user = mysqli_query($conn,"select * from user");
      ?>
     <div class="container">
       <div class="row">
         <div class="col-12 mt-4">
           <div class="w-100 mb-4">
             <img class="img-fluid rounded-3" src="img/header1.jpg" alt="" style="max-height: 250px; width: inherit;">
           </div>

           <h2 class="title"><strong>Dashboard Admin</strong></h2>
           <div class="dark-blue round-1 mt-4">
             <div class="container p-2">
               <div class="row">

                 <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-12 p-2">
                   <a href="data-permintaan.php">
                     <div class="card card-custom h-100">
                       <div class="card-btn my-auto">
                         <i class="icon fa-solid fa-hand-holding mb-2"></i>
                         <p class="name-btn">Permintaan</p>
                       </div>
                     </div>
                   </a>
                 </div>


                 <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-12 p-2">
                   <a href="data-produksi.php">
                     <div class="card card-custom h-100">
                       <div class="card-btn my-auto">
                         <i class="icon fa-solid fa-circle-plus mb-2"></i>
                         <p class="name-btn">Data Produksi</p>
                       </div>
                     </div>
                   </a>
                 </div>

                 <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-12 p-2">
                   <a href="data-persediaan.php">
                     <div class="card card-custom h-100">
                       <div class="card-btn my-auto">
                         <i class="icon fa-solid fa-receipt mb-2"></i>
                         <p class="name-btn">Data Persediaan</p>
                       </div>
                     </div>
                   </a>
                 </div>


                 <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-12 p-2">
                   <a href="laporan.php">
                     <div class="card card-custom h-100">
                       <div class="card-btn my-auto">
                         <i class="icon fa-solid fa-file-invoice mb-2"></i>
                         <p class="name-btn">Laporan</p>
                       </div>
                     </div>
                   </a>
                 </div>

                 <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-12 p-2">
                   <a href="hitung-fuzzy.php">
                     <div class="card card-custom h-100">
                       <div class="card-btn my-auto">
                         <i class="icon fa-solid fa-calculator mb-2"></i>
                         <p class="name-btn">Hitung Logika Fuzzy</p>
                       </div>
                     </div>
                   </a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
  </body>
</html>
