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
			$('.edit-goal').on('click', function() { APP.layout.popup(event) });
			$('.popup #goalform').on('submit', function() { APP.layout.submitGoal(event) });
			$('.popup .fa-times').on('click', function() { APP.layout.hidePopup() });
			$('.cancel').on('click', function() { APP.layout.hidePopup() })
			$('#menu i').on('click', function() { APP.layout.popup(event) });
			$('#mail').on('submit', function() { APP.mail.sendMail(event) });
			$('.tip i').on('click', function() { APP.layout.tip(event) });
			$('.sensor').on('click', function() { APP.layout.toggleSensor(event) });
			$('#sensors button').on('click', function() { APP.layout.checkSensor(event) });
			$('#goalform .goal').on('change', function() { APP.layout.showGoal(event) });
			$('.window.w1 button').on('click', function() { APP.layout.showTips(event) });
			$('.window.w1 li p').on('click', function() { APP.layout.fullTip(event) });
			$('.change-temp .tempup').on('click', function() { APP.layout.tempUp(event); });
			$('.change-temp .tempdown').on('click', function() { APP.layout.tempDown(event); });
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

		tempUp: function(e) {
			var curTemp = parseInt($('span.temperature').text());
			if(curTemp < 26) { curTemp++; }
			$('span.temperature').text(curTemp);
		},

		tempDown: function(e) {
			var curTemp = parseInt($('span.temperature').text());
			if(curTemp > 12) { curTemp--; }
			$('span.temperature').text(curTemp);
		},

		showTips: function(e) {
			$('.window.w1 ul').css('display', 'block');
			$('.window.w1 p:first').hide();
		},

		fullTip: function(e) {
			$(e.target).toggleClass('show');
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

		showGoal: function(e) {
			var val = e.target.value;

			$('.goalvalue').html('&euro; ' + val);
			$('.goalvalue').css({
				left: val + '%',
				'margin-left': '-' + $('.goalvalue').width()
			});
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

		getCurrent: function(type) {
			var goal = eval(type);
			var currentWidth = (current / goal) * 100;
			$('.full-progress-bar figure.progress .current').css('width', currentWidth + "%");
			$('.full-progress-bar .progress-percentage').css({
				left: currentWidth + "%",
				"margin-left": "-" + $('.full-progress-bar .progress-percentage').width() + "px"
			});
		}

	};

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

	};

	APP.dataviz = {

		draw: function(dataset) {

			// Remove any previous graphs
			d3.select(".graph svg")
				.remove();

			var data = dataset;

			var route = window.location.hash.slice(2);

			// helper function
		   function getDate(d) {
		       return new Date(d.date);
		   }
		   
			// get max and min dates - this assumes data is sorted
			var minDate = getDate(data[0]),
				maxDate = getDate(data[data.length-1]);

			var w = 400,
				h = 240,
				p = 25,
				y = d3.scale.linear().domain([0, 30]).range([h, 0]),
				x = d3.time.scale().domain([minDate, maxDate]).range([0, w]);

			var vis = d3.select("article[data-route=" + route + "] .graph")
				.data([data])
				.append("svg:svg")
				.attr("width", w + p * 2)
				.attr("height", h + p * 2)
				.append("svg:g")
				.attr("transform", "translate(" + p + "," + p + ")");

			var xrules = vis.selectAll("g.rule")
				.data(x.ticks(5))
				.enter().append("svg:g")
				.attr("class", "rule");

			var yrules = vis.selectAll("g.yrule")
				.data(y.ticks(5))
				.enter().append("svg:g")
				.attr("class", "yrule");

			yrules.append("svg:line")
				.attr("x1", x)
				.attr("x2", x)
				.attr("y1", 0)
				.attr("y2", h - 1);

			xrules.append("svg:line")
				.attr("class", function(d) { return d ? null : "axis"; })
				.attr("y1", y)
				.attr("y2", y)
				.attr("x1", 0)
				.attr("x2", w + 1);

			xrules.append("svg:text")
				.attr("x", x)
				.attr("y", h + 3)
				.attr("dy", ".71em")
				.attr("text-anchor", "middle")
				.text(x.tickFormat(10));

			yrules.append("svg:text")
				.attr("y", y)
				.attr("x", -7)
				.attr("dy", ".35em")
				.attr("text-anchor", "end")
				.text(y.tickFormat(10));

			vis.append("svg:path")
				.attr("class", "line")
				.attr("d", d3.svg.line()
					.x(function(d) { return x(getDate(d)) })
					.y(function(d) { return y(d.usage) })
				);

			vis.selectAll("circle.line")
				.data(data)
				.enter().append("svg:circle")
				.attr("class", "line")
				.attr("cx", function(d) { return x(getDate(d)) })
				.attr("cy", function(d) { return y(d.usage); })
				.attr("r", 6);

		}

	};


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
    		var data = [
    			{ "date":"12\/13\/13", "usage":4 },
    			{ "date":"12\/14\/13", "usage":12 },
    			{ "date":"12\/15\/13", "usage":2 },
    			{ "date":"12\/16\/13", "usage":4 },
    			{ "date":"12\/17\/13", "usage":14 },
    			{ "date":"12\/18\/13", "usage":20 },
    			{ "date":"12\/19\/13", "usage":21 },
    			{ "date":"12\/20\/13", "usage":17 }
    			];

    		APP.router.change();
    		APP.dataviz.draw(data);
    		APP.layout.getCurrent('summary');
    	},

    	water: function() {
    		var data = [
    			{ "date":"12\/13\/13", "usage":12 },
    			{ "date":"12\/14\/13", "usage":6 },
    			{ "date":"12\/15\/13", "usage":4 },
    			{ "date":"12\/16\/13", "usage":8 },
    			{ "date":"12\/17\/13", "usage":10 },
    			{ "date":"12\/18\/13", "usage":11 },
    			{ "date":"12\/19\/13", "usage":8 },
    			{ "date":"12\/20\/13", "usage":5 }
    			];

    		APP.router.change();
    		APP.dataviz.draw(data);
    		APP.layout.getCurrent('water');
    	},

    	energy: function() {
    		var data = [
    			{ "date":"12\/13\/13", "usage":12 },
    			{ "date":"12\/14\/13", "usage":12 },
    			{ "date":"12\/15\/13", "usage":14 },
    			{ "date":"12\/16\/13", "usage":18 },
    			{ "date":"12\/17\/13", "usage":26 },
    			{ "date":"12\/18\/13", "usage":25 },
    			{ "date":"12\/19\/13", "usage":20 },
    			{ "date":"12\/20\/13", "usage":19 }
    			];

    		APP.router.change();
    		APP.dataviz.draw(data);
    		APP.layout.getCurrent('energy');
    	},

    	food: function() {
    		var data = [
    			{ "date":"12\/13\/13", "usage":2 },
    			{ "date":"12\/14\/13", "usage":4 },
    			{ "date":"12\/15\/13", "usage":4 },
    			{ "date":"12\/16\/13", "usage":0 },
    			{ "date":"12\/17\/13", "usage":0 },
    			{ "date":"12\/18\/13", "usage":6 },
    			{ "date":"12\/19\/13", "usage":8 },
    			{ "date":"12\/20\/13", "usage":7 }
    			];

    		APP.router.change();
    		APP.dataviz.draw(data);
    		APP.layout.getCurrent('food');
    	},

    	waste: function() {
    		var data = [
    			{ "date":"12\/13\/13", "usage":4 },
    			{ "date":"12\/14\/13", "usage":5 },
    			{ "date":"12\/15\/13", "usage":4 },
    			{ "date":"12\/16\/13", "usage":7 },
    			{ "date":"12\/17\/13", "usage":7 },
    			{ "date":"12\/18\/13", "usage":6 },
    			{ "date":"12\/19\/13", "usage":8 },
    			{ "date":"12\/20\/13", "usage":11 }
    			];

    		APP.router.change();
    		APP.dataviz.draw(data);
    		APP.layout.getCurrent('waste');
    	}

    };

    APP.profile = {

    	profile: function() {
    		APP.router.change();
    	},

    	edit: function() {
    		APP.router.change();
    	}

    };

    $(document).ready(function() {
    	APP.controller.init();
    })

})();