define(['models/Tag'],function(Tag){

var TagCollection = Backbone.Collection.extend({
	model: Tag
	,url: $APP_URL_ROOT + 'webservice/tags'
});

  return TagCollection;
});