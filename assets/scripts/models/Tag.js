define(function(require){

var Tag = Backbone.Model.extend({

    urlRoot: 'http://localhost/WIA-APP/webservice/tag',
    idAttribute: 'tag_id'
    	
});

  return Tag;
});