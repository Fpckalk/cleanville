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

	                '/dashboard': function() {
	                	APP.page.dashboard();
	                },

	                '/login': function() {
	                	APP.page.login();
	                },

	                '/schoondorp': function() {
	                	APP.page.schoondorp();
	                },

	                '*': function() {
	                    APP.page.dashboard();
	                }

	            });
	    },

	    // Checks whether the current 'page' should be active
	    change: function () {

	        var route = window.location.hash.slice(2),
                articles = $('article[data-route]'),
                article = $('[data-route=' + route + ']')[0];

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
				$('header > a[role=back]').show();
			}

		}

	};


    APP.page = {

    	dashboard: function() {
    		APP.router.change();
    	},

    	login: function() {
    		APP.router.change();
    	},

    	schoondorp: function() {
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