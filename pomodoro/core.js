
	$(document).ready(function(){
		play = $('#play');
		stop = $('#stop');
		display = $('#time');
		inputs = $('input');
		display.html(styleTime(time));

		play.click(function(){
			if(!isLooping) {
				date = Date.now();
				time = tWork;
				play.text('Pause');
				display.html(styleTime(time));	
				timer = setInterval(timing, 1000);
				isLooping = true;
			}
			else if(isPaused) {
				date = Date.now();
				timer = setInterval(timing, 1000);
				isPaused = false;
				play.text('Pause');
			}
			else {
				clearInterval(timer);
				isPaused = true;
				play.text('Play');
			}
		});

		stop.click(function(){
			clearInterval(timer);
			isLooping = isPaused = inBreak = false;
			time = cycle = 0;
			display.html(styleTime(time));
			play.text('Lancer');
		});
		
		$('input:first').change(function(){tWork = inputs[0].value * MS_IN_MINUTE});
		$('input:nth-child(3)').change(function(){tBreak = inputs[1].value * MS_IN_MINUTE});
		$('input:last').change(function(){tStop = inputs[2].value * MS_IN_MINUTE});
	});