define(['text!templates/infographic.html'], function(infographicTemplate) {
	
  var infographicView = Backbone.View.extend({
    el: $('#infographic-stage'),
    
    coordinates: {
	  height : window.innerHeight,
	  width : window.innerWidth,
	  xCenter : (window.innerWidth / 2),
	  yCenter : (window.innerHeight / 2)
	},
	
	that : this,
    
    QuadrantFactors: [{
                    	   Q : 0,
                    	   X : +1,
                    	   Y : -1
                       },
                       {
                    	   Q : 1,
                    	   X : -1,
                    	   Y : -1  
                       },
                       {
                    	   Q : 2,
                    	   X : -1,
                    	   Y : -1
                       },
                       {
                    	   Q : 3,
                    	   X : +1,
                    	   Y : -1
                       }],
    
    getQuadrantFactors: function( itemQuadrant ) {
		for (var i=0; i<4; i++){
			if (itemQuadrant == this.QuadrantFactors[i].Q) {
				return {
					X: this.QuadrantFactors[i].X,
					Y: this.QuadrantFactors[i].Y
				};
			}
		}
	},
    
    assignItemQuadrant: function(ItemNo, ItemDegrees) {
    	var QUADRANTS = [{ Q: 0, deg: 90}, {Q: 1, deg: 180}, {Q: 2, deg: 270}, {Q:3, deg: 360 }];
    	for (var i=0; i<4; i++){
    		if (QUADRANTS[i].deg >= ItemDegrees) {
    			var factors = this.getQuadrantFactors( QUADRANTS[i].Q );
    			return {
    				Item: ItemNo,
    				Degrees: ItemDegrees,
    				Q: QUADRANTS[i].Q,
    				X: factors.X,
    				Y: factors.Y
    			};
    		}
    	}
    },
    
    infographicObject : function( jsonDATA ) {
    	var noItems = jsonDATA.length,
    		degPerItem = 360 / noItems,
    		itemsObjArr = [];
    		
    		for (var i=0; i<noItems; i++) {
    			currentItemDegrees = i * degPerItem;
    			var itemObj = this.assignItemQuadrant(i, currentItemDegrees);
    			itemsObjArr.push(itemObj);
    		}
    		return itemsObjArr;
    },
    
    initialize: function() {
	  this.collection.on('reset', this.render, this);
	  this.collection.on('sync', this.render, this);
	  this.coordinates = {
			  height : window.innerHeight,
			  width : window.innerWidth,
			  xCenter : window.innerWidth / 2,
			  yCenter : window.innerHeight / 2
	  };
  	},
    
    render: function() {
  		var that = this;
  		var $RADIUS = 250;
  		var $_X_Offset = 15;
  		this.$el.html(infographicTemplate);
     // this.$el.html(_.template(infographicTemplate, {  collection: this.collection.toJSON() }));
      var stage = new Kinetic.Stage({
	    	  container: 'infographic-stage',
	    	  width: this.coordinates.width,
	    	  height: this.coordinates.height
    	});
      
      var layer = new Kinetic.Layer();

      // var TagsJSON = this.collection.toJSON();
      
      var CategoriesJSON = this.collection.toJSON();
  //    console.log( CategoriesJSON.length );
      window.ItemsOBJ = this.infographicObject(CategoriesJSON);
  //    console.log( ItemsOBJ );
      console.log( this.coordinates );

      //  	  var totalCircles = TagsJSON.models.length;

      //  	  console.log( totalCircles );
      
      _.each(CategoriesJSON, function(category, index) {
    	  $_X_Offset += 50;
    	  console.log (index);
    	  var Xcoord = (ItemsOBJ[index].X) * Math.cos(ItemsOBJ[index].Degrees) * $RADIUS + ( that.coordinates.xCenter );
    	  var Ycoord = (ItemsOBJ[index].Y) * Math.sin(ItemsOBJ[index].Degrees) * $RADIUS + ( that.coordinates.yCenter );
    	  console.log (Xcoord + ' ' + Ycoord);
//          var layer = new Kinetic.Layer();
    	  var circle = new Kinetic.Circle({
							    x: Xcoord,
							    y: Ycoord,
							    radius: 75,
							    fill: '#08266C',
							    stroke: '#6C8CD5',
							    strokeWidth: 2
    	  				});
 /*     tag.tag_id 
      tag.tag 
       tag.cat_id */
    	  var text = new Kinetic.Text({
    		  	text: category.cat,
    		    fontSize: 16,
    		    fontFamily: 'Calibri',
    		    width: 75,
    		    wrap: "word",
    		    fill: '#7FA3F5'
    	  });
    	  
    	  text.setX( circle.getX() - text.getWidth()/2 );
    	  text.setY( circle.getY() - text.getHeight()/2 );
    	  
    	  circle.on('mouseover', function() {
	        this.fill("#253F79");
	        text.fill("#CCD8F5");
	        layer.draw();
	      });
    	  
	      circle.on('mouseout', function() {
	    	this.fill("#08266C");
	    	text.fill("#7FA3F5");
	    	layer.draw();
	      });
    	  
    	  layer.add(circle).add(text);
          
//          stage.add(layer);
    });
     
      stage.add(layer); 
     
    }
  	// end this.render : function()
  });

  return infographicView;
});