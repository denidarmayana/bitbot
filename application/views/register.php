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
        
        <div class="card" >
            <div class="card-body">
                <img src="<?=base_url('assets/logo_white.png') ?>" class="mb-3">
                <h3 class="float-end">Register</h3>
                <p class="mb-4">Please Input Personal Data</p>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="username_reg" placeholder="Username">
                  <label for="email">Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="email_reg" placeholder="name@example.com">
                  <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="password_reg" placeholder="Password">
                  <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="uppline_reg" disabled value="<?=$this->uri->segment(2) ?>">
                  <label for="password">Upline</label>
                </div>
                <div class="row mb-3">
                  <div class="col-4">
                    <button class="btn btn-success btn-sm w-100" id="btn_daftar" onclick="daftar()">SignUp</button>
                    <button class="btn btn-success btn-sm w-100" id="loading_register" type="button" disabled>
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Loading...
                    </button>
                  </div>
                  <div class="col-8">
                    <div class="form-check float-end">
                      <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" >
                      <label class="form-check-label" for="disabledFieldsetCheck">
                        Term and Condition
                      </label>
                    </div>
                  </div>
                  
                </div>
                <div class="row mb-3">
                  <div class="col-6">
                    <h4>Sign Up With</h4>
                  </div>
                  <div class="col-6">
                    <div class="float-end">
                      <i class="fa-brands fa-square-facebook fa-2x text-primary"></i>&nbsp; <i class="fa-brands fa-square-twitter fa-2x text-info"></i>&nbsp; <i class="fa-brands fa-square-google-plus fa-2x text-danger"></i>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-12">
                    <a href="<?=base_url('/auth') ?>" class="btn btn-primary w-100" >Sign In Account</a>
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
  $("#signup").hide()
  $("#loading_register").hide()
  function validateEmail(email) {
    const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return regex.test(email);
  }
  
  function daftar() {
    var email = $("#email_reg").val()
    var username = $("#username_reg").val()
    var password = $("#password_reg").val()
    var upline = $("#uppline_reg").val()
    if (username == "") {
      toastr.error("Username can't be empty")
    }else if (email == "") {
      toastr.error("Email can't be empty")
    }else if (password == "") {
      toastr.error("Password can't be empty")
    }else{
      if (validateEmail(email)) {
        $("#btn_daftar").hide()
        $("#loading_register").show()
        var settings = {
          "url": "../register/action",
          "method": "POST",
          "timeout": 0,
          "headers": {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          "data": {
            "username": username,
            "email": email,
            "password": password,
            "upline":upline
          }
        };

        $.ajax(settings).done(function (response) {
          $("#btn_daftar").show()
          $("#loading_register").hide()
          $("#username_reg").val("")
          $("#email_reg").val("")
          $("#password_reg").val("")
          if (response.code == 200) {
            toastr.success(response.message)
            setTimeout(function() {
              window.location.href="../"
            },1500)
          }else{
            toastr.error(response.message)
          }
        })
      }else{
        toastr.error("Email not valid")
      }
    }
  }
</script>
</body>
</html>
