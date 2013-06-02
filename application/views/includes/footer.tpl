	<footer>
		<div class="row">
			<div class="large-12 columns">
				<p>
					<span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">FullStop</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">GovHat</span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 Unported License</a>.
					<br>
					<a rel="license" href="http://creativecommons.org/licenses/by/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by/3.0/80x15.png" /></a>
				</p>
			</div>
		</div>
	</footer>

	<div id="test"></div>

	<script>
	document.write('<script src=' +
		('__proto__' in {} ? '/javascripts/vendor/zepto' : '/javascripts/vendor/jquery') +
		'.js><\/script>')
	</script>

	<script src="/javascripts/foundation/foundation.js"></script>

	<script src="/javascripts/foundation/foundation.alerts.js"></script>

	<script src="/javascripts/foundation/foundation.clearing.js"></script>

	<script src="/javascripts/foundation/foundation.cookie.js"></script>

	<script src="/javascripts/foundation/foundation.dropdown.js"></script>

	<script src="/javascripts/foundation/foundation.forms.js"></script>

	<script src="/javascripts/foundation/foundation.joyride.js"></script>

	<script src="/javascripts/foundation/foundation.magellan.js"></script>

	<script src="/javascripts/foundation/foundation.orbit.js"></script>

	<script src="/javascripts/foundation/foundation.placeholder.js"></script>

	<script src="/javascripts/foundation/foundation.reveal.js"></script>

	<script src="/javascripts/foundation/foundation.section.js"></script>

	<script src="/javascripts/foundation/foundation.tooltips.js"></script>

	<script src="/javascripts/foundation/foundation.topbar.js"></script>

	<div id="reviewModal" class="reveal-modal">
		<h2>Review {$suburb.suburb_name|default:'This Suburb'}</h2>
		<form action="#" class="custom">
			<div class="row">
				<div class="large-3 small-6 columns">
					<label for="review-name" class="right inline">Your Name</label>
				</div>
				<div class="large-9 small-6 columns">
					<input type="text" id="review-name" placeholder="eg. Jessica Mills">
				</div>
			</div>
			<div class="row">
				<div class="large-3 small-6 columns">
					<label for="review-comments" class="right inline">Your Comments</label>
				</div>
				<div class="large-9 small-6 columns">
					<textarea id="review-comments" placeholder="eg. I loved visiting {$suburb.suburb_name|default:'This Suburb'}!"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="large-9 large-offset-3 small-6 small-offset-6 columns">
					<input type="submit" class="button" value="Submit Review">
				</div>
			</div>
		</form>
		<a class="close-reveal-modal">&#215;</a>
	</div>

	<script>
		$(document).foundation();
	</script>

	<!-- D3 -->
	<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>

	<script src="/javascripts/nv.d3.min.js"></script>

	<script src="/javascripts/graph.js"></script>
	<!-- /D3 -->

	{literal}
	<script>
		$(function() {
			function loadPlaces(container) {
				if(container.data('places-loaded')) {
					return;
				}
				container.data('places-loaded', true);

				category = container.data("category");

				$.ajax({
					type: "GET",
					url:"http://govhack.atdw.com.au/productsearchservice.svc/products",
					data: {
						key: 278965474541, // API Key
						cats: category, // Category
						latlong: "-27,153", // Latitude/Long
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

			$(".section-container section .title").on('click', function(container){
				loadPlaces($(this).closest('section').find('.content'));
			});

			// Load initial content
			$(".section-container section .content.initial").each(function(container){
				loadPlaces($(this));
			});
		});
	</script>
	{/literal}

</body>
</html>