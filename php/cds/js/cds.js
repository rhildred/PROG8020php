//console.log("hello in a webpage");

jQuery("document").ready(function(){
	//console.log("document ready!");
	var fTemplate = _.template(jQuery('#cditem').html());
	jQuery.ajax({url:"cds/", dataType:"json"})
	.done(function(resp){
		//console.log(resp);
		//jQuery("#cdlist").html(resp);
		resp.forEach(function(oCd){
			jQuery("#cdlist").append(fTemplate(oCd));
		});
	})
	.fail(function(err){
		console.log(err);
	});
});