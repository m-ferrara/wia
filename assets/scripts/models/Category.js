define(function(require){

var Category = Backbone.Model.extend({
    urlRoot: 'http://localhost/WIA-APP/webservice/category',
    idAttribute: 'cat_id' 
});

  return Category;
});