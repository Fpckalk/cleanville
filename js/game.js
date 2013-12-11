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
				sidebar = $('article .sidebar .pullout'),
				elTap = $('.fa-circle'),
				famTap = $('#overview img'),
				body = $('.bg'),
				art = $('article');

			Hammer(sidebar[0]).on('drag', function() { GAME.gestures.dragSidebar(event); });
			Hammer(sidebar[0]).on('dragend', function() { GAME.gestures.dragEndSidebar(event); });

			Hammer(field[0]).on('tap', function() { GAME.gestures.overviewVillages(event); });
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
					$('.' + item + ' img').attr('src', './img/game/' + item + '-' + level + '.png');
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

    	dragSidebar: function(e) {
    		var sidebarWidth = $('.sidebar .content').width(),
    			distance = e.gesture.deltaX + sidebarWidth;

    		$('.sidebar').removeClass("animated");
    		console.log(distance);
    		if(e.gesture.direction === "right") {
    			distance -= sidebarWidth;
    		}

    		if( distance > 0 && distance < sidebarWidth ) {
				$('.sidebar').css("right", -distance);
				console.log($('.sidebar').css("right"));
    		}
    	},

    	dragEndSidebar: function(e) {
    		var	sidebarWidth = $('.sidebar .content').width(),
    			distance = e.gesture.deltaX + sidebarWidth;

			$('.sidebar').addClass("animated");
    		if(distance < 80) {
    			$('.sidebar').css("right", 0);
    		} else {
    			$('.sidebar').css("right", -sidebarWidth)
    		}
    	},

		overviewVillages: function(e) {
			$('#game #local').hide();
			$('#game #overview').show();
			GAME.sprite.hideInfo();
		},

		localVillage: function(e) {
			console.log(e);
			e.preventDefault();
			$('#game #local').show();
			$('#game #overview').hide();
			GAME.sprite.hideInfo();
		}

	};

	GAME.controller.init();

})();