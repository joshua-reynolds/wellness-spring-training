/* 
function revealMessage() {
	document.getElementById("hiddenMessage").style.display = 'block';
}



function countDown(){
	var currentVal = document.getElementById("countDownButton").innerHTML;
	var newVal = 0;

	if (currentVal > 0){
		newVal = currentVal - 1;
	}
	document.getElementById('countDownButton').innerHTML = newVal;
}
*/

function getTeam() {
	var e = document.getElementById("teamSelect").value;
	document.getElementById("team_name").innerHTML = e;
}

function revealMessage2() {
	document.getElementById("hiddenMessage2").style.display = 'block';
}

function play0() {
	var audio = new Audio("sound_effects/Laugh.mp3");
	audio.play();
  }

function play1() {
	var audio = new Audio("sound_effects/Baseball_Hit_Sound_Effect.mp3");
	audio.play();
  }
  
function play2() {
	var audio = new Audio("sound_effects/Baseball_Hit_With_Cheer_Sound_Effect.mp3");
	audio.play();
  }


function enableButton() {
	document.getElementById("bat_button").disabled = false;
}


function redirectTo(sUrl) {
	window.location = sUrl
}

function bat(){
	
	// get teamName/id from drop down somehow
	var tn = document.getElementById("team_name").innerHTML;

	// get id

	// get date

	
	let result = Math.floor(Math.random() * 5);
	
	if (result == 0){
		play0()
	}else if (result > 0 && result <= 2){
		play1()	
	}else if (result > 2){
		play2()	
	}
	
	const results = {0:'Out', 1:"Single", 2:"Double", 3:"Triple!", 4:"Home-Run!!"};
	document.getElementById("bat_result").innerHTML = results[result];

	// create an insert record using team id, date, and result

}

function bat2(){
	$.ajax({
		type: "POST",
		url: "results.php",
		dataType: "json",
		success: function (response) {
		}
	});
}
