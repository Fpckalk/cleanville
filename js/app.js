// Not using Backbone yet.
// Will convert it later on if needed.


var APP = APP || {};

'use strict';

(function() {

	APP.controller = {

		init: function() {
			APP.router.init();
			APP.controller.enable();
		},

		enable: function() {
			var sidebar = $('article[data-route=schoondorp] .sidebar .pullout')[0];
			Hammer(sidebar).on('drag', function() { APP.sidebar.drag(event); });
			Hammer(sidebar).on('dragend', function() { APP.sidebar.dragEnd(event); });
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

	            '*': function() {
	            	
	            }

	        });
	    },

	    // Checks whether the current 'page' should be active
	    change: function () {

	        var route = window.location.hash.slice(2),
                articles = $('article[data-route]'),
                article = $('[data-route=' + route + ']')[0];

            console.log(article);

	        // Show active article, hide all other
	        if (article) {
                for (var i=0; i < articles.length; i++){
                        articles[i].classList.remove('active');
                }
                article.classList.add('active');
			}

			// Default route
			if (!route) {
				articles[0].classList.add('active');
			} else {

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


    APP.sidebar = {

    	drag: function(e) {
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

    	dragEnd: function(e) {
    		var	sidebarWidth = $('.sidebar .content').width(),
    			distance = e.gesture.deltaX + sidebarWidth;

			$('.sidebar').addClass("animated");
    		if(distance < 80) {
    			$('.sidebar').css("right", 0);
    		} else {
    			$('.sidebar').css("right", -sidebarWidth)
    		}
    	}

    }


    $(document).ready(function() {
    	APP.controller.init();
    })

})();