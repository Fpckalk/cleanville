var GAME = GAME || {};

//==== TO DO ====//
// - Pretty up pinch animation

'use strict';

(function() {

	// Called in APP
	GAME.controller = {

		init: function() {
			GAME.sprite.houseLevel();
			this.enable();
		},

		enable: function() {
			var field = $('article #game'),
				elTap = $('.fa-circle'),
				famTap = $('#overview img'),
				body = $('.bg');

			Hammer(field[0]).on('swipeup', function() { GAME.gestures.overviewVillages(event); });
			Hammer(field[0]).on('swipedown', function() { GAME.gestures.localVillage(event); });

			elTap.on('click', function() { GAME.sprite.showInfo(event); });
			famTap.on('click', function() { GAME.sprite.showInfo(event); });
			body.on('click', function() { GAME.sprite.hideInfo(event); });
		}

	};


	GAME.sprite = {

		showInfo: function(e) {
			console.log(e.target);
			this.hideInfo();
			$('.info').addClass('show');
		},

		hideInfo: function(e) {
			$('.info').removeClass('show');
		},

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
				GAME.sprite.hideInfo();
			}
		},

		localVillage: function(e) {
			if($('#game #overview').hasClass('visible')) {
				$('#game #overview').removeClass('visible');
				$('#game #local').addClass('visible');
				GAME.sprite.hideInfo();
			}
		}

	};

})();