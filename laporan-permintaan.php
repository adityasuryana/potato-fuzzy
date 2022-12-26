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
    <title>Laporan Data Permintaan</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    <?php
  		require_once('connection.php');
  		$sql = "SELECT * FROM permintaan";
  		$result = mysqli_query($conn, $sql);
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

     <div class="container">
       <div class="row">
         <div class="col-12">
           <div class="d-flex">
             <a href="laporan.php" class="my-auto text-dark"><i class="fa-solid fa-arrow-left fs-20 me-3"></i></a>
             <h2 class="header-title mt-4 mb-4">Laporan Data Permintaan</h2>
           </div>

           <div class="table-data">
     				<div class="order">
     					<table id="table" class="w-100">
     						<thead>
     							<tr>
     								<th>Semester</th>
                    <th>Tahun</th>
     								<th>Nama Pemesan</th>
                    <th>Ukuran</th>
                    <th>Quantity</th>
                    <th></th>
     							</tr>
     						</thead>
     						<tbody>
                  <?php while($permintaan = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td><?php echo $permintaan['semester']; ?></td>
                      <td><?php echo $permintaan['tahun']; ?></td>
    									<td><?php echo $permintaan['nama_pemesan']; ?></td>
    									<td><?php echo $permintaan['produk']; ?></td>
    									<td><?php echo $permintaan['jumlah']; ?> kg</td>
                      <td class="text-center">
    										<a class="btn btn-edit me-2" data-bs-toggle="modal" data-bs-target="#editPermintaan<?php echo $permintaan['id'];?>"><i class="fa-solid fa-edit"></i></a>
    										<a class="btn btn-danger" href="process/permintaan/delete_permintaan.php?id=<?php echo $permintaan['id']; ?>"><i class="fa-solid fa-trash"></i></a>
    									</td>
    								</tr>

                    <div class="modal fade" id="editPermintaan<?php echo $permintaan['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border: none; border-radius: 20px;">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Persediaan</h5>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="process/permintaan/update_permintaan.php">
                              <div class="">
                                <input type="hidden" value="<?php echo $permintaan['id']; ?>" name="id">
                              </div>
                              <div class="mb-3">
                                <label for="semester" class="form-label">Semester</label>
                                <select class="w-100" name="semester">
                                  <option value="<?php echo $permintaan['semester']; ?>"><?php echo $permintaan['semester']; ?></option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun</label>
                                <input type="text" name="tahun" class="form-control" id="tahun" value="<?php echo $permintaan['tahun']; ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                                <input type="text" name="nama_pemesan" class="form-control" id="nama_pemesan" value="<?php echo $permintaan['nama_pemesan']; ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="barang">Barang</label>
                                <select class="w-100" name="produk">
                                  <option value="<?php echo $permintaan['produk']; ?>"><?php echo $permintaan['produk']; ?></option>
                                  <option value="besar">Besar</option>
                                  <option value="kecil">Kecil</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="jumlah" class="form-label">Quantity</label>
                                <input type="text" name="jumlah" class="form-control" id="jumlah" value="<?php echo $permintaan['jumlah']; ?>" required>
                              </div>
                              <button type="button" class="btn text-danger" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" id="submit" class="btn btn-dark float-end">Edit</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
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
          scrollX: true,
          "bFilter" : false,
          dom: 'Bfrtip',
          buttons: [
                {
                extend: 'print',
                text: 'Print',
                exportOptions: {
                    columns: ':visible',
                },
                customize: function (win) {
                    $(win.document.body).find('td:last-child').addClass('display-none').css('display', 'none');

                }
            }
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
