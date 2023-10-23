<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="img/png" href="<?=base_url('assets/icon.png') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bignumber.js@9"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
  <style>
    .fa-brands {
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="container mt-3">
  <div class="row justify-content-evenly mt-4 mb-5">
    <div class="col-md-10 col-12">
        <div class="card">
            <div class="card-body">
              <a href="<?=base_url('auth/logout') ?>" class="btn btn-danger btn-sm float-end"><i class="fa-solid fa-right-from-bracket"></i></a>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Members</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Withdrawal</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="wallet-tab" data-bs-toggle="tab" data-bs-target="#wallet" type="button" role="tab" aria-controls="wallet" aria-selected="false">Wallet</button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active p-3 table-responsive" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table id="data-members" class="table table-bordered table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Username</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=0; foreach($members as $key){ $no++;
                        echo "<tr><td>".$no."</td><td>".$key->username."</td><td>".$key->email."</td></tr>";
                      } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade p-3 table-responsive" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                     <table id="data-wd" class="table table-bordered table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Username</th>
                          <th>Wallet</th>
                          <th>Amount</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      if (isset($_GET['approve'])) {
                         $this->db->update("withdrawal",['status'=>1],['id'=>$_GET['approve']]);
                         header("Refresh: 2; url=./panel");
                      }
                      if (isset($_GET['reject'])) {
                         $this->db->delete("withdrawal",['id'=>$_GET['reject']]);
                         header("Refresh: 2; url=./panel");
                      }
                      $no=0; 
                      foreach($wd as $keys){ $no++;
                        if ($keys->status == 0) {
                          $btn = '<a href="?approve='.$keys->id.'" class="btn btn-sm btn-success mb-2">Approve</a> <a href="?reject='.$keys->id.'" class="btn btn-sm btn-danger">Reject</a>';
                        }else{
                          $btn = "";
                        }
                        echo "<tr><td>".$no."</td><td>".$keys->members."</td><td>".$keys->address."</td><td>".number_format($keys->amount,8,',','.')."</td><td>".($keys->status == 0 ? "Pending" : "Success")."</td><td>".$btn."</td></tr>";
                      } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade p-3 table-responsive" id="wallet" role="tabpanel" aria-labelledby="wallet-tab">
                    <div class="row mb-3">
                      <div class="col-12">
                        <select class="form-control" id="members"></select>  
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12">
                        <input type="number" class="form-control" placeholder="0" id="amount">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12">
                        <button class="btn btn-primary w-100" id="add-balance">Add Balance</button>
                      </div>
                    </div>
                    <hr class="mb-3" style="background:white;"> 
                     <table id="data-wallet" class="table table-bordered table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Username</th>
                          <th>coin</th>
                          <th>Address</th>
                          <th>Balance</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $no=0; 
                      foreach($depo as $d){ $no++;
                        echo "<tr><td>".$no."</td><td>".$d->members."</td><td>".$d->coin."</td><td>".$d->address."</td><td>".$d->balance."</td></tr>";
                      } ?>
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
        
        
    </div>
  </div>
</div>
<script type="text/javascript">
  new DataTable('#data-members', {
    paging:   false,
    ordering: true,
  });
  new DataTable('#data-wd', {
    paging:   false,
    ordering: true,
  });
  new DataTable('#data-wallet', {
    paging:   false,
    ordering: true,
  });
  $("#members").load("<?=base_url('panel/show') ?>")
  $("#add-balance").click(()=>{
    var username = $("#members").val();
    var balance = $("#amount").val();
    if (balance == "") {
      toastr.error("balance can't be empty")
    }else{
      var settings = {
        "url": "./panel/update",
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        "data": {
          "username": username,
          "balance": balance
        }
      };
      $.ajax(settings).done(function (response) {
        $("#members").val("")
        $("#amount").val("")
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
  })
</script>
</body>
</html>