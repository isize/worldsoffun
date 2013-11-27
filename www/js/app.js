

var app = {
	
	
	// Application Constructor
	initialize : function() {

		
		this.detailsURL = /^#employees\/(\d{1,})/;
		this.bindEvents();
		
		
		
	},
	// Bind Event Listeners
	//
	// Bind any events that are required on startup. Common events are:
	// 'load', 'deviceready', 'offline', and 'online'.
	bindEvents : function() {
		document.addEventListener('deviceready', this.onDeviceReady, false);
		$(window).on('hashchange', $.proxy(this.route, this));
	},
	// deviceready Event Handler
	//
	// The scope of 'this' is the event. In order to call the 'receivedEvent'
	// function, we must explicity call 'app.receivedEvent(...);'
	onDeviceReady : function() {
		app.receivedEvent('deviceready');
	},
	// Update DOM on a Received Event
	receivedEvent : function(id) {
		
	},
	
	renderHomeView: function() {
	    var html =
	            "<div class='header'><h1>Home</h1></div>" +
	            "<div class='search-view'>" +
	            "<input class='search-key'/>" +
	            "<ul class='employee-list'></ul>" +
	            "</div>"
	    $('body').html(html);
	    $('.search-key').on('keyup', $.proxy(this.findByName, this));
	},
	
	route: function() {
	    var hash = window.location.hash;
	    if (!hash) {
	        $('body').html(new HomeView(this.store).render().el);
	        return;
	    }
	    var match = hash.match(app.detailsURL);
	    if (match) {
	        this.store.findById(Number(match[1]), function(employee) {
	            $('body').html(new EmployeeView(employee).render().el);
	        });
	    }
	},
	
	showAlert: function (message, title) {
	    if (navigator.notification) {
	        navigator.notification.alert(message, null, title, 'OK');
	    } else {
	        alert(title ? (title + ": " + message) : message);
	    }
	}
	
	
};



