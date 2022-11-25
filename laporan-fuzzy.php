<?php
session_start();
if($_SESSION['status']!="loggedin"){
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Fuzzy</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    <?php
  		require_once('connection.php');
  		$sql = "SELECT * FROM laporanPrediksi";
  		$result = mysqli_query($conn, $sql);
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
           <div class="d-flex">
             <a href="laporan.php" class="my-auto text-dark"><i class="fa-solid fa-arrow-left fs-20 me-3"></i></a>
             <h2 class="header-title mt-4 mb-4">Laporan Fuzzy</h2>
           </div>
           <div class="table-data">
     				<div class="order">
     					<table id="table">
     						<thead>
     							<tr>
     								<th>Bulan</th>
                    <th>Tahun</th>
     								<th>Prediksi</th>
     							</tr>
     						</thead>
     						<tbody>
                  <?php while($data = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td><?php echo $data['bulan']; ?></td>
    									<td><?php echo $data['tahun']; ?></td>
    									<td><?php echo $data['prediksi']; ?></td>
    								</tr>
                    <?php } ?>
     						</tbody>
     					</table>
     				</div>
     			</div>
         </div>
       </div>
     </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
  			$(document).ready( function () {
  			$('#table').DataTable({
          "bFilter" : false,
          dom: 'Bfrtip',
          buttons: [
            'print'
          ],
  				pageLength: 10,
  				lengthMenu: [[5, 10, 20, -1], [5, 10, 15, 'All']],
  				paging: true,
  				ordering: true,
  				stateSave: true,
  				language: {
  					"lengthMenu": "Show _MENU_" }
  			});
  		} );
  	</script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js" charset="utf-8"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
  </body>
</html>

<!--
Developed by Aditya Suryana
github.com/adityasuryana
2022
-->
