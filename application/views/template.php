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
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bignumber.js@9"></script>
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
              <div class="row mb-3">
                <div class="col-12">
                  
                  <input type="text" value="<?=base_url('reff/'.$this->session->userdata("username")) ?>" class="form-control" disabled>
                </div>
              </div>
              <a href="<?=base_url('auth/logout') ?>" class="btn btn-danger btn-sm float-end"><i class="fa-solid fa-right-from-bracket"></i></a>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Trading</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">My Wallet</button>
                  </li>
                  
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="mb-2 row text-center mt-2">
                      <div class="col-sm-6 col-6">
                        <label class="text-center small">Coin Trade</label>
                        <select class="form-control-sm w-100" id="coin">
                            <option value="0">Select Coin Type</option>
                            <option value="MBIT">MBIT</option>
                            <option value="ETH">ETH</option>
                            <option value="DOGE">DOGE</option>
                            <option value="TRX">TRX</option>
                            <option value="USDT">USDT</option>
                            <option value="BTT">BTT</option>
                            <option value="BNB">BNB</option>
                        </select>
                      </div>
                      <div class="col-sm-6 col-6">
                          <label class="text-center small">Base Trade</label>
                      <input type="text" class="form-control-sm w-100" id="base_trade" value="0.00000100">
                      </div>
                    </div>
                    <div class="row mb-2 text-center">
                      <div class="col-sm-12 col-12">
                        <label class="text-center small">Chance</label>
                        <table width="100%">
                          <tr>
                            <td>
                              <input type="text" class="form-control-sm w-100" id="chance_min" value="35">
                            </td>
                            <td>&nbsp;&nbsp;-&nbsp;&nbsp;</td>
                            <td>
                              <input type="text" class="form-control-sm w-100" id="chance_max" value="45">
                            </td>
                          </tr>
                        </table>
                        
                      </div>
                    </div>
                    <div class="mb-2 row text-center">
                    <div class="col-sm-6 col-6">
                      <label class="text-success small">Marti Win</label>
                      <table width="100%">
                        <tr>
                          <td><input type="text" class="form-control-sm w-100" id="marti_win" value="100"></td>
                          <td>&nbsp;&nbsp;%</td>
                        </tr>

                      </table>
                    </div>
                    <div class="col-sm-6 col-6">
                      <label class="text-danger small">Marti Los</label>
                      <table width="100%">
                        <tr>
                          <td><input type="text" class="form-control-sm w-100" id="marti_los" value="100"></td>
                          <td>&nbsp;&nbsp;%</td>
                        </tr>

                      </table>
                    </div>
                  </div>
                  <div class="mb-2 row text-center">
                    <div class="col-sm-6 col-6">
                      <label class="text-success small">If Win</label>
                      <table width="100%">
                        <tr>
                          <td><input type="text" class="form-control-sm w-100" id="win_reset" value="1"></td>
                          <td class="small">&nbsp;&nbsp;Reset</td>
                        </tr>

                      </table>
                    </div>
                      <div class="col-sm-6 col-6">
                          <label class="text-danger small">If Los</label>
                          <table width="100%">
                            <tr>
                              <td><input type="text" class="form-control-sm w-100" id="los_reset" value="0"></td>
                              <td class="small">&nbsp;&nbsp;Reset</td>
                            </tr>

                          </table>
                        </div>
                      </div>
                    <div class="mb-3 row text-center">
                        <div class="col-sm-6 col-6">
                          <label class="text-center small">Shot</label>
                            <input type="text" class="form-control-sm w-100" id="val_shot" value="1.00000000">
                        </div>
                        <div class="col-sm-6 col-6">
                          <label class="text-center small">Boom</label>
                            <input type="text" class="form-control-sm w-100" id="val_boom" value="10.00000000">
                        </div>
                    </div>
                    <div class="mb-3 row text-center">
                      <div class="col-sm-4 col-4">
                        <button class="btn btn-primary btn-sm w-100" id="start" onclick="startTrade()">START</button>
                        <button class="btn btn-danger btn-sm w-100" id="stop" onclick="stopTrade()">STOP</button>
                      </div>
                      <div class="col-sm-4 col-4">
                        <button class="btn btn-success btn-sm w-100" id="shot" onclick="shot()">SHOT</button>
                      </div>
                      <div class="col-sm-4 col-4">
                        <button class="btn btn-warning btn-sm w-100" id="boom" onclick="boom()">BOOM</button>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-12">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th class="bg-info text-white text-center small">BALANCE </th>
                              <th class="bg-danger text-white text-center small">LOS</th>
                              <th class="bg-success text-white text-center small">WIN</th>
                              <th class="bg-dark text-white text-center small">PROFIT</th>
                            </tr> 
                          </thead>
                          <tbody>
                            <tr>
                              <td id="balance" class="text-info text-center small">0.00000000</td>
                              <td id="los" class="text-danger text-center small">0</td>
                              <td id="win" class="text-success text-center small">0</td>
                              <td id="profit_global" class="text-center small">0.00000000</td>
                            </tr>
                          </tbody>
                        </table>  
                      </div>
                    </div>
                    <div style="height:250px;overflow: scroll;">
                      <table class="table table-bordered" id="tradeTable">
                        <thead>
                          <tr class="bg-success">
                            <th class="small">TYPE</th>
                            <th class="small">BASE</th>
                            <th class="small">PROFIT</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="mb-3 row">
                        <div class="col-sm-12 col-12">
                          <label class="text-center text-warning mt-3">Bonus Referral</label>
                            <table width="100%" cellpadding="5">
                              <tr>
                                  <td width="80%"><input type="text" class="form-control text-warning" id="rebeat" disabled></td>
                                  <td><button class="btn btn-warning w-100">CLAIM</button></td>
                              </tr>
                            </table>
                        </div>
                    </div>
                    <div class="mb-3 row text-center mt-2">
                      <div class="col-sm-12 col-12">
                        <select class="form-control" id="wallet_coin">
                            <option value="0">Select Coin Type</option>
                            <option value="MBIT">MBIT</option>
                            <option value="ETH">ETH</option>
                            <option value="DOGE">DOGE</option>
                            <option value="TRX">TRX</option>
                            <option value="USDT">USDT</option>
                            <option value="BTT">BTT</option>
                            <option value="BNB">BNB</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-12 col-12">
                          <label class="text-center">Wallet Address</label>
                            <input type="text" class="form-control" id="address_wallet" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-12 col-12">
                          <label class="text-center">Balance</label>
                            <input type="text" class="form-control" id="balance_wallet" value="0.00000000" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-12 col-12">
                          <label class="text-center">Minimum Deposit</label>
                            <input type="text" class="form-control" id="min_depo_wallet" value="0.00000000" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row text-center">
                        <div class="col-sm-12 col-12">
                          <label class="text-center">QRCode Wallet Address</label>
                            <center>
                              <img class="img-responsive img-thumbnail" id="wallet_qr">
                            </center>
                        </div>
                    </div>
                    <hr style="background: white;">
                    <h3 class="card-title">withdrawal</h3>
                    <div class="mb-3 row">
                        <div class="col-sm-12 col-12">
                          <label class="text-center">Wallet Address</label>
                            <input type="text" class="form-control" id="wd_wallet" >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-12 col-12">
                          <label class="text-center">Ammount</label>
                            <input type="text" class="form-control" id="wd_amount" placeholder="0.00000000">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-12 col-12">
                          <button class="btn btn-info w-100" id="submit_wd">Submit</button>
                          <button class="btn btn-info btn-sm w-100" id="loading_wd" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                          </button>
                        </div>
                    </div>
                  </div>
                    
                </div>
            </div>
        </div>
        
        
    </div>
  </div>
