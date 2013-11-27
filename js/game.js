var GAME = GAME || {};

'use strict';

(function() {

	// Called in APP
	GAME.controller = {

		init: function() {
			GAME.sprite.houseLevel();
			this.enable();
		},

		enable: function() {
			var field = $('article #game');
			Hammer(field[0]).on('pinchin', function() { GAME.gestures.overviewVillages(event); });
			Hammer(field[0]).on('pinchout', function() { GAME.gestures.localVillage(event); });
		}

	};


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

	};


	GAME.gestures = {

		overviewVillages: function(e) {
			if($('#game #local').hasClass('visible')) {
				$('#game #local').removeClass('visible');
				$('#game #overview').addClass('visible');
			}
		},

		localVillage: function(e) {
			if($('#game #overview').hasClass('visible')) {
				$('#game #overview').removeClass('visible');
				$('#game #local').addClass('visible');
			}
		}

	};

})();