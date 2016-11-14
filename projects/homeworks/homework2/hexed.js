
  	//Hexed JQuery Plugin
    (function( $ ){
   		$.fn.hexed = function() {

   		//Class that stores number of turns and level of difficulty
   		//seleted by the user
   		var settings = {
			turns:5,
			difficulty:10
		}

		//Class that stores the cumulative score from each turn
		var score = {
			score:0
		}

   		//Adds the hex values from each slider up to get the user generated swatch color
   		//Modeled off of jQueryui.com's color picker
    	function hexFromRGB(r, g, b) {
	      var hex = [
	        r.toString( 16 ),
	        g.toString( 16 ),
	        b.toString( 16 )
	      ];
	      $.each( hex, function( nr, val ) {
	        if ( val.length === 1 ) {
	          hex[ nr ] = "0" + val;
	        }
	      });
	      return hex.join( "" ).toUpperCase();
	    }

	    //Returns the final cumulative score in the form of an alert
	    function totalScore() {
	    	alert("Your score is " + score.score);
	    }

	    //Modeled off of jQueryui.com's color picker
	    //Modifies swatch hex value as the user moves the sliders
	    function refreshSwatch() {
	      var red = $( "#red" ).slider( "value" ),
	        green = $( "#green" ).slider( "value" ),
	        blue = $( "#blue" ).slider( "value" ),
	        hex_user = hexFromRGB( red, green, blue );
	      $( "#swatch" ).css( "background-color", "#" + hex_user );
	    }

	    //Resets sliders to default configuration
	    function refreshSlider() {
    		$( "#red" ).slider( "value", 10 );
	    	$( "#green" ).slider( "value", 30 );
	    	$( "#blue" ).slider( "value", 50 );
	    }

	    //Simulates one turn
	    //The time it takes from the moment the user clicks the start turn button
	    //to the moment the user clicks the submit button is recorded and 
	    //factored into the score
	    //The user can take no longer than 15 seconds (15000 milliseconds) to get a score above
	    //a zero
	    //The score for the current turn is calculated and stored in the "turnScore" variable
	    //The current turn's score is added to the previous score to get a cumulative score

	    function one_turn(red,green,blue) {
	    		//Insert "Start_Turn" button in html, when user clicks this button
	    		//start timing
	    		//Hide the animated gif
	    		$('.gif').hide();
		    	$('.button_base').html('<button class="Start_Turn">Start Turn</button>');
		    	$('.Start_Turn').click(function() {
					$('.Start_Turn').remove();
					//Show the class that contains the sliders and corresponding swarch
					//Set sliders to default
					$("#slider_container").show();
					refreshSwatch();
					$( "#red, #green, #blue" ).slider({
			      		orientation: "horizontal",
			      		range: "min",
			      		max: 255,
			      		value: 127,
			      		slide: refreshSwatch,
			      		change: refreshSwatch
			    	});

					//Insert a "Submit" button
					//After clicking "Submit" button calculate amount of time that passed
					$('.button_base').html('<button class="Submit_Answer">Submit Answer</button>');
						var start = new Date().getTime();
			 	    	$(".Submit_Answer").click(function() {
				 	    	$(".Submit_Answer").remove();
							var finish = new Date().getTime();
							//Calculates score based on given formula (in HW2 document)
							var time = finish - start;
							//Percent difference (expected color vs actual color)
							var absRed = (Math.abs(red - $('#red').slider("value")) / 255) * 100;
							var absGreen = (Math.abs(green - $('#green').slider("value")) / 255) * 100;
							var absBlue = (Math.abs(blue - $('#blue').slider("value")) / 255) * 100;
							var percent_off = (absRed + absGreen + absBlue) / 3;    
							var ratio = (15 - settings.difficulty - percent_off)/(15 - settings.difficulty); 
							var difference = 15000 - time;              
							var turnScore = Math.floor(ratio * difference);

							//Add the score for this turn to the total score      
							score.score += turnScore; 
							//Output the score for this turn and the total score
							var output = "Score " + score.score.toFixed(2) + "</br>";
							output += "Earned " + turnScore.toFixed(2) + " for this round";               
							$('#score').html(output);
							//Show the next turn button and the animated gif
							$(".next_turn").show();
							$('.gif').show();
							//Hide the sliders
							$("#slider_container").hide();
					}); 
				});
			}

		/*===========================================================================================*/
	    //Create the HTML document structure needed to format the classes and ids in the game/plugin
	    var output = "";
	    //class "inner_container" will encapsulate the two HTML selectors
	    //class "selector_container" will enscapsulate each individual selector
	    //There are two selectors: 1.) for choosing difficulty (1-10) and 2.) for choosing 
		//number of turns
		//The default number of turns will be 10
		//Default difficulty level will be 5
	 	output+='<div class="inner_container">'
	 	output+='<div class="selector_container"><div id="Difficulty_Selector">'
	 	output+='<p>Difficulty</p>'
	 	//Difficulty level selector
	 	output+='<select id="difficulty">'
	 	output+='<option value="1">1</option>'
	 	output+='<option value="2">2</option>'
	 	output+='<option value="3">3</option>'
	 	output+='<option value="4">4</option>'
	 	output+='<option value="5" selected="selected">5</option>'
	 	output+='<option value="6">6</option>'
	 	output+='<option value="7">7</option>'
	 	output+='<option value="8">8</option>'
	 	output+='<option value="9">9</option>'
	 	output+='<option value="10">10</option>'
	 	output+='</select></div></div>'
	 	output+='<div class="selector_container"><div id="Turns_Selector">'
	 	//Number of turns selector
	 	output+='<p>Turns</p>'
	 	output+='<select id="turns">'
	 	output+='<option value="1">1</option>'
	 	output+='<option value="2">2</option>'
	 	output+='<option value="3">3</option>'
	 	output+='<option value="4">4</option>'
	 	output+='<option value="5">5</option>'
	 	output+='<option value="6">6</option>'
	 	output+='<option value="7">7</option>'
	 	output+='<option value="8">8</option>'
	 	output+='<option value="9">9</option>'
	 	output+='<option value="10" selected="selected">10</option>'
	 	output+='</select></div></div>'
	 	output+='</div>'

	 	//class "button_containers" will encapsulate all of the buttons used in the game
	 	//All of the buttons with the exception of the "next_turn" button will be outputted
	 	//to the "button_base" class
	 	//The "next_turn" button will be outputted to the "button_base2" class
	 	output+='<div class="button_container button_base"></div>'
	 	output+='<div class="button_container button_base2"></div>'
	 	//Will encapsulate the animated gif
	 	output+='<div class="gif"><img src="./resources/banana.gif" width="90px" height="90px" alt="Animated Banna Gif"></div>'
	 	//Will encapsulate the sliders (red, green, blue)
	 	output+='<div id="slider_container">'
	 	output+='<div id="red"></div>'
	 	output+='<div id="green"></div>'
	 	output+='<div id="blue"></div></div>'
	 	//Will encapsulate the swatches
	 	//"swatch" refers to the user generated color swatch/box (modified by moving the sliders)
	 	//"randomSwatch" refers to the randomly generated color swatch
	 	output+='<div><div id="swatch_container">'
	 	output+='<div id="swatch"></div>'
	 	output+='<div id="randomSwatch"></div>'
	 	//The score information will be outputted to the "score" id
	 	output+='<div id="score"></div>'
	 	output+='</div></div>'
	 	output+='</div>'
	 	//The plugin itself will be outputted to the "game" id
	 	$("#game").html(output);
	 	//Remove load game button
		$("#load_game").remove();

		//e0 and e1 will be used to get the level of difficulty and number of turns
		//the user selected using the HTML option selectors
		var e0, e1 = 0;
		$(".button_base").html("<button class='start_game_button'>Start Game</button>");
		
		//After clicking to start the game
		$(".start_game_button").click(function() {
			//the level of difficulty and number of turns will be stored in a class object
			//called "settings"
			var e0 = document.getElementById("difficulty");
			settings.difficulty = e0.options[e0.selectedIndex].value;
			var e1 = document.getElementById("turns");
			settings.turns = e1.options[e1.selectedIndex].value;
			//The options selectors will then be removed
			$(".inner_container").remove();

			//The random color generated swatch will be created
			var red_r = Math.floor( (Math.random()*255) + 1 );
			var green_r = Math.floor( (Math.random()*255) + 1 );
			var blue_r = Math.floor( (Math.random()*255) + 1 );
			var hex_random = hexFromRGB(red_r, blue_r, green_r);
		 	var hex_random_swatch ='#'+hex_random;
		 	$( "#randomSwatch" ).css( "background-color", hex_random_swatch );

		 	//Show the sliders so the user can get a feel how they work
			$("#slider_container").show();
			$( "#red, #green, #blue" ).slider({
	      		orientation: "horizontal",
	      		range: "min",
	      		max: 255,
	      		value: 127,
	    	});

			//Insert a new button called "next_turn" that will allow the user to advance
			//in the game
			//Call the one_turn function, which simulates one turn in the ganme
		 	$(".button_base2").html("<button class='next_turn'>Next Turn</button>");
	    	one_turn(red_r,green_r,blue_r);
	    	//Hide the next turn button for the duration of the first turn
	    	$(".next_turn").hide();

	    	//Continue to call the one_turn function until the number of turns
	    	//which iterates down by 1, is equal to 0
	    	$(".next_turn").click(function(){ 
	    		$(".next_turn").hide();
	    		settings.turns = settings.turns - 1;
	    		refreshSlider();
	    		if(settings.turns == 0){
	    			totalScore();
	    			return;
	    		}
	    		one_turn(red_r, green_r, blue_r);
	    	});
	    });
	    return this;
		};
    
	})( jQuery );


	//Stores the number of turns the user wants to play the game for
	//as well as difficulty in a settings object
	function load_game(){
		$("body").hexed();
		//Starts time
	};