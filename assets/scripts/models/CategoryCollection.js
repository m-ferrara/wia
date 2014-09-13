define(['models/Category'],function(Category){

var CategoryCollection = Backbone.Collection.extend({
	model: Category
	,url: $APP_URL_ROOT + 'webservice/categories'
});

  return CategoryCollection;
});