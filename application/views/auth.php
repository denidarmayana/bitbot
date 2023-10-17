<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center py-4">
          <a href="<?=base_url() ?>" class="logo d-flex align-items-center w-auto">
            <img src="<?=base_url('html/') ?>assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">BitBot</span>
          </a>
        </div><!-- End Logo -->

        <div class="card mb-3">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
              <p class="text-center small">Enter your username & password to login</p>
            </div>

              <div class="col-12 mb-3">
                <label for="yourUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                  <input type="text" name="username" class="form-control" id="username" >
                </div>
              </div>

              <div class="col-12 mb-3">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" >
              </div>

              <div class="col-12 mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" value="true" id="remember">
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100" id="login">Login</button>
                <button class="btn btn-primary w-100" type="button" disabled id="loading">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
                </button>
              </div>
              <div class="col-12">
                <p class="small mb-0">Don't have account? <a href="<?=base_url('register') ?>">Create an account</a></p>
              </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $("#loading").hide()
  $("#login").click(function() {
    
    var username = $("#username").val();
    var password = $("#password").val();
    if (username == "") {
      toastr.error("Username can't be empty")
    }else if (password == "") {
      toastr.error("Password can't be empty")
    }else{
      $("#loading").show()
      $("#login").hide()
      var settings = {
        "url": "./auth/login",
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        "data": {
          "username": username,
          "email": email,
          "password": password,
          "upline": upline
        }
      };

      $.ajax(settings).done(function (response) {
        $("#loading").hide()
        $("#login").show()
        if (response.code == 200) {
          toastr.success(response.message)
          setTimeout(function() {
            window.location.href="./"
          },1500)
        }else{
          toastr.error(response.message)
        }
      });
    }
  })
</script>