define(['models/CategoryCollection','models/TagCollection'],function(CategoryCollection, TagCollection){

var GraphicCollection = Backbone.Model.extend({
	categories: new CategoryCollection(),
	tags: new TagCollection()
});

  return GraphicCollection;
});