"use strict"
$("#form-wd").hide()
$("#stop").hide();
$("#update_balance").hide();
const socket = new WebSocket('wss://galaxy7.tech:3000');
socket.addEventListener('open', (event) => {
  	console.log("WebSocket open")

});
let server_balance
// Event handler for when a message is received from the server.
socket.addEventListener('message', (event) => {
	var json = JSON.parse(event.data)
	if (json.action == "update_balance") {
		
		server_balance = json.user_balance
	}
});

// Event handler for when an error occurs.
socket.addEventListener('error', (event) => {
  console.error(event);
});

// Event handler for when the connection is closed.
socket.addEventListener('close', (event) => {
  if (event.wasClean) {
    console.log(event);
  } else {
  	setInterval(function() {
    	location.reload();
		}, 5000);
    console.error('WebSocket connection abruptly closed');
  }
});
var themeOptionArr = {
	typography: '',
	version: '',
	layout: '',
	primary: '',
	headerBg: '',
	navheaderBg: '',
	sidebarBg: '',
	sidebarStyle: '',
	sidebarPosition: '',
	headerPosition: '',
	containerLayout: '',
	//direction: '',
};
function getChence(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min;
}
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}
let isLoopRunning = true;
let balance
let coin
let los
let win
var lastWin = 0;
var lastLos = 0;
var profit_global = 0;
let base_trade
var chance_min = $("#chance_min").val();
var chance_max = $("#chance_max").val()
var marti_win = $("#marti_win").val()
var marti_los = $("#marti_los").val()
var win_reset = $("#win_reset").val()
var los_reset = $("#los_reset").val()
var val_shot = $("#val_shot").val()
var val_boom = $("#val_boom").val()
$("#coin_server").change(function() {
	coin = $("#coin_server").val();
	if (coin != "MBIT") {
		socket.send(JSON.stringify({method:"get_balance",coin:coin}))	
	}
	var settings = {
      "url": "./wallet/address",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      "data": {
        "coin": coin
      }
    };
    $.ajax(settings).done(function (response) {
    	$("#form-wd").show()
    	$("#address").val(response.address)
    	$("#qr").attr("src",response.qr)
    	$("#balance_depo").val(response.balance)
    	$("#minimun_depo").val(parseFloat(response.minimun).toFixed(8))
      $("#update_balance").show();
    });
})

$("#update_balance").click(function() {
	coin = $("#coin_server").val();
	var settings = {
      "url": "./wallet/save",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      "data": {
        "coin": coin,
        "balance":server_balance
      }
    };
	$.ajax(settings).done(function (response) {
		console.log(response)
    	// $("#balance_depo").val(response.balance)
  });
})
$("#update_deposit").click(()=>{
	var username = $("#show_members").val()
	var balance = $("#amount_balance").val()
	if (balance == "") {
		toastr.error("Amount can't be empty")
	}else{
		var settings = {
      "url": "./update",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      "data": {
        "username": username,
        "balance": parseFloat(balance).toFixed(8) 
      }
    };
		$.ajax(settings).done(function (response) {
			if (response.code == 200) {
          toastr.success(response.message)
          setTimeout(function() {
            window.location.href="./deposit"
          },1500)
      }
	  });
	}
})
$("#penarikan").click(()=>{
	coin = $("#coin_server").val();
	var wallet = $("#wallet_wd").val();
	var min = $("#minimun_depo").val();
	var amount = $("#amount_wd").val();
	if (wallet == "") {
		toastr.error("Wallet addres can't be empty")
	}else if (amount == "") {
		toastr.error("Amount addres can't be empty")
	}else if (parseFloat(amount).toFixed(8) < parseFloat(min) ) {
		toastr.error("minimun withdrawal "+parseFloat(min).toFixed(8)+" "+coin)
	}else if (parseFloat(amount).toFixed(8) > parseFloat($("#balance_depo").val())) {
		toastr.error("Your balance don't have anought")
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
        "balance":amount,
        "address":wallet
      }
    };
	$.ajax(settings).done(function (response) {
		console.log(response)
    	if (response.code == 200) {
          toastr.success(response.message)
          setTimeout(function() {
            window.location.href="./wallet"
          },1500)
      }
  });
	}
})
$("#coin").change(function() {
	coin = $("#coin").val();
	var settings = {
      "url": "./home/getcoin",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      "data": {
        "coin": coin
      }
    };

    $.ajax(settings).done(function (response) {
      $("#balance").html(response.data.balance)
      balance = $("#balance").html();
    });
})
function getStatusTrade(coin,base_trade,chance,payout,profit,balance) {
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
    		
    		newRow.classList.add("bg-success");
    		profit_global += (parseFloat(response.data.profit)-parseFloat(response.data.base));
    		if (isLoopRunning) {
    			if (win_reset == win) {
    				var newval = $("#base_trade").val();
    			}else{
    				var newval = parseFloat(response.data.base)
    			}
    			
	    		var chance = getChence(chance_min,chance_max);
					var actualPayouts = 95 / chance;
					var payout = actualPayouts.toFixed(5);
					var base = parseFloat(newval).toFixed(8)
					const betAmt = new BigNumber(base);
					const actualPayout = new BigNumber(payout);
					const profit = betAmt.times(actualPayout).minus(betAmt);
		  		// Gunakan setTimeout untuk menunda eksekusi getStatusTrade selama 500 milidetik
					if (response.data.balance > newval) {
		  			setTimeout(function() {
						    getStatusTrade(coin, newval, chance, payout, profit, response.data.balance);
						}, 1000);	
		  		}else{
		  			isLoopRunning = false;
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
    		newRow.classList.add("bg-danger");
    		profit_global -= parseFloat(response.data.profit);
    		if (isLoopRunning) {
    			var newval = ((parseInt(marti_los)/100)*parseFloat(response.data.base)) + parseFloat(response.data.base)
	    		var chance = getChence(chance_min,chance_max);
					var actualPayouts = 95 / chance;
					var payout = actualPayouts.toFixed(5);
					var base = parseFloat(newval).toFixed(8)
					const betAmt = new BigNumber(base);
					const actualPayout = new BigNumber(payout);
					const profit = betAmt.times(actualPayout).minus(betAmt);
		  		// Gunakan setTimeout untuk menunda eksekusi getStatusTrade selama 500 milidetik
		  		if (response.data.balance > newval) {
		  			setTimeout(function() {
						    getStatusTrade(coin, newval, chance, payout, profit, response.data.balance);
						}, 1000);	
		  		}else{
		  			isLoopRunning = false;
		  			toastr.error("You don't have enought balance")
		  		}
					
    		}
    		
	    	
    		
    	}
    	cell1.classList.add("text-white");
    	cell2.classList.add("text-white");
    	cell3.classList.add("text-white");
    	cell2.innerHTML= parseFloat(response.data.base).toFixed(8)
    	cell3.innerHTML= parseFloat(response.data.profit).toFixed(8)
    	$("#win").html(lastWin)
    	$("#los").html(lastLos)
    	$("#balance").html(response.data.balance.toFixed(8))
    	$("#profit_global").html(parseFloat(profit_global).toFixed(8))

    });
}
$("#start").click(function() {
	if ($("#balance").html() < $("#base_trade").val()) {
		toastr.error("You don't have enought balance")
	}else{
		$("#start").hide();
		$("#stop").show();
		if (isLoopRunning) {
			var chance = getChence(chance_min,chance_max);
			base_trade = $("#base_trade").val();
			var actualPayouts = 95 / chance;
			var payout = actualPayouts.toFixed(5);
			var base = parseFloat(base_trade).toFixed(8)
			const betAmt = new BigNumber(base);
			const actualPayout = new BigNumber(payout);
			const profit = betAmt.times(actualPayout).minus(betAmt);
			setTimeout(function() {
			    getStatusTrade(coin, base_trade, chance, payout, profit, balance);
			}, 1000);	
		}
		
	}
})
$("#shot").click(function() {
	if ($("#balance").html() < $("#val_shot").val()) {
		toastr.error("You don't have enought balance")
	}else{
		if (isLoopRunning) {
		var chance = getChence(chance_min,chance_max);
		base_trade = $("#val_shot").val();
		var actualPayouts = 95 / chance;
		var payout = actualPayouts.toFixed(5);
		var base = parseFloat(base_trade).toFixed(8)
		const betAmt = new BigNumber(base);
		const actualPayout = new BigNumber(payout);
		const profit = betAmt.times(actualPayout).minus(betAmt);
		getStatusTrade(coin,base_trade,chance,payout,profit,balance)
		}
	}
})
$("#boom").click(function() {
	if ($("#balance").html() < $("#val_boom").val()) {
		toastr.error("You don't have enought balance")
	}else{
		var chance = getChence(chance_min,chance_max);
		base_trade = $("#val_boom").val();
		var actualPayouts = 95 / chance;
		var payout = actualPayouts.toFixed(5);
		var base = parseFloat(base_trade).toFixed(8)
		const betAmt = new BigNumber(base);
		const actualPayout = new BigNumber(payout);
		const profit = betAmt.times(actualPayout).minus(betAmt);
		getStatusTrade(coin,base_trade,chance,payout,profit,balance)
	}
})
$("#stop").click(function() {
	$("#start").show();
	$("#stop").hide();
	isLoopRunning = false;
})
/* Cookies Function */
function setCookie(cname, cvalue, exhours) 
	{
		var d = new Date();
		d.setTime(d.getTime() + (30*60*1000)); /* 30 Minutes */
		var expires = "expires="+ d.toString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}

function getCookie(cname) 
	{
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}

function deleteCookie(cname) 
	{
		var d = new Date();
		d.setTime(d.getTime() + (1)); // 1/1000 second
		var expires = "expires="+ d.toString();
		//document.cookie = cname + "=1;" + expires + ";path=/";
		document.cookie = cname + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT"+";path=/";
	}

function deleteAllCookie(reload = true)
	{
		jQuery.each(themeOptionArr, function(optionKey, optionValue) {
				deleteCookie(optionKey);
		});
		if(reload){
			location.reload();
		}
	}
 	
/* Cookies Function END */	
 	

(function($) {
	
	"use strict"
	
	//var direction =  getUrlParams('dir');
	var theme =  getUrlParams('theme');
	
	/* Dz Theme Demo Settings  */
	
	var dzThemeSet0 = { /* Default Theme */
		typography: "poppins",
		version: "light",
		layout: "vertical",
		primary: "color_1",
		headerBg: "color_1",
		navheaderBg: "color_2",
		sidebarBg: "color_2",
		sidebarStyle: "full",
		sidebarPosition: "fixed",
		headerPosition: "fixed",
		containerLayout: "full",
	};
	
	var dzThemeSet1 = {
		typography: "poppins",
		version: "light",
		layout: "vertical",
		primary: "color_1",
		headerBg: "color_1",
		navheaderBg: "color_4",
		sidebarBg: "color_4",
		sidebarStyle: "full",
		sidebarPosition: "fixed",
		headerPosition: "fixed",
		containerLayout: "full",
	};
	
	var dzThemeSet2 = {
		typography: "poppins",
		version: "light",
		layout: "horizontal",
		primary: "color_2",
		headerBg: "color_2",
		navheaderBg: "color_2",
		sidebarBg: "color_1",
		sidebarStyle: "full",
		sidebarPosition: "fixed",
		headerPosition: "fixed",
		containerLayout: "full",
	};
	
	
	var dzThemeSet3 = {
		typography: "poppins",
		version: "light",
		layout: "vertical",
		primary: "color_8",
		headerBg: "color_1",
		navheaderBg: "color_8",
		sidebarBg: "color_1",
		sidebarStyle: "full",
		sidebarPosition: "fixed",
		headerPosition: "fixed",
		containerLayout: "full",
	};
	
	var dzThemeSet4 = {
		typography: "poppins",
		version: "light",
		layout: "vertical",
		primary: "color_5",
		headerBg: "color_5",
		navheaderBg: "color_5",
		sidebarBg: "color_1",
		sidebarStyle: "full",
		sidebarPosition: "fixed",
		headerPosition: "fixed",
		containerLayout: "full",
	};
	
	var dzThemeSet5 = {
		typography: "poppins",
		version: "light",
		layout: "vertical",
		primary: "color_11",
		headerBg: "color_1",
		navheaderBg: "color_11",
		sidebarBg: "color_11",
		sidebarStyle: "full",
		sidebarPosition: "fixed",
		headerPosition: "fixed",
		containerLayout: "full",
	};
	var dzThemeSet6 = {
		typography: "poppins",
		version: "light",
		layout: "vertical",
		primary: "color_5",
		headerBg: "color_1",
		navheaderBg: "color_1",
		sidebarBg: "color_1",
		sidebarStyle: "full",
		sidebarPosition: "fixed",
		headerPosition: "fixed",
		containerLayout: "full",
	};
	var dzThemeSet7 = {
		typography: "poppins",
		version: "light",
		layout: "vertical",
		primary: "color_9",
		headerBg: "color_1",
		navheaderBg: "color_9",
		sidebarBg: "color_9",
		sidebarStyle: "full",
		sidebarPosition: "fixed",
		headerPosition: "fixed",
		containerLayout: "full",
	};
	var dzThemeSet8 = {
		typography: "poppins",
		version: "light",
		layout: "vertical",
		primary: "color_10",
		headerBg: "color_1",
		navheaderBg: "color_10",
		sidebarBg: "color_10",
		sidebarStyle: "mini",
		sidebarPosition: "fixed",
		headerPosition: "fixed",
		containerLayout: "full",
	};
	
		
	function themeChange(theme){
		
		
		setThemeInCookie("dark");
	}
	
	function setThemeInCookie(themeSettings)
	{
		setCookie(1,"dark");
	}
	
	function setThemeLogo() {
		var logo = getCookie('logo_src');
		
		var logo2 = getCookie('logo_src2');
		
		if(logo != ''){
			jQuery('.nav-header .logo-abbr').attr("src", logo);
		}
		
		if(logo2 != ''){
			jQuery('.nav-header .logo-compact, .nav-header .brand-title').attr("src", logo2);
		}
	}
	
	function setThemeOptionOnPage()
	{
		if(getCookie('version') != '')
		{
			jQuery.each(themeOptionArr, function(optionKey, optionValue) {
				var optionData = getCookie(optionKey);
				themeOptionArr[optionKey] = (optionData != '')?optionData:dzSettingsOptions[optionKey];
			});
			//console.log(themeOptionArr);
			dzSettingsOptions = themeOptionArr;
			new dzSettings(dzSettingsOptions);
			
			setThemeLogo();
		}
	}
	
	jQuery(document).on('click', '.dz_theme_demo', function(){
		var demoTheme = jQuery(this).data('theme');
		themeChange(demoTheme, 'ltr');
		
	});


	jQuery(document).on('click', '.dz_theme_demo_rtl', function(){
		var demoTheme = jQuery(this).data('theme');
		themeChange(demoTheme, 'rtl');
	});
	
	
	jQuery(window).on('load', function(){
		//direction = (direction != undefined)?direction:'ltr';
		if(theme != undefined){
			themeChange(theme);
		}else if(getCookie('version') == ''){	
			themeChange(theme);
			
		}
		
		/* Set Theme On Page From Cookie */
		setThemeOptionOnPage();
	});
	

})(jQuery);