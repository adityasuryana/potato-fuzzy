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
    <title>User</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    <?php
  		require_once('connection.php');
  		$sql = "SELECT * FROM user";
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
             <a href="admin.php" class="my-auto text-dark"><i class="fa-solid fa-arrow-left fs-20 me-3"></i></a>
             <h2 class="header-title mt-4 mb-4">User</h2>
           </div>

           <button type="button" class="btn btn-dark mt-1 mb-3" data-bs-toggle="modal" data-bs-target="#addUser">
   				  <span><i class='fa-solid fa-plus me-2' ></i></span>Tambah User
   				</button>

          <div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  				  <div class="modal-dialog modal-dialog-centered">
  				    <div class="modal-content" style="border: none; border-radius: 20px;">
  				      <div class="modal-header">
  				        <h5 class="modal-title">User Baru</h5>
  				      </div>
  				      <div class="modal-body">
  								<form id="accountForm" method="POST" action="process/user/insert_user.php">
  									<div class="">
  										<input type="text" name="id" hidden>
  									</div>
  									<div class="mb-3">
  								    <label for="name" class="form-label">Nama</label>
  								    <input type="text" name="name" class="form-control" id="name" required>
  								  </div>
  								  <div class="mb-3">
  								    <label for="username" class="form-label">Username</label>
  								    <input type="text" name="username" class="form-control" id="email" required>
  								  </div>
                    <div class="mb-3">
                      <label for="">Level</label>
                      <select class="w-100" name="level">
                        <option value="">Pilih Level</option>
                        <option value="admin">Admin</option>
                        <option value="owner">Owner</option>
                      </select>
                    </div>
  								  <div class="mb-3">
  								    <label for="password" class="form-label">Password</label>
  								    <input type="password" name="password" class="form-control" id="password" required>
  								  </div>
  									<button type="button" class="btn text-danger" data-bs-dismiss="modal">Batal</button>
  								  <button type="submit" id="submit" class="btn btn-dark float-end">Tambah</button>
  								</form>
  				      </div>
  				    </div>
  				  </div>
  				</div>

           <div class="table-data">
     				<div class="order">
     					<table id="table" class="w-100">
     						<thead>
     							<tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Level</th>
     								<th>Password</th>
                    <th></th>
     							</tr>
     						</thead>
     						<tbody>
                  <?php while($user = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td><?php echo $user['name']; ?></td>
                      <td><?php echo $user['username']; ?></td>
    									<td><?php echo $user['level']; ?></td>
                      <td><?php echo $user['password']; ?></td>
                      <td class="text-center">
    										<a class="btn btn-edit me-2" data-bs-toggle="modal" data-bs-target="#editUser<?php echo $user['id'];?>"><i class="fa-solid fa-edit"></i></a>
    										<a class="btn btn-danger" href="process/user/delete_user.php?id=<?php echo $user['id']; ?>"><i class="fa-solid fa-trash"></i></a>
    									</td>
    								</tr>
     						</tbody>

                <div class="modal fade" id="editUser<?php echo $user['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border: none; border-radius: 20px;">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="process/user/update_user.php">
                          <div class="">
                            <input type="hidden" value="<?php echo $user['id']; ?>" name="id">
                          </div>
                          <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?php echo $user['name']; ?>" required>
                          </div>
                          <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="email" value="<?php echo $user['username']; ?>" required>
                          </div>
                          <div class="mb-3">
                            <label for="">Level</label>
                            <select class="w-100" name="level">
                              <option value="<?php echo $user['level']; ?>"><?php echo $user['level']; ?></option>
                              <option value="admin">Admin</option>
                              <option value="owner">Owner</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" value="<?php echo $user['password']; ?>" required>
                          </div>
                          <button type="button" class="btn text-danger" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" id="submit" class="btn btn-dark float-end">Edit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <?php } ?>
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
    <script src="js/bootstrap.js" charset="utf-8"></script>
  </body>
</html>