</div>
<script type="text/javascript">
 
  $("#loading_wd").hide();
  $("#submit_wd").click(()=>{
    var wallet = $("#wd_wallet").val()
    var amount = $("#wd_amount").val()
    var coin = $("#wallet_coin").val()
    if (wallet == "") {
      toastr.error("Wallet Address can't be empty")
    }else if (amount == "") {
      toastr.error("Amount can't be empty")
    }else{
      var settings = {
        "url": "./wallet/penarikan",
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        "data": {
          "coin": coin,
          "address":wallet,
          "balance":amount
        }
      };
      $.ajax(settings).done(function (response) {
        if (response.code == 200) {
          toastr.success(response.message)
          setTimeout(function() {
            window.location.href="./"
          },1500)
        }else{
          toastr.error(response.message)
        }
      })
    }
  })
  $("#wallet_coin").change(()=>{
    var coin = $("#wallet_coin").val()
    var settings = {
      "url": "./wallet/address",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      "data": {
        "coin": coin,
      }
    };
    $.ajax(settings).done(function (response) {
      console.log(response)
      $("#address_wallet").val(response.address)
      $("#balance_wallet").val(response.balance)
      $("#min_depo_wallet").val(response.minimun)
      $("#wallet_qr").attr("src",response.qr)
      $("#rebeat").val(response.bonus)
     
    })
  })
  $("#stop").hide();
  let trading = true
  let coin = "";
  let base_trade;
  let chance_min
  let chance_max
  var marti_win = $("#marti_win").val()
  var marti_los = $("#marti_los").val()
  let reset_win
  let reset_los
  let val_shot
  let val_boom
  let newval
  function getChance(min,max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
  }

 
  let los = 0;
  let win = 0;
  var lastWin = 0;
  var lastLos = 0;
  var profit_global = 0;
  let balance;
  $("#coin").change(()=>{
    coin = $("#coin").val();
    var settings = {
      "url": "./home/getcoin",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      "data": {
        "coin": coin,
      }
    };
    $.ajax(settings).done(function (response) {
      balance = response.data.balance
      $("#balance").html(response.data.balance)
    })
  })
  function startTrade() {
    if (coin == "") {
      toastr.error("Please select coin for start trading")
    }else if($("#balance").html() < base_trade){
      toastr.error("Ypur have doesn't enought balance")
    }else{
      chance_min = $("#chance_min").val();
      chance_max = $("#chance_max").val();
      $("#start").hide();
      $("#stop").show()
      trading = true
      if (trading) {
        base_trade =  $("#base_trade").val()
        balance = $("#balance").html()

        var actualPayouts = 95 / getChance(chance_min,chance_max);
        var payout = actualPayouts.toFixed(5);
        var base = parseFloat(base_trade).toFixed(8)
        const betAmt = new BigNumber(base);
        const actualPayout = new BigNumber(payout);
        const profit = betAmt.times(actualPayout).minus(betAmt);
        sendTrade(base_trade,payout,profit,balance,getChance(chance_min,chance_max))
      }
    }
  }
  function sendTrade(base_trade,payout,profit,balance,chance) {
    reset_win = $("#win_reset").val()
    reset_los = $("#los_reset").val()
     var settings = {
      "url": "./home/trade",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      "data": {
        "coin": coin,
        'base': base_trade,
        'chance': chance,
        'payout': payout,
        'profit': parseFloat(profit.toString()).toFixed(8),
        'balance': balance,
      }
    };

    $.ajax(settings).done(function (response) {
      console.log(getChance())
      balance = response.data.balance.toFixed(8)
      var table = document.getElementById("tradeTable");
      var newRow = table.insertRow(1);
      var cell1 = newRow.insertCell(0);
      var cell2 = newRow.insertCell(1);
      var cell3 = newRow.insertCell(2);
        if (response.data.type == 0) {
          cell1.innerHTML="LOW"
        }else{
          cell1.innerHTML="HIGHT"
        }
        if (response.data.status == 1) {
          win++;
          lastWin = win;
          if (los > lastLos) {
            lastLos = los
          }
          los=0
          newRow.classList.add("table-success");
          profit_global += (parseFloat(response.data.profit)-parseFloat(response.data.base));
          
          if (trading) {
            if (reset_win == win) {
                newval = $("#base_trade").val();
              }
              var actualPayouts = 95 / getChance();
              var payout = actualPayouts.toFixed(5);
              var base = parseFloat(newval).toFixed(8)
              const betAmt = new BigNumber(base);
              const actualPayout = new BigNumber(payout);
              const profit = betAmt.times(actualPayout).minus(betAmt);
              if (response.data.balance > newval) {
                setTimeout(function() { 
                  sendTrade(newval,payout,profit,response.data.balance,getChance(chance_min,chance_max))
                },500)
                
              }else{
                trading = false;
                toastr.error("You don't have enought balance")
              }
            
          }
        }else{
          los++;
          lastLos = los
          if (win > lastWin) {
            lastWin = win;
          }
          win=0;
          newRow.classList.add("table-danger");
          profit_global -= parseFloat(response.data.profit);
          
          if (trading) {
            if (reset_los == 0 ) {
              newval = ((parseInt(marti_los)/100)*parseFloat(response.data.base)) + parseFloat(response.data.base)  
            }else if(reset_los == los){
              newval =  $("#base_trade").val();
            }else{
              newval = ((parseInt(marti_los)/100)*parseFloat(response.data.base)) + parseFloat(response.data.base)
            }
            
            var actualPayouts = 95 / getChance();
            var payout = actualPayouts.toFixed(5);
            var base = parseFloat(newval).toFixed(8)
            const betAmt = new BigNumber(base);
            const actualPayout = new BigNumber(payout);
            const profit = betAmt.times(actualPayout).minus(betAmt);
            if (response.data.balance > newval) {
                    setTimeout(function() {
                        sendTrade(newval,payout,profit,response.data.balance,getChance(chance_min,chance_max))
                    }, 500);
            }else{
                    isLoopRunning = false;
                    toastr.error("You don't have enought balance")
            }
            
          }
        }
        cell2.innerHTML= parseFloat(response.data.base).toFixed(8)
        cell3.innerHTML= parseFloat(response.data.profit).toFixed(8)
        $("#win").html(lastWin)
        $("#los").html(lastLos)
        $("#balance").html(response.data.balance.toFixed(8))
        $("#profit_global").html(parseFloat(profit_global).toFixed(8))
    })
  }
  function stopTrade() {
    trading = false;
    $("#start").show();
    $("#stop").hide()
  }
  function shot() {
     val_shot = $("#val_shot").val()
     newval = val_shot
  }
  function boom() {
     newval = $("#val_boom").val()
     console.log(newval)
  }

</script>
</body>
</html>