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

function revealMessage2() {
	document.getElementById("hiddenMessage2").style.display = 'block';
}

function play() {
	var audio = new Audio("sound_effects/Baseball_Hit_Sound_Effect.mp3");
	audio.play();
  }

function countDown2(){
	var currentVal = document.getElementById("countDownButton2").innerHTML;
	var newVal = 0;

	if (currentVal == 1){
		revealMessage2()
	}else if (currentVal > 0){

		play()
		newVal = currentVal - 1;	
	}
	document.getElementById('countDownButton2').innerHTML = newVal;


}

