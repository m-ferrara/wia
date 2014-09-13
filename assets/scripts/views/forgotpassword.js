define(['text!templates/forgotpassword.html'], function(forgotpasswordTemplate) {
  var forgotpasswordView = Backbone.View.extend({
    el: $('#content'),

    render: function() {
      this.$el.html(forgotpasswordTemplate);
    }
  });

  return forgotpasswordView;
});