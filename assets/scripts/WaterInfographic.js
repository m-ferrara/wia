define(['router'], function(router) {
	var initialize = function() {
		// set X-API-KEY
		$.ajaxSetup({
		  	  headers: { 'X-API-KEY': 'mykey' }
			});
		
	  // check for login status and route accordingly
	  checkLogin(runApplication);
	};
	
	var checkLogin = function(callback) {
		$.ajax($APP_URL_ROOT + "webservice/user/authenticated", {
			method: "GET",
			success: function() {
				return callback(true);
			},
			error: function(data) {
				return callback(false);
			}
		});
	};
	
	var runApplication = function(authenticated) {
		if (!authenticated) {
			window.location.hash = 'infographic';
			//jQuery("content")
		} else {
			window.location.hash = 'index';
		}
		
		Backbone.history.start();
	};
	
	return {
	  initialize: initialize
	};
});