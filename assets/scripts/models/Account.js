define(function(require){

var Account = Backbone.Model.extend({

    urlRoot: $APP_URL_ROOT + 'webservice/user',
    idAttribute: 'u_id',

    defaults: {
        email : "",
        password: "",
        firstName: "",
        lastName: ""
    }
});

  return Account;
});