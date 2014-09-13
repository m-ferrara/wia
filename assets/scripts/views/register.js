define(['text!templates/register.html', 'models/Account'], function(registerTemplate, AccountModel) {
  var registerView = Backbone.View.extend({
    el: $('#content'),

	events: {
	  "click .submit" : "register"	
	},
	
	payload : {},
	
	populatePayload : function() {
		this.payload = new AccountModel( $("form").serializeObject() );
		return false;
	},
	
	validatePayload : function() {
		
	},
	
	submitPayload : function() {
//		$.ajax( $APP_URL_ROOT + '/webservice/user', {
		$.ajax( 'http://localhost:8888/WIA-FINAL/webservice/user', {
	  	method: "POST",
	  	dataType: "json",
	  	data : this.payload,
	  	success: successHandler,
	  	error: errorHandler
	  });	
	},
	
	errorHandler : function( errObjArr ) {
		
	},
	
	successHandler : function() {
		
	},
	
	register: function(e) {
		e.preventDefault();
	  	this.populatePayload();//,
	  	this.payload.save();
	 /*
	  isValid = that.validatePayload( payload );
					if (isValid) {
			 that.submitPayload();
		 }
		   */
	 console.info( this.payload );
	 window.persistModel = this.payload;
	},
	
    render: function() {
      this.$el.html(registerTemplate);
    }
  });

  return registerView;
});