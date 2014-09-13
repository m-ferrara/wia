// boot.js  Backbone Dependencies and App.init()
var $isMac = (window.navigator.userAgent.indexOf("Mac") > -1) ? true : false; 

var $APP_URL_ROOT = ($isMac) ? 'http://localhost:8888/WIA/' : 'http://localhost/WIA/';
var $ASSETS_URL_ROOT = $APP_URL_ROOT + 'assets';

require.config({
  // baseUrl: 'http://localhost/WIA-APP/assets'
  //,
  paths: {
    jQuery: $ASSETS_URL_ROOT + '/scripts/libs/jquery'
	,jQueryMigrate: $ASSETS_URL_ROOT + '/scripts/libs/jquery-migrate'
	,Underscore: $ASSETS_URL_ROOT + '/scripts/libs/underscore'
	,Backbone: $ASSETS_URL_ROOT + '/scripts/libs/backbone'
	,text: $ASSETS_URL_ROOT + '/scripts/libs/text'
	,templates: $ASSETS_URL_ROOT + '/templates'
	,Kinetic: $ASSETS_URL_ROOT + '/scripts/libs/kinetic'
  }
  
  ,shim: {
    'jQuery' : {
        exports: "jQuery"
    },
	'jQueryMigrate' : {
		deps: ['jQuery']
	}
    ,'Backbone' : ['Underscore','jQuery','jQueryMigrate']
	,'WaterInfographic': ['Backbone','Kinetic']
  }
});


require(['WaterInfographic'], function(WaterInfographic) {
	WaterInfographic.initialize();
});