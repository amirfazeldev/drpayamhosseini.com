
// 2016/08/22

document.write('<div id="hitbox-container"><div id="hitbox-text" class="boxborder"></div></div>');

function hitbox(text,w,h){

	if( w==0 || w==undefined ){
		w = 'auto';
	}
	if( h==0 || h==undefined ){
		h = '100%';
	}

	if(! isNaN(w) ){
		var wiW = window.innerWidth;
		if( w > wiW * 0.9 ){
			w_before_change = w;
			w = wiW * 0.9;
			if(! isNaN(h) ){
				h = h * w / w_before_change;
			}
		}
	}

	if(! isNaN(h) ){
		var wiH = window.innerHeight;
		if( h > wiH * 0.9 ){ // agar h ziadi bozorge
			h_before_change = h;
			h = wiH * 0.9; // height ro bezar ru max
			if(! isNaN(w) ){ // va agar w number e
				w = w * h / h_before_change; // w ro motenaseb ba h tanzim kon
			}
		}
	}

	// px
	if(! isNaN(h) ){
		h = h + 'px';
	}
	if(! isNaN(w) ){
		w = w + 'px';
	}

	$('#hitbox-container').show();
	$('#hitbox-container').css({'width':'100%','height':'100%'}).animate({'opacity':'1'},500);
	$('#hitbox-text').css({'width':w,'height':h,'padding':'0px'});
	$('#hitbox-text').html(text);

	return false;
}

function dehitbox(){
	if( hb_intoolstd!='in' ){
		console.log('out');
		$('#hitbox-text').html('');
		$('#hitbox-text').css({'width':'0px','height':'0px','padding':'0px'});
		$('#hitbox-container').animate({'opacity':'0.0'},500);
		setTimeout(function(){
			$('#hitbox-container').hide();
		}, 500);
	} else {
		console.log('in');
	}
	
}

var hb_intoolstd = 'out';

$('#hitbox-text').on("mouseenter", function(){
	hb_intoolstd = "in";
	// console.log(hb_intoolstd);
});
$('#hitbox-text').on("mouseleave", function(){
	hb_intoolstd = "out";
	// console.log(hb_intoolstd);
});

$("#hitbox-container").on("click",function(){
	dehitbox();
});

$(document).keydown(function(e) {
	if(e.keyCode == '27'){
		hb_intoolstd = 'out';
		dehitbox();
	}
});









