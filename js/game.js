var GAME = GAME || {};

//==== TO DO ====//
// - Pretty up pinch animation

'use strict';

(function() {

	// Called in APP
	GAME.controller = {

		init: function() {
			GAME.sprite.init();
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

		init: function() {
			this.houseLevel();
			this.riverLevel();
			this.foodLevel();
			this.trashLevel();
		},

		showInfo: function(e) {
			console.log(e.target);
			this.hideInfo();
			$('.info').addClass('show');
		},

		hideInfo: function(e) {
			$('.info').removeClass('show');
		},

		checkLevel: function(levels, current, item) {
			$.each(levels, function(level, val) {
				if(current > val) {
					var level = level + 1; // So it gets the right level
					$('.' + item + ' img').attr('src', './img/' + item + '-' + level + '.png');
				}
			})
		},

		houseLevel: function() {
			var levels = [0, 100, 200],
				current = 136,
				item = 'energy';

			this.checkLevel(levels, current, item);
		},

		riverLevel: function() {
			var levels = [0, 100, 200],
				current = 60,
				item = 'river';

			this.checkLevel(levels, current, item);
		},

		foodLevel: function() {
			var levels = [0, 100, 200],
				current = 240,
				item = 'food';

			this.checkLevel(levels, current, item);
		},

		trashLevel: function() {
			var levels = [0, 100, 200],
				current = 20,
				item = 'trash';

			this.checkLevel(levels, current, item);
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