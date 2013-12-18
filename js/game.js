var GAME = GAME || {};

//==== TO DO ====//
// - Pretty up pinch animation

'use strict';

(function() {

	// Called in APP
	GAME.controller = {

		init: function() {
			// GAME.sprite.init();
			this.enable();
		},

		enable: function() {
			var field = $('article #game'),
				sidebar = $('article .sidebar #pullout i'),
				elTap = $('.circle'),
				body = $('.bg'),
				art = $('article'),
				tp = $('.toggle-progress'),
				mail = $('.mail'),
				mailSubmit = $('#mailuser'),
				infoToggle = $('.info .how i');

			Hammer(field[0]).on('swipeup', function() { GAME.village.overviewVillages(event); });
			Hammer(field[0]).on('swipedown', function() { GAME.village.localVillage(event); });

			elTap.on('click', function() { GAME.sprite.showInfo(event) });
			sidebar.on('click', function() { GAME.village.sidebar(event) });
			body.on('click', function() { GAME.sprite.hideInfo(event) });
			tp.on('click', function() { GAME.profile.showProgress(event) });
			mail.on('click', function() { APP.layout.popup(event) });
			mailSubmit.on('submit', function() { APP.mail.sendMail(event) });
			infoToggle.on('click', function() { GAME.sprite.how(event) });


			// Metabolic Chars
			setTimeout( "GAME.sprite.metabolic()", 8000 );
			$('#chars img').on('click', function(event) {
				var self = event.target;
				$(self).height(40);
				$(self).width(60);
				$(self).animate({
					height: '40px',
					width: '60px'
					}, 300, function() {
					$(self).css({
						height: '100%',
						width: 'auto'
					});
				});
			});

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
			var self = ($(e.target).hasClass('circle')) ? e.target : $(e.target).parent('.circle'),
				info = $(self).next('.info');

			event.stopPropagation();

			this.hideInfo();
			$(info).addClass('show');
			APP.layout.cancel(false);
			APP.layout.getCurrent();
		},

		hideInfo: function(e) {
			$('.info').removeClass('show');
		},

		how: function(e) {
			$(e.target).next('p').toggle();
			$(e.target).toggleClass('out');
		},

		metabolic: function() {
			$('#chars').show();
			// Apparently only showing the characters triggers the animation
		},

		// Made this in PHP instead
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

	GAME.profile = {

		showProgress: function(e) {
			var p = $(e.target).next('.progress');
			$(e.target).toggleClass('out');
			$(p).toggle();
		}

	}


	GAME.village = {

    	sidebar: function(e) {
    		APP.layout.getCurrent();
    		$('.sidebar').toggleClass('out');
    		$(e.target).toggleClass('out');
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

})();;