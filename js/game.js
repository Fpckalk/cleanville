var GAME = GAME || {};

'use strict';

(function() {

	// Called in APP
	GAME.controller = {

		init: function() {
			console.log('Game on');
			GAME.sprite.houseLevel();
		}, 


	}


	GAME.sprite = {

		houseLevel: function() {
			levels = {
				"1": 100,
				"2": 200,
				"3": 300
			}
			var current = 210;

			$.each(levels, function(level, val) {
				 if(current > val) {
				 	console.log(level);
				 	$('.house img').attr('src', 'http://placehold.it/120x120&text=House' + level);
				 }
			});			
		}

	}

})();