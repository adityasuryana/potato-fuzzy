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
    <title>Data Persediaan | Admin</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
       <div class="container">
         <p class="navbar-brand mb-0">CV. Satria Piningit</p>
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
       <h2 class="header-title mt-4">Input Data Persediaan</h2>

       <div class="row">
         <div class="col-xxl-2 col-xl-2 col-lg-2 d-sm-none d-md-none d-lg-block"></div>

         <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-12">
           <form method="POST" action="process/persediaan/insert_persediaan.php" class="">

             <div class="form-group">
               <label for="">Semester</label>
               <select class="" name="semester">
                 <option value="">Pilih Semester</option>
                 <option value="1">1</option>
                 <option value="2">2</option>
               </select>
             </div>

             <div class="form-group">
               <label for="">Tahun</label>
               <input id="" name="tahun" class="w-100" type="number">
             </div>

               <div class="form-group">
                 <label for="">Nama Pemesan</label>
                 <input id="" name="nama_pemesan" class="w-100" type="text">
               </div>

               <div class="form-group">
                 <label for="">Ukuran Kentang</label>
                 <select class="" name="produk">
                   <option value="">Pilih Ukuran</option>
                   <option value="kecil">Kecil</option>
                   <option value="besar">Besar</option>
                 </select>
               </div>

               <div class="form-group">
                 <label for="">Quantity</label>
                 <div class="d-flex">
                   <input id="" name="jumlah" class="w-100" type="number">
                   <p class="p-3 mx-auto my-auto">kg</p>
                 </div>
               </div>

               <div class="form-row mt-5">
                 <a href="admin.php" class="text-danger p-2 me-3">Kembali</a>
                 <button class="green" type="submit">Simpan</button>
               </div>
           </form>
         </div>
       </div>
     </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
  </body>
</html>
