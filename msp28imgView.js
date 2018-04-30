function search(id,q){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		 if(q==1){$("#imgAndArrows").html(this.responseText);} else if(q==2){$("#showText").html(this.responseText);}
		 componentHandler.upgradeDom();
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
	$("#loadX").show();
	$("#container2").hide();
	$("#closeX").hide();
}