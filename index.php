<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV. Satria Piningit</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
       <div class="container">
         <a class="navbar-brand mx-auto" href="index.php">CV. Satria Piningit</a>
       </div>
     </nav>

     <div class="container mt-3">
       <div class="row">
         <div class="col">
           <div class="w-100">
             <img class="img-fluid rounded-3" src="img/header1.jpg" alt="" style="max-height: 210px; width: inherit;">
           </div>
           <div class="position-absolute top-50 start-50 translate-middle">
             <div class="card-container rounded-3">
               <?php
                	if(isset($_GET['message'])){
                		if($_GET['message']=="failed"){
                			echo "<div class='alert alert-danger alert-dismissible fade show mb-4 border-0'>Username or Password incorrect!
                              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                		}
                	}
              	?>
               <form action="login_controller.php" method="post">
                 <h3><strong>Login</strong></h3>
                 <p>This is a secure system and you will need to provide
                 your login details to access.
                 </p>

                 <div class="mt-4">
                   <input class="w-100" type="text" name="username" placeholder="username" required>
                   <input class="w-100" type="password" name="password" placeholder="password" required>
                 </div>

                 <div class="d-flex justify-content-end mt-3">
                   <input class="form-btn mb-0" type="submit" name="submit" value="Login" >
                 </div>
               </form>
             </div>
            </div>
         </div>
       </div>
     </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
  </body>
</html>
