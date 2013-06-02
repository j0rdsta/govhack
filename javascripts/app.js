$(function() {
	$('.filter-form select').on('change', function() {
		$(this).closest('form').submit();
	})

	function loadPlaces(container, latitude, longitude) {
		if(container.data('places-loaded')) {
			return;
		}
		container.data('places-loaded', true);

		category = container.data("category");

		suburb_lat = latitude || $(".suburb_name").data("latitude");
		suburb_long = longitude || $(".suburb_name").data("longitude");

		$.ajax({
			type: "GET",
			url:"http://govhack.atdw.com.au/productsearchservice.svc/products",
			data: {
				key: 278965474541, // API Key
				cats: category, // Category
				latlong: suburb_lat + "," + suburb_long, // Latitude/Long
				dist: "15", // Distance (km)
				size: "10", // Number of results
				out: "json" // Output format
			},
			success: function(data){
				container.html('');

				var products = data['products'];

				if(products && products.length) {
					$.each(products, function(k, v) {
						// Node
						content = "<div class='node'>";

						// Row
						content += "<div class='row'>";

						// Image
						content += "<div class='large-3 columns'>";
						content += "<img src='" + v.productImage + "' alt='" + v.productName + "' />";
						content += "</div>";

						// Content
						content += "<div class='large-9 columns'>";
						content += "<h5>" + v.productName + "</h5>";
						content += "<p>" + v.productDescription + "</p>";
						content += "</div>";

						// /Row
						content += "</div>";

						// /Node
						content += "</div>";

						content += "<hr>";

						container.append(content);
					});
				} else {
					container.html('<p>No results found.</p>');
				}
    		}
		});
	}

	$(".section-container section.load-places .title").on('click', function(container){
		loadPlaces($(this).closest('section').find('.content'));
	});

	$(".section-container section.load-nearby-places .title").on('click', function(container){
		var content = $(this).closest('section').find('.content');
		if(navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				loadPlaces(content, position.coords.latitude, position.coords.longitude);
			});
		} else {
			content.html('<p>Location search not enabled on this device</p>');
		}
	});

	// Load initial content
	$(".section-container section.load-places .content.initial").each(function(container){
		loadPlaces($(this));
	});

	$('form#review').parsley({
		errorClass: 'error',
	});
});