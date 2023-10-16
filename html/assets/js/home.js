"use strict";

var settings = {
  "url": "./wallet/getsoket",
  "method": "POST",
  "timeout": 0,
  "headers": {
    "Content-Type": "application/x-www-form-urlencoded",
  },
  "data": {
    "token": localStorage.getItem('token'),
  }
};

$.ajax(settings).done(function (response) {
	localStorage.setItem("socket",response.socket_token)
	console.log(response.socket_token)
});
const socket = new WebSocket('ws://galaxy7.tech:3000');
socket.addEventListener('open', (event) => {
	  console.log('Koneksi terbuka.');
	  // Mengirim pesan ke server	  
});
if (localStorage.getItem('socket') != "") {
		const message = {
	      method: 'initialization',
	      socket_token: localStorage.getItem('socket')
	  };
	  setTimeout(function() {
	  	socket.send(JSON.stringify(message));
	  },1000)
}
socket.addEventListener('message', (event) => {
			var json = JSON.parse(event.data);
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
        console.error('Koneksi terputus secara tiba-tiba');
    }
});

// Menangani peristiwa saat terjadi kesalahan
socket.addEventListener('error', (event) => {
    console.error('Terjadi kesalahan:', event);
});
$("#copy").click(function() {
	var input = document.getElementById("link_reff");
	input.select();
  document.execCommand("copy");
  input.setSelectionRange(0, 0);
  toastr.success("referral link successfully copied")
})
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
          "token": localStorage.getItem('token'),
          "coin": item
        }
      };

      $.ajax(settings).done(function (response) {
      	$("#address").val(response.address)
      	$("#qr").attr("src",response.qr)
      });
	}
	
})
$("#copy_address").click(function() {
	var input = document.getElementById("address");
	input.select();
  document.execCommand("copy");
  input.setSelectionRange(0, 0);
  toastr.success("Wallet Address successfully copied")
})

function getType() {
  return Math.round(Math.random());
}
function getWin() {
  return Math.round(Math.random());
}

let intervalId;

function getChance(min, max) {
  const randomFraction = Math.random();
  const randomNumber = Math.floor(randomFraction * (max - min + 1) + min);
  return randomNumber;
}

$("#start").click(function() {
	var balance = $("#balance").val();
	var base = $("#base").val();
	var chance = $("#chance").val();
	var shoot = $("#shoot").val();
	var boom = $("#boom").val();
	var m_win = $("#m_win").val();
	var m_los = $("#m_los").val();
	var if_win = $("#if_win").val();
	var if_los = $("#if_los").val();
	var count = 0;
	var win=0;
	var los =0;
	var trading;
	var count = 0;
	var resetOccurred = false;
	var baseValue = parseFloat($("#base").val());
	var globals=0;
	var total;
	if(balance < base){
		toastr.error("your don't have enought balance")
	}else{
		toastr.success("Start Trading")
		$("#start").hide();
		$("#stop").show();
		intervalId = setInterval(function() {
			count++;
			var table = document.getElementById("table-trade");
		  var newRow = table.insertRow(1); // Insert at the second position (0-based index)
		  var cell1 = newRow.insertCell(0);
		  var cell2 = newRow.insertCell(1);
		  var cell3 = newRow.insertCell(2);
		  if (getType() == 1){
		  	cell1.innerHTML = "HIGHT";
		  }else{
		  	cell1.innerHTML = "LOW";
		  }
		  if(getWin() == 1){
		  	newRow.classList.add("table-success");
		  	win++;
		  	los=0;
		  	if (win == 2) {
		      baseValue = parseFloat($("#base").val());
		      
		    }else{
		    	baseValue = baseValue * 2;
		    }
		    if (chance < 20) {
					var chanceval = getChance(70, 90);
				}else if (chance > 20 && chance < 40) {
					var chanceval = getChance(60, 80);
				}else if (chance > 40 && chance < 95) {
					var chanceval = getChance(50, 70);
				}
				var chanceval = getChance(20, chance);
				var opit = (parseFloat(baseValue)*parseFloat(chanceval))/100
		    total = parseFloat(baseValue) + parseFloat(opit);
		    globals += parseFloat(opit);
		  }else{
		  	newRow.classList.add("table-danger");
	  		win=0;
		  	los++;
		  	if (los == 1) {
		  		baseValue = parseFloat($("#base").val());
		  	}else{
		  		baseValue = baseValue * 2;
		  	}
		  	globals -= parseFloat(baseValue);
		  	total = parseFloat(baseValue)
		  }
		  localStorage.setItem('base', baseValue);
  		cell2.innerHTML = baseValue.toFixed(8)
		  cell3.innerHTML = total.toFixed(8)
		  $("#global").val(parseFloat(globals).toFixed(8))
		  var semua = parseFloat(globals) + parseFloat(balance);
		  $("#balance").val(parseFloat(semua).toFixed(8))
		  if ($("#balance").val() < 0) {
		  	toastr.error("Trading Sroped")
		  	clearInterval(intervalId);
		  }
	},500);
	}
})
$("#stop").click(function() {
	toastr.error("Trading Sroped")
	$("#start").show();
	$("#stop").hide();
	clearInterval(intervalId);
})


