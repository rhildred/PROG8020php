var Cds = Backbone.Collection.extend({
	url : 'cds/',
});

var CdsRouter = Backbone.Router.extend({
	oCdList : new Cds(),
	fCdListTemplate : _.template(jQuery('#cditem').html()),
	fDetailsTemplate : _.template(jQuery('#cditemdetails').html()),
	initialize : function() {
		this.oCdList.fetch({
			success : jQuery.proxy(this.renderCds, this),
			error : function(collection, err) {
				throw err.status + " " + err.statusText;
			}
		});
	},
	renderCds : function() {
		this.oCdList.models.forEach(function(oCd) {
			// we append a single cd into the cdlist div
			jQuery("#cdlist").append(this.fCdListTemplate(oCd.attributes));
		}, this);

		Backbone.history.start();
	},
	routes : {
		"cds/:id" : "showCD",
		"*other" : "defaultRoute"
	},
	showCD : function(id) {
		jQuery("#errlist").html("");
		jQuery("#cditemview").html(
				this.fDetailsTemplate(this.oCdList.get(id).attributes));
	},
	defaultRoute : function(other) {
		jQuery("#errlist").html("");
		jQuery("#cditemview").html("Click on an item to see it's details");
	}
});

window.onerror = function(message, file, lineNumber) {
	// all errors will be caught here
	// you can use `message` to make sure it's the error you're looking for
	// returning true overrides the default window behaviour
	jQuery("#errlist").html(
			"File: " + file + " Line: " + lineNumber + " Message: "
					+ message);
	return true;
};
var cdsRouter = new CdsRouter();
