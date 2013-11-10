// Not using Backbone yet.
// Will convert it later on if needed.


var APP = APP || {};

'use strict';

(function() {

	APP.controller = {

		init: function() {
			APP.router.init();
			APP.controller.enable();
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

    $(document).ready(function() {
    	APP.controller.init();
    })

})();