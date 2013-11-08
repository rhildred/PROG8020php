
jQuery("document").ready(function(){
	// don't do anything until document fully retrieved
	var fTemplate = _.template(jQuery('#cditem').html());
	var fDetailsTemplate = _.template(jQuery('#cditemdetails').html());
	// we go out and get the initial list of cds 
	jQuery.ajax({url:"cds/", dataType:"json"})
	.done(function(oCdList){
		oCdList.forEach(function(oCd){
			// we append a single cd into the cdlist div 
			jQuery("#cdlist").append(fTemplate(oCd));
		});
		
		
		// be done when we click a link with class clickable
		jQuery(".clickable").click(function(evt){
			// we go and get an individual cd
			jQuery.ajax({url:this.href, dataType:"json"})
			.done(function(oCd){
				// we replace the html in the cditemview with the html from the cditemdetails template
				jQuery("#cditemview").html(fDetailsTemplate(oCd));
			})
			.fail(function(err){
				console.log(err);
			});
			// it is really important to return false here so that the event isn't passed on
			return false;
		});

	})
	.fail(function(err){
		console.log(err);
	});
	
	
	
});