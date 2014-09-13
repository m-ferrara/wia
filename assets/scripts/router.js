define(['models/GraphicCollection','models/TagCollection','models/CategoryCollection','views/index', 'views/register', 'views/login', 'views/forgotpassword', 'views/infographic'], 
		function(GraphicCollection, TagCollection, CategoryCollection, IndexView, RegisterView, LoginView, ForgotPasswordView, InfographicView) {
	var InfographicRouter = Backbone.Router.extend({
		currentView: null,
		
		routes: {
			"index": "index"
			,"login": "login"
			,"register": "register"
			,"forgotpassword": "forgotpassword"
			,"infographic": "infographic"
		},
		
		changeView: function(view) {
			if ( null != this.currentView) {
				this.currentView.undelegateEvents();
			}
			this.currentView = view;
			this.currentView.render();
		},
		
		index: function(){
			this.changeView(new IndexView());
		},
		
		login: function(){
			this.changeView(new LoginView());
		},
		
		register: function(){
			this.changeView(new RegisterView());
		},
		
		forgotpassword: function(){
			this.changeView(new ForgotPasswordView());
		},
		
		infographic: function(){
			var tagCollection = new TagCollection();
			var categoryCollection = new CategoryCollection();
			var graphicCollection = new GraphicCollection();
	//		tagCollection.url = $APP_URL_ROOT + 'webservice/tags';
	//		tagCollection.fetch({async : false});
			
			this.changeView(new InfographicView({collection: graphicCollection}));
			
			graphicCollection.fetch();
			categoryCollection.fetch();
			
			tagCollection.fetch();
			//console.log(Tags);
			//console.info(tagCollection);
			window.Tags = tagCollection;
			window.Categories = categoryCollection;

		}
		
	});
	
	return new InfographicRouter();
});