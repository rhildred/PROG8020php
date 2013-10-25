jQuery("document").ready(function(){
	var sTemplate = _.template(jQuery('#item-template').html());
	jQuery.ajax({url:"http://localhost/cds/php/cds/", dataType:'json'})
	.done(function(res){
		res.forEach(function(oCd){
			jQuery('#todo-list').append(sTemplate(oCd));
		});
	})
	.fail(function(err){
		console.log(err);
	});
	
});