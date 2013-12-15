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
				elTap = $('.fa-circle'),
				body = $('.bg'),
				art = $('article'),
				tp = $('.toggle-progress'),
				mail = $('.mail'),
				mailSubmit = $('#mailuser');

			Hammer(field[0]).on('tap', function() { GAME.village.overviewVillages(event); });
			Hammer(field[0]).on('swipedown', function() { GAME.village.localVillage(event); });

			elTap.on('click', function() { GAME.sprite.showInfo(event) });
			sidebar.on('click', function() { GAME.village.sidebar(event) });
			body.on('click', function() { GAME.sprite.hideInfo(event) });
			tp.on('click', function() { GAME.profile.showProgress(event) });
			mail.on('click', function() { APP.layout.popup(event) });
			mailSubmit.on('submit', function() { GAME.profile.mailUser(event) });
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
			$(p).toggle();
		},

		mailUser: function(e) {
			e.preventDefault();

			var self = e.target,
				subj = $(self).find('.subject')[0],
				msg = $(self).find('.message')[0];

			$.post(
				'./inc/actions/mail.php', {
					subject: $(subj).val(),
					message: $(msg).val()
				})
				.done(function() {
					console.log('done');
					APP.layout.hidePopup();
				});

			return false;
		}

	}


	GAME.village = {

    	sidebar: function(e) {
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