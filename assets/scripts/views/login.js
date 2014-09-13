define(['text!templates/login.html'], function(loginTemplate) {
  var loginView = Backbone.View.extend({
    el: $('#content'),

    render: function() {
      this.$el.html(loginTemplate);
    }
  });

  return loginView;
});