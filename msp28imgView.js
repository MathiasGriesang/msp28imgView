var is_open=false;
var atual_id=1;
function search(id,q){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		 if(q==1){$("#imgAndArrows").html(this.responseText);} else if(q==2){$("#showText").html(this.responseText);}
		 componentHandler.upgradeDom();
		 is_open=true;
		 atual_id=id;
		}
	};
	xhttp.open("GET", "plugin/msp28imgView.php?id="+id+"&q="+q, true);
	xhttp.send();
}
function open_midia(id){
	$("#msp28imgView").show();
	setTimeout(function (){
		$("#loadX").hide();
		$("#container2").show();
		$("#closeX").show();
		$("#imgAndArrows").html("<div class='mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active'></div>");
		$("#showText").html("<div class='mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active'></div>");
		componentHandler.upgradeDom();
		search(id,1);
		search(id,2);
	}, 500);
}
function next_midia(id){
	$("#imgAndArrows").html("<div class='mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active'></div>");
	$("#showText").html("<div class='mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active'></div>");
	componentHandler.upgradeDom();
	search(id+1,1);
	search(id+1,2);
}
function back_midia(id){
	$("#imgAndArrows").html("<div class='mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active'></div>");
	$("#showText").html("<div class='mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active'></div>");
	componentHandler.upgradeDom();
	search(id-1,1);
	search(id-1,2);
}
function close_midia(){
	$('#msp28imgView').hide();
	is_open=false;
	$("#loadX").show();
	$("#container2").hide();
	$("#closeX").hide();
}

$(document).ready(function(){
  $(document).keypress(function(e){
  	if (is_open) {
		if(e.wich == 37 || e.keyCode == 37){
			if ($("div#leftBack").length) { 
				back_midia(atual_id);
			}
		}else if(e.wich == 39 || e.keyCode == 39){
			if ($("div#rightNext").length) { 
				next_midia(atual_id);
			}
		}else if(e.wich == 27 || e.keyCode == 27){
			close_midia();
		}
	}
  })
})
