
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?=$title ?> - BitBot Crypto Trading Engine</title>
  <meta content="BitBot Crypto Trading Engine" name="description">
  <meta content="BitBot Crypto Trading Engine" name="keywords">

  <!-- Favicons -->
  <link href="<?=base_url('html/') ?>assets/img/favicon.png" rel="icon">
  <link href="<?=base_url('html/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url('html/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url('html/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url('html/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url('html/') ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?=base_url('html/') ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?=base_url('html/') ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=base_url('html/') ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?=base_url('html/') ?>assets/css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
  <style type="text/css">
    #copy{
      cursor: pointer;
    }
    #copy_address{
      cursor: pointer;
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?=base_url() ?>" class="logo d-flex align-items-center">
        <img src="<?=base_url('html/') ?>assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">BitBot</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?=base_url('html/') ?>assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$this->session->userdata('username') ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$this->session->userdata('username') ?></h6>
              <span>Members BitBot</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url('profile') ?>">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url('auth/logout') ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?=($menu == "home" ? "":"collapsed") ?>" href="<?=base_url() ?>">
          <i class="bi bi-stack"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link <?=($menu == "wallet" ? "":"collapsed") ?>" href="<?=base_url('wallet') ?>">
          <i class="bi bi-wallet2"></i>
          <span>My Wallet</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <?=$contents ?>

  </main><!-- End #main -->
  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="<?=base_url('html/') ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?=base_url('html/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url('html/') ?>assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?=base_url('html/') ?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?=base_url('html/') ?>assets/vendor/quill/quill.min.js"></script>
  <script src="<?=base_url('html/') ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?=base_url('html/') ?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?=base_url('html/') ?>assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
  <!-- Template Main JS File -->
  <script src="<?=base_url('html/') ?>assets/js/main.js"></script>
  <script type="text/javascript">
    var socket_token = "<?php echo $this->session->userdata('socket'); ?>";
    var token = "<?php echo $this->session->userdata('token'); ?>";
    const socket = new WebSocket('wss://galaxy7.tech:3000');
    socket.addEventListener('open', (event) => {
        console.log('Koneksi terbuka.');
        // Mengirim pesan ke server   
    });
    const message = {
        method: 'initialization',
        socket_token: socket_token,
    };
    setTimeout(function() {
      socket.send(JSON.stringify(message));
    },1000)

    socket.addEventListener('message', (event) => {
          var json = JSON.parse(event.data);
          console.log(event.data)
          if(json.action == "update_balance"){
            $("#balance").val(json.user_balance)
            var settings = {
              "url": "./wallet/save",
              "method": "POST",
              "timeout": 0,
              "headers": {
                "Content-Type": "application/x-www-form-urlencoded",
              },
              "data": {
                "token":token,
                "address": $("#address").val(),
                "coin": $("#coin").val(),
                "balance": json.user_balance,
              }
            };

            $.ajax(settings).done(function (response) {
              
            });
          }
    });
    socket.addEventListener('close', (event) => {
        if (event.wasClean) {
            console.log(`Koneksi ditutup dengan kode: ${event.code} dan alasan: ${event.reason}`);
        } else {
            window.location.href="./auth/logout";
            console.error('Koneksi terputus secara tiba-tiba');
        }
    });

    // Menangani peristiwa saat terjadi kesalahan
    socket.addEventListener('error', (event) => {
        console.error('Terjadi kesalahan:', event);
    });
    $("#coin").change(function() {
  var item = $(this).val()
  if (item == "MBIT") {
    $("#address").val("0x8CFcecf2B70a4Cb6FB955775380E714580Cfd749")
    $("#qr").attr("src","https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=0x8CFcecf2B70a4Cb6FB955775380E714580Cfd749")
    var settings = {
      "url": "./wallet/save",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      "data": {
        "address": "0x8CFcecf2B70a4Cb6FB955775380E714580Cfd749",
        "coin": "MBIT",
        "balance": "0.00000000",
      }
    };

    $.ajax(settings).done(function (response) {
      
    });
  }else{
    const message = {
        method: 'get_balance',
        coin: item
    };
    setTimeout(function() {
      socket.send(JSON.stringify(message));
    },1000)
    var settings = {
        "url": "./wallet/address",
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        "data": {
          "token": token,
          "coin": item
        }
      };

      $.ajax(settings).done(function (response) {
        $("#address").val(response.address)
        $("#qr").attr("src",response.qr)
      });
  }
  
})
  </script>
  <script src="<?=base_url('html/') ?>assets/js/home.js?=<?=time() ?>"></script>
  

</body>

</html>