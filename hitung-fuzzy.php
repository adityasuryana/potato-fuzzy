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
    <title>Hitung Logika Fuzzy</title>
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

     <div class="container mb-4" >
       <div class="row">

         <div class="col-12">
           <div class="d-flex mt-4">
             <a href="owner.php" class="my-auto text-dark"><i class="fa-solid fa-arrow-left fs-20 me-3"></i></a>
             <h2 class="header-title">Prediksi</h2>
           </div>

           <form class="mb-4" action="process/prediksi/insert_prediksi.php" method="POST" name="tabel">
             <table id="table" class="mt-4">
               <thead>
                 <tr>
                  <th class="">variabel</th>
                  <th class="text-center">Tertinggi</th>
                  <th class="text-center">Terendah</th>
                </tr>
               </thead>

               <tbody>
                   <?php
                      $no = 1;
                      $sedia = mysqli_query($conn, "select MAX(jumlah) as max_jumlah, MIN(jumlah) as min_jumlah from persediaan");
                      $data_sedia = mysqli_fetch_array($sedia)
                    ?>
                  <tr>
                   <th>Persediaan</th>
                   <td class="text-end"><input class="text-end" type="number" name="sediaMax" value="<?php echo $data_sedia["max_jumlah"]; ?>" readonly> kg</td>
                   <td class="text-end"><input class="text-end" type="number" name="sediaMin" value="<?php echo $data_sedia["min_jumlah"]; ?>" readonly> kg</td>
                 </tr>

                   <?php
                      $no = 1;
                      $minta = mysqli_query($conn, "select MAX(jumlah) as max_jumlah, MIN(jumlah) as min_jumlah from permintaan");
                      $data_minta = mysqli_fetch_array($minta)
                    ?>
                  <tr>
                   <th>Permintaan</th>
                   <td class="text-end"><input class="text-end" type="number" name="mintaMax" value="<?php echo $data_minta["max_jumlah"]; ?>" readonly> kg</td>
                   <td class="text-end"><input class="text-end" type="number" name="mintaMin" value="<?php echo $data_minta["min_jumlah"]; ?>" readonly> kg</td>
                 </tr>

                 <tr>
                   <?php
                      $no = 1;
                      $produksi = mysqli_query($conn, "select MAX(jumlah) as max_jumlah, MIN(jumlah) as min_jumlah from produksi");
                      $data_produksi = mysqli_fetch_array($produksi)
                    ?>
                   <th>Produksi</th>
                   <td class="text-end"><input class="text-end" type="number" name="prodMax" value="<?php echo $data_produksi["max_jumlah"]; ?>" readonly> kg</td>
                   <td class="text-end"><input class="text-end" type="number" name="prodMin" value="<?php echo $data_produksi["min_jumlah"]; ?>" readonly> kg</td>
                 </tr>

                 <tr>
                   <td colspan="3"><hr></td>
                 </tr>

                 <tr>
                   <th><label for="">Permintaan semester ini</label></th>
                   <td class="text-end"><input class="text-end" type="number" name="mintaSkr"> kg</td>
                 </tr>

                 <tr>
                   <th><label for="">Persediaan semester ini</label></th>
                   <td class="text-end"><input class="text-end" type="number" name="sediaSkr"> kg</td>
                 </tr>

                 <tr>
                   <td colspan="3"><hr></td>
                 </tr>

                 <tr>
                   <th><label for="">Prediksi semester ini</label></th>
                   <td class="text-end"><input class="text-end" type="number" value="" name="prediksiSkr" readonly> kg</td>
                 </tr>

               </tbody>
             </table>

           <div class="form-row float-start">
             <button class="me-3" type="button" value="send" name="button" onclick="hitung()">Hitung</button>
             <button class="form-btn" type="submit">Simpan</button>
           </div>
           </form>

         </div>
       </div>
     </div>

     <script type="text/javascript" src="js/jquery.js"></script>
     <script>
       function hitung() {
         var sediaMax = (document.tabel.sediaMax.value);
         var sediaMin = (document.tabel.sediaMin.value);
         var mintaMax = (document.tabel.mintaMax.value);
         var mintaMin = (document.tabel.mintaMin.value);
         var prodMax = parseInt(document.tabel.prodMax.value);
         var prodMin = parseInt(document.tabel.prodMin.value);
         var mintaSkr = (document.tabel.mintaSkr.value);
         var sediaSkr = (document.tabel.sediaSkr.value);

         var permintaanTurun = Math.round((mintaMax - mintaSkr) / (mintaMax - mintaMin));
         var permintaanNaik = Math.round((mintaSkr - mintaMin) / (mintaMax - mintaMin));
         var persediaanSedikit = Math.round((sediaMax - sediaSkr) / (sediaMax - sediaMin));
         var persediaanBanyak = Math.round((mintaSkr - sediaMin) / (sediaMax - sediaMin));

         var pred1 = Math.min(permintaanTurun, persediaanBanyak);
         var z1 = Math.round(prodMax - pred1 * (prodMax - prodMin));

         var pred2 = Math.min(permintaanTurun, persediaanSedikit);
         var z2 = Math.round(prodMax - pred2 * (prodMax - prodMin));

         var pred3 = Math.min(permintaanNaik, persediaanBanyak);
         var z3 = Math.round(pred3 * (prodMax - prodMin)) + prodMin;

         var pred4 = Math.min(permintaanNaik, persediaanSedikit);
         var z4 = Math.round(pred4 * (prodMax - prodMin) + prodMin);

         var n = Math.round((pred1 * z1) + (pred2 * z2) + (pred3 * z3) + (pred4 * z4));
         var d = Math.round(pred1 + pred2 + pred3 + pred4);

         var zhasil = Math.round(n/d);

         document.tabel.prediksiSkr.value = zhasil;
       }
     </script>
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
