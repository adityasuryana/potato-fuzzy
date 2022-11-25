<?php
session_start();
if($_SESSION['status']!="loggedin"){
  header("location:index.php");
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
    <title>Hitung Logika Fuzzy | Admin</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  </head>
  <body>

    <?php
  		include 'connection.php';
  	?>

    <nav class="navbar navbar-expand-lg navbar-light">
       <div class="container">
         <p class="navbar-brand mx-auto mb-0">CV. Satria Piningit</p>
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
       <div class="row">
         <div class="col-xxl-2 col-xl-2 col-lg-2 d-sm-none d-md-none d-lg-block"></div>

         <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-12">
           <div class="d-flex mt-4">
             <a href="owner.php" class="my-auto text-dark"><i class="fa-solid fa-arrow-left fs-20 me-3"></i></a>
             <h2 class="header-title">Prediksi</h2>
           </div>

           <form method="GET" class="mb-4">
             <div class="form-group">
               <label for="">Filter Bulan & Tahun</label>
               <div class="d-flex">
                   <select class="" name="bulan">
                     <option value="">Pilih Bulan</option>
                     <option value="Januari">Januari</option>
                     <option value="Februari">Februari</option>
                     <option value="Maret">Maret</option>
                     <option value="April">April</option>
                     <option value="Mei">Mei</option>
                     <option value="Juni">Juni</option>
                     <option value="Juli">Juli</option>
                     <option value="Agustus">Agustus</option>
                     <option value="September">September</option>
                     <option value="Oktober">Oktober</option>
                     <option value="November">November</option>
                     <option value="Desember">Desember</option>
                   </select>

                   <select class="ms-3" name="tahun">
                     <option value="">Pilih Tahun</option>
                     <option value="2020">2020</option>
                     <option value="2021">2021</option>
                     <option value="2022">2022</option>
                     <option value="2023">2023</option>
                     <option value="2024">2024</option>
                   </select>

                 <input class="ms-3" type="submit" value="filter">
                 <a class="text-danger mt-2 p-3" href="hitung-fuzzy.php">reset</a>
               </div>
             </div>
           </form>

           <form action="process/insert_prediksi.php" method="post">
             <table id="table" class="mt-4">
               <thead>
                 <tr>
                  <th class="">Variabel</th>
                  <th class="text-center">Tertinggi</th>
                  <th class="text-center">Terendah</th>
                </tr>
               </thead>

               <tbody>
                   <?php
                   $no = 1;

                   if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
                     $bulan = $_GET['bulan'];
                     $tahun = $_GET['tahun'];
                     $sedia = mysqli_query($conn, "select MAX(jumlah) as max_jumlah, MIN(jumlah) as min_jumlah from persediaan where bulan='$bulan' and tahun='$tahun'");

                   } else {
                     $sedia = mysqli_query($conn, "select MAX(jumlah) as max_jumlah, MIN(jumlah) as min_jumlah from persediaan");

                   }

                   $data_sedia = mysqli_fetch_array($sedia)
                    ?>
                  <tr>
                   <th>Persediaan</th>

                   <td class="text-end"><input class="text-end" type="number" name="sediaMax" value="<?php echo $data_sedia["max_jumlah"]; ?>" > kg</td>
                   <td class="text-end"><input class="text-end" type="number" name="sediaMin" value="<?php echo $data_sedia["min_jumlah"]; ?>" > kg</td>
                 </tr>


                 <tr>
                   <?php
                   $no = 1;

                   if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
                     $bulan = $_GET['bulan'];
                     $tahun = $_GET['tahun'];
                     $minta = mysqli_query($conn, "select MAX(jumlah) as max_jumlah, MIN(jumlah) as min_jumlah from permintaan where bulan='$bulan' and tahun='$tahun'");

                   } else {
                     $minta = mysqli_query($conn, "select MAX(jumlah) as max_jumlah, MIN(jumlah) as min_jumlah from permintaan");

                   }

                   $data_minta = mysqli_fetch_array($minta)
                    ?>
                   <th>Permintaan</th>
                   <td class="text-end"><input class="text-end" type="number" name="mintaMax" value="<?php echo $data_minta["max_jumlah"] ?>" > kg</td>
                   <td class="text-end"><input class="text-end" type="number" name="mintaMin" value="<?php echo $data_minta["min_jumlah"] ?>" > kg</td>
                 </tr>

                 <tr>
                   <?php
                   $no = 1;

                   if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
                     $bulan = $_GET['bulan'];
                     $tahun = $_GET['tahun'];
                     $produksi = mysqli_query($conn, "select MAX(jumlah) as max_jumlah, MIN(jumlah) as min_jumlah from produksi where bulan='$bulan' and tahun='$tahun'");

                   } else {
                     $produksi = mysqli_query($conn, "select MAX(jumlah) as max_jumlah, MIN(jumlah) as min_jumlah from produksi");

                   }

                   $data_produksi = mysqli_fetch_array($produksi)
                    ?>
                   <th>Produksi</th>
                   <td class="text-end"><input class="text-end" type="number" name="prodMax" value="<?php echo $data_produksi["max_jumlah"] ?>" > kg</td>
                   <td class="text-end"><input class="text-end" type="number" name="prodMin" value="<?php echo $data_produksi["min_jumlah"] ?>" > kg</td>

                 </tr>
                 <tr>
                   <td colspan="3"><hr></td>
                 </tr>

                 <tr>
                   <th>Bulan</th>
                   <td class="text-end"><input type="text" name="bulan" value="<?php echo $bulan ?>" placeholder="Bulan"></td>
                 </tr>

                 <tr>
                   <th>Tahun</th>
                   <td class="text-end"><input type="text" name="tahun" value="<?php echo $tahun ?>" placeholder="Tahun"></td>
                 </tr>

                 <tr>
                   <th><label for="">Permintaan bulan ini</label></th>
                   <td class="text-end"><input class="text-end" type="number" name="mintaSkr"> kg</td>
                 </tr>

                 <tr>
                   <th><label for="">Persediaan bulan ini</label></th>
                   <td class="text-end"><input class="text-end" type="number" name="sediaSkr"> kg</td>
                 </tr>

               </tbody>

             </table>

           <div class="form-row float-start">
             <button type="submit" name="button">Hitung</button>
           </div>
           </form>

         </div>
       </div>
     </div>

     <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript">
   			$(document).ready( function () {
   			$('#table').DataTable({
           "bFilter" : false,
     				pageLength: 10,
     				paging: false,
     				ordering: false,
     				stateSave: false,
            "bInfo" : false
   			});
   		} );
   	</script>
     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" charset="utf-8"></script>
     <script src="js/bootstrap.js" charset="utf-8"></script>
  </body>
</html>
