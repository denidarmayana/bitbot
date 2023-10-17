"use strict";

$("#coin_select").change(function() {
	var coin = $("#coin_select").val();
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
		console.log(response)
		if (response.code == 200) {
			$("#balance_host").val(response.data.balance)
		}else{
			window.location.href="./wallet"
		}
	});
})


$("#copy").click(function() {
	var input = document.getElementById("link_reff");
	input.select();
  document.execCommand("copy");
  input.setSelectionRange(0, 0);
  toastr.success("referral link successfully copied")
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
	var balance = $("#balance_host").val();
	var coins = $("#coin_select").val()
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
		  $("#balance_host").val(parseFloat(semua).toFixed(8))
		  var settings = {
		    "url": "./home/updatebalance",
		    "method": "POST",
		    "timeout": 0,
		    "headers": {
		      "Content-Type": "application/x-www-form-urlencoded",
		    },
		    "data": {
		      "balance": parseFloat(semua).toFixed(8),
		      "coin": coins
		    }
		  };

		  $.ajax(settings).done(function (response) {
		  	
		  });
		  if ($("#balance_host").val() < baseValue.toFixed(8)) {
		  	toastr.error("Trading Sroped")
		  	clearInterval(intervalId);
		  }
	},1000);
	}
})
$("#stop").click(function() {
	toastr.error("Trading Sroped")
	$("#start").show();
	$("#stop").hide();
	
	clearInterval(intervalId);
})


