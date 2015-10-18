var min = 0, sec = 60;

var m10 = Math.floor(min/10);
var m = min%10;
var s10 = Math.floor(sec/10);
var s = sec%10;

var ud = document.getElementById("sec_v");
var ld = document.getElementById("sec_i");

var tm = setInterval(updateTime,1000);	

(function timersetup(){
	setTime();
})();

function updateTime(){	
	if(sec == 0){
		sec = 59;
		if(min == 0){
			alert("Time up!");
			clearInterval(tm);
			sec = 0;
		}
		else{
			min--;
		}
	}
	else{
		sec--;
	}
	rmClass();
	setTime();
	updateDigits();
}

function updateDigits() {
	if(m10 != Math.floor(min/10)){
		m10 = Math.floor(min/10);
		moveDigit("min10");
	}
	if(m != (min%10)){
		m = (min%10);
		moveDigit("min");
	}
	if(s10 != Math.floor(sec/10)){
		s10 = Math.floor(sec/10);
		moveDigit("sec10");
	}
	if(s != (sec%10)){
		s = (sec%10);
		moveDigit("sec");
	}
}

function setTime(){
		
	changeDigit("min10_v",m10);
	changeDigit("min10_i",decrement(m10,true));
	changeDigit("min_v",m);
	changeDigit("min_i",decrement(m,false));
	
	changeDigit("sec10_v",s10);
	changeDigit("sec10_i",decrement(s10,true));
	changeDigit("sec_v",s);
	changeDigit("sec_i",decrement(s,false));
}

function decrement(digit,toggle){
	if(digit == 0 )
		if(toggle)
			return 5;
		else
			return 9;
	else
		return --digit;
}

function changeDigit(id,val){
	document.getElementById(id).innerHTML = val;
}

function moveDigit(id){
	$("#"+id+"_v").addClass("moveup_ud");
	$("#"+id+"_i").css("display","block").addClass("moveup_ld");
}

function rmClass(){
	document.getElementById("min10_v").className = "";
	document.getElementById("min10_i").className = "";
	
	document.getElementById("min_v").className = "";
	document.getElementById("min_i").className = "";
	
	document.getElementById("sec10_v").className = "";
	document.getElementById("sec10_i").className = "";
	
	document.getElementById("sec_v").className = "";
	document.getElementById("sec_i").className = "";
}