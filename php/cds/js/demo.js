// Define a Todo model
var Todo = Backbone.Model.extend({
	// Default todo attribute values
	defaults : {
		title : '',
		completed : false
	},
	// Toggle the `completed` state of this todo item.
	toggle : function() {
		this.save({
			completed : !this.get('completed')
		});
	}
});

var TodoView = Backbone.View.extend({
	tagName : 'li',
	// Cache the template function for a single item.
	todoTpl : _.template($('#item-template').html()),
	events : {
		'dblclick label' : 'edit',
		'keypress .edit' : 'updateOnEnter',
		'blur .edit' : 'close'
	},
	// Called when the view is first created
	initialize : function() {
		//this.$el = $('#todo');
		// Later we'll look at:
		// this.listenTo(someCollection, 'all', this.render);
		// but you can actually run this example right now by
		// calling TodoView.render();
	},
	// Rerender the titles of the todo item.
	render : function() {
		this.$el.html(this.todoTpl(this.model.toJSON()));
		// $el here is a reference to the jQuery element
		// associated with the view, todoTpl is a reference
		// to an Underscore template and toJSON() returns an
		// object containing the model's attributes
		// Altogether, the statement is replacing the HTML of
		// a DOM element with the result of instantiating a
		// template with the model's attributes.
		this.input = this.$('.edit');
		return this;
	},
	edit : function() {
		// executed when todo label is double-clicked
	},
	close : function() {
		// executed when todo loses focus

	},
	updateOnEnter : function(e) {
		// executed on each keypress when in todo edit mode,
		// but we'll wait for enter to get in action
	}
});


// Define a Todos Collection
var TodosCollection = Backbone.Collection.extend({
	model : Todo,
	// Add a single todo item to the list by creating a view for it, and
	// appending its element to the `<ul>`.
	addOne : function(todo) {
		var view = new TodoView({
			model : todo
		});
		$('#todo-list').append(view.render().el);
	},
	// Add all items in the **Todos** collection at once.
	addAll : function() {
		$('#todo-list').html('');
		this.each(this.addOne, this);
	}
});

var TodoRouter = Backbone.Router.extend({
	routes : {
		/*
		 * If you wish to use splats for anything beyond default routing, it's
		 * probably a good idea to leave them at the end of a URL; otherwise,
		 * you may need to apply regular expression parsing on your fragment
		 */
		"*other" : "defaultRoute"
	/*
	 * This is a default route that also uses a *splat. Consider the default
	 * route a wildcard for URLs that are either not matched or where the user
	 * has incorrectly typed in a route path manually
	 */
	/* Sample usage: http://example.com/# <anything> */
	},
	defaultRoute : function(other) {
		var a = new Todo({
			title : 'Go to Jamaica.'
		}), b = new Todo({
			title : 'Go to China.'
		}), c = new Todo({
			title : 'Go to Disneyland.'
		});
		var todos = new TodosCollection([ a, b, c ]);
		todos.addAll();

	}
});

var todoRouter = new TodoRouter();
Backbone.history.start();
