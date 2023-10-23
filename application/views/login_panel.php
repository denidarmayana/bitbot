<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="img/png" href="<?=base_url('assets/icon.png') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
  <style>
    .fa-brands {
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="container mt-3">
  <div class="row justify-content-evenly mt-5">
    <div class="col-md-5 col-11">
        <div class="card" id="signin">
            <div class="card-body">
                <img src="<?=base_url('assets/logo_white.png') ?>" class="mb-3">
                <h3 class="float-end">Login</h3>
                <p class="mb-4">Please Input Username and Password</p>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="username" placeholder="name@example.com">
                  <label for="email">Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="password" placeholder="Password">
                  <label for="password">Password</label>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    <button class="btn btn-primary btn-sm w-100" id="login" onclick="login()">Login</button>
                    <button class="btn btn-primary btn-sm w-100" id="loading" type="button" disabled>
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Loading...
                    </button>
                  </div>
                  <div class="col-8">
                    <div class="form-check float-end">
                      <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" >
                      <label class="form-check-label" for="disabledFieldsetCheck">
                        Remember me
                      </label>
                    </div>
                  </div>
                  
                </div>
                <div class="row mb-3">
                  <div class="col-6">
                    <h4>Sign In With</h4>
                  </div>
                  <div class="col-6">
                    <div class="float-end">
                      <i class="fa-brands fa-square-facebook fa-2x text-primary"></i>&nbsp; <i class="fa-brands fa-square-twitter fa-2x text-info"></i>&nbsp; <i class="fa-brands fa-square-google-plus fa-2x text-danger"></i>
                    </div>
                  </div>
                </div>
                
            </div>
        </div>
       
        <div class="row mt-3 justify-content-evenly">
          <div class="col-12">
            <p class="text-center m-0">Copyright &copy; <?=date("Y") ?> All rights reserved.</p>
            <p class="text-center m-0">Crypto Trading Bot</p>
          </div>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#loading").hide()
  function login() {
    var email = $("#username").val()
    var password = $("#password").val()
    if (email == "") {
      toastr.error("Username can't be empty")
    }else if (password == "") {
      toastr.error("Password can't be empty")
    }else{
      $("#login").hide()
        $("#loading").show()
        var settings = {
        "url": "./login/action",
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        "data": {
          "username": email,
          "password": password
        }
      };

      $.ajax(settings).done(function (response) {
        $("#loading").hide()
        $("#login").show()
        $("#email").val("")
        $("#password").val("")
        if (response.code == 200) {
          toastr.success(response.message)
          setTimeout(function() {
            window.location.href="./panel"
          },1500)
        }else{
          toastr.error(response.message)
        }
      });
    }
  }
 
</script>
</body>
</html>
