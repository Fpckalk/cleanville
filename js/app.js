// Not using Backbone yet.
// Will convert it later on if needed.


var APP = APP || {};

'use strict';

(function() {

	APP.controller = {

		init: function() {
			APP.router.init();
			APP.layout.hacks();
			APP.controller.enable();
		},

		enable: function() {
			var	editGoal = $('.edit-goal'),
				goalForm = $('.popup #goalform'),
				popupCross = $('.popup .fa-times'),
				cancel = $('.cancel'),
				mail = $('#menu i'),
				mailForm = $('#mail'),
				toggleTip = $('.tip i'),
				sensor = $('.sensor'),
				sensorCheck = $('#sensors button');

			editGoal.on('click', function() { APP.layout.popup(event) });
			goalForm.on('submit', function() { APP.layout.submitGoal(event) });
			popupCross.on('click', function() { APP.layout.hidePopup() });
			cancel.on('click', function() { APP.layout.hidePopup() })
			mail.on('click', function() { APP.layout.popup(event) });
			mailForm.on('submit', function() { APP.mail.sendMail(event) });
			toggleTip.on('click', function() { APP.layout.tip(event) });
			sensor.on('click', function() { APP.layout.toggleSensor(event) });
			sensorCheck.on('click', function() { APP.layout.checkSensor(event) });
		}

	};

	APP.layout = {

		hacks: function() {
			var a = document.getElementsByTagName("a");
			for(var i=0;i<a.length;i++) {
			    if(!a[i].onclick && a[i].getAttribute("target") != "_blank") {
			        a[i].onclick=function() {
		                window.location=this.getAttribute("href");
		                return false; 
			        }
			    }
			}

			// document.ontouchmove = function(e) {return false};
			// $('article').ontouch = function(e) {e.stopPropagation()};
			$('.sidebar .content').ontouchmove = function(e) {e.stopPropagation()};
		},

		popup: function(e) {
			$('.popup').show();
			this.cancel(true);
		},

		hidePopup: function(e) {
			$('.popup').hide();
			$('.info').removeClass('show');
			$('.cancel').hide();
		},

		cancel: function(d) {
			$('.cancel').show();
			if(d) { $('.cancel').addClass('darken') };
		},

		tip: function(e) {
			var self = e.target,
				tip = self.parentElement;
				
			$(self).toggleClass('out');
			$(tip).toggleClass('out');
		},

		toggleSensor: function(e) {
			var self = e.target;
			$(self).toggleClass('off');
		},

		checkSensor: function(e) {
			var self = e.target;
			$(self).next('span').show();
		},

		submitGoal: function(e) {
			e.preventDefault();

			var self = e.target,
				goal = $(self).find('.goal')[0],
				start = $(self).find('.starting-date')[0],
				end = $(self).find('.ending-date')[0],
				type = window.location.hash.slice(2);

			$.post(
				'./inc/actions/goal.php', {
					goal: $(goal).val(),
					start: $(start).val(),
					end: $(end).val(),
					type: type
				})
				.done(function() {
					// Don't judge me...
					$(self).parent().prev('.goal').find('span').text($(goal).val());
					APP.layout.hidePopup();
				});

			return false;			
		},

		getCurrent: function(e) {
			var currentWidth = (current / goal) * 100;
			$('figure.progress .current').width(currentWidth + "%");
			$('.progress-percentage').css({
				left: currentWidth + "%",
				"margin-left": "-" + $('.progress-percentage').width() + "px"
			});
		}

	}

	APP.mail = {

		setRecipient: function(e) {
			var self = e.target,
				name = "";

			name = $(self).prevAll('h1').text();
			name = name.split(" ");
			name = name[1];

			$('.popup #mailuser input[name="recipient"]').val(name);

		},

		sendMail: function(e) {
			e.preventDefault();

			var self = e.target,
				to = $(self).find('input[name="recipient"]')[0],
				subj = $(self).find('.subject')[0],
				msg = $(self).find('.message')[0];

			$.post(
				'./inc/actions/mail.php', {
					to: $(to).val(),
					subject: $(subj).val(),
					message: $(msg).val()
				})
				.done(function() {
					APP.layout.hidePopup();
				});

			return false;
		}

	}

	APP.dataviz = {

		draw: function(dataset) {

			// Remove any previous graphs
			d3.select(".graph svg")
				.remove();

			var data = dataset;

			var route = window.location.hash.slice(2);

			var margin = {top: 20, right: 20, bottom: 30, left: 40},
				width = 400 - margin.left - margin.right,
				height = 240 - margin.top - margin.bottom;
			
			var svg = d3.select("article[data-route=" + route + "] .graph")
				.append("svg")
				.attr("width", width + margin.left + margin.right)
				.attr("height", height + margin.top + margin.bottom)
				.append("g")
				.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

			var yScale = d3.scale.linear()
				.domain([0, 20])
				.range([height, 0]);

			var xScale = d3.scale.linear()
				.domain([0, 10])
				.range([0, width]);

			var yAxis = d3.svg.axis()
				.scale(yScale)
				.ticks(5)
				.orient("left");

			var xAxis = d3.svg.axis()
				.scale(xScale)
				.orient("bottom");

			svg.append("g")
				.attr("class", "y axis")
				.call(yAxis);

			svg.append("g")
				.attr("class", "x axis")
				.attr("transform", "translate(0," + height + ")")
				.call(xAxis);

			svg.selectAll("rect")
				.data(data)
				.enter()
				.append("rect")
				.attr("width", 20)
				.attr("height", function(d) {
					return d * 10;
				})
				.attr("y", function(d) {
					return height - (d * 10);
				})
				.attr("x", function(d) {
					return xScale(d) - 10;
				});

		}

	}


	APP.router = {

	    // The functionality of Routie lies in that it can differentiate links
	    // and add functions to the links called.
	    // Thus you can 'switch' pages without using another request.
	    init: function() {
	        routie({

	        	'/general': function() {
	        		APP.settings.general();
	        	},

	        	'/notifications': function() {
	        		APP.settings.notifications();
	        	},

	        	'/linkedmedia': function() {
	        		APP.settings.linkedmedia();
	        	},

	        	'/contact': function() {
	        		APP.settings.contact();
	        	},

	        	'/summary': function() {
	        		APP.stats.general();
	        	},

	        	'/water': function() {
	        		APP.stats.water();
	        	},

	        	'/energy': function() {
	        		APP.stats.energy();
	        	},

	        	'/food': function() {
	        		APP.stats.food();
	        	},

	        	'/waste': function() {
	        		APP.stats.waste();
	        	},

	        	'/profile': function() {
	        		APP.profile.profile();
	        	},

	        	'/edit': function() {
	        		APP.profile.edit();
	        	},

	            '*': function() {
	            	
	            }

	        });
	    },

	    // Checks whether the current 'page' should be active
	    change: function () {

	        var route = window.location.hash.slice(2),
                articles = $('article[data-route]'),
                article = $('[data-route=' + route + ']')[0];

                if(route != 'profile' && route != 'edit') {
	                var	navItems = $('a[data-nav]'),
	                	navItem = $('[data-nav=' + route + ']')[0];
                }

	        // Show active article, hide all other
	        if (article) {
                for (var i=0; i < articles.length; i++){
                        articles[i].classList.remove('active');

                        if(route != 'profile' && route != 'edit') {
                        	navItems[i].classList.remove('active');
                        }
                }
                article.classList.add('active');

                if(route != 'profile' && route != 'edit') {
                	navItem.classList.add('active');
                }
			}

			// Default route
			if (!route) {
				articles[0].classList.add('active');
			}

		}

	};


    APP.settings = {

    	general: function() {
    		APP.router.change();
    	},

    	notifications: function() {
    		APP.router.change();
    	},

    	linkedmedia: function() {
    		APP.router.change();
    	},

    	contact: function() {
    		APP.router.change();
    	}

    };

    APP.stats = {

    	general: function() {
    		var data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    		APP.router.change();
    		APP.dataviz.draw(data);
    		APP.layout.getCurrent();
    	},

    	water: function() {
    		var data = [5, 7, 2, 4, 4, 5, 8, 9, 10, 6];
    		APP.router.change();
    		APP.dataviz.draw(data);
    		APP.layout.getCurrent();
    	},

    	energy: function() {
    		var data = [2, 9, 6, 7, 4, 1, 8, 10, 9, 3];
    		APP.router.change();
    		APP.dataviz.draw(data);
    		APP.layout.getCurrent();
    	},

    	food: function() {
    		var data = [4, 4, 6, 8, 8, 7, 5, 2, 3, 2];
    		APP.router.change();
    		APP.dataviz.draw(data);
    		APP.layout.getCurrent();
    	},

    	waste: function() {
    		var data = [9, 8, 7, 6, 5, 6, 6, 7, 7, 6];
    		APP.router.change();
    		APP.dataviz.draw(data);
    		APP.layout.getCurrent();
    	}

    };

    APP.profile = {

    	profile: function() {
    		APP.router.change();
    	},

    	edit: function() {
    		APP.router.change();
    	}

    }

    $(document).ready(function() {
    	APP.controller.init();
    })

})();