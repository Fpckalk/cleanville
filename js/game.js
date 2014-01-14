var GAME = GAME || {};

//==== TO DO ====//
// - Pretty up pinch animation

'use strict';

(function() {

	// Called in APP
	GAME.controller = {

		init: function() {
			this.enable();
			GAME.village.localVillage();
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
				infoToggle = $('.info .how i'),
				help = $('.help');

			Hammer(field[0]).on('pinchin', function() { GAME.village.overviewVillages(event); });
			Hammer(field[0]).on('pinchout', function() { GAME.village.localVillage(event); });

			elTap.on('click', function() { GAME.sprite.showInfo(event) });
			sidebar.on('click', function() { GAME.village.sidebar(event) });
			body.on('click', function() { GAME.sprite.hideInfo(event) });
			tp.on('click', function() { GAME.profile.showProgress(event) });
			mail.on('click', function() { APP.layout.popup(event) });
			mail.on('click', function() { APP.mail.setRecipient(event) });
			mailSubmit.on('submit', function() { APP.mail.sendMail(event) });
			infoToggle.on('click', function() { GAME.sprite.how(event) });
			help.on('click', function() { GAME.village.overviewVillages() });

			// Metabolic Chars
			setTimeout( "GAME.sprite.metabolic()", 14000 );
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
		}

	};

	GAME.profile = {

		showProgress: function(e) {
			var p = $(e.target).next('.progress-window');
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
			GAME.progress.getProgress('water');
			GAME.progress.getProgress('energy');
			GAME.progress.getProgress('food');
			GAME.progress.getProgress('waste');
		},

		localVillage: function(e) {
			if(e) { e.preventDefault() };
			$('#game #local').show();
			$('#game #overview').hide();
			GAME.sprite.hideInfo();
			GAME.progress.getProgress('water');
			GAME.progress.getProgress('energy');
			GAME.progress.getProgress('food');
			GAME.progress.getProgress('waste');
		},

		help: function() {
			$('.game #local > span').addClass('in');
		}

	};

	GAME.progress = {

		getProgress: function(type) {
			var progression = eval('progress_' + type);

			var currentWidth = (progression / 300) * 100;
			$('.full-progress-bar.' + type + ' figure.progress .current').css('width', currentWidth + "%");
			$('.full-progress-bar.' + type + ' .progress-percentage').css({
				left: currentWidth + "%",
				"margin-left": "-" + $('.full-progress-bar.' + type + ' .progress-percentage').width() + "px"
			});
		}

	};

	GAME.controller.init();

})();;