<?php

  session_start();
  if(isset($_SESSION['username'])){
    header('location:admin-dashboard.php');
    exit();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link class="img-rounded" rel="icon" type="image/png" href="assets/img/LI_LOGO.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha512-znmTf4HNoF9U6mfB6KlhAShbRvbt4CvCaHoNV0gyssfToNQ/9A0eNdUbvsSwOIUoJdMjFG2ndSvr0Lo3ZpsTqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SRMS ADMIN</title>
</head>
<body>

    <div  class="container d-flex justify-content-center align-items-center rounded" style="min-height: 100vh;">
        <form autocomplete="off"
              class="border shadow p-3 rounded"
              style="width: 450px;"
              id="admin-login-form"
              method = "post">
            <div class = "mb-3">
                <div class= "text-center bg-success rounded"  style = "color:gold;">
                    Lian Institute <br> Student Records Management System <br>
                </div>
            <center> 
                <!-- <img src="img/LI_LOGO.jpg" height="100" class="rounded-circle" alt="LI Logo" style = "margin-top: 5px;">  -->
                <h1> <i class="fas fa-user-cog"></i> </h1> 
            </center>
            <div id="adminLoginAlert"> </div>
            <h1 class="text-center">ADMIN LOG-IN</h1>
            <div class="form-group mb-3">
              <input type="text" name="username" class="form-control" id="username" placeholder="Username" required autofocus>
            </div>
            <div class="form-group mb-3">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            
            <center>
            <div class="form-group mb-3">
              <input type="submit" name="admin-login" class="btn btn-success btn-lg rounded-5" id="adminLoginBtn" value="LOGIN" >
            </div>
             </center>
        </form>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha512-c4wThPPCMmu4xsVufJHokogA9X4ka58cy9cEYf5t147wSw0Zo43fwdTy/IC0k1oLxXcUlPvWZMnD8be61swW7g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha512-c4wThPPCMmu4xsVufJHokogA9X4ka58cy9cEYf5t147wSw0Zo43fwdTy/IC0k1oLxXcUlPvWZMnD8be61swW7g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha512-xd+EFQjacRjTkapQNqqRNk8M/7kaek9rFqYMsbpEhTLdzq/3mgXXRXaz1u5rnYFH5mQ9cEZQjGFHFdrJX2CilA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#adminLoginBtn").click(function(e){
          if($("#admin-login-form")[0].checkValidity()) {
            e.preventDefault();
            $(this).val("Please Wait...");
            $.ajax({
              url: 'assets/php/admin-action.php',
              method: 'post',
              data: $('#admin-login-form').serialize()+'&action=adminLogin',
              success:function(response){
                if(response === 'admin_login'){
                  window.location = 'admin-dashboard.php';
                }
                else{
                  $("#adminLoginAlert").html(response);
                }
                $(adminLoginBtn).val('Login');
              }
            });
          }
        });
      });
     </script>

  </body>
</html>