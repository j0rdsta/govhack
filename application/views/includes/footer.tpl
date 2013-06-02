	<footer>
		<div class="row">
			<div class="large-12 columns">
				<p>
					FullStop by GovHat is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 Unported License</a>.
					<br>
					<a rel="license" href="http://creativecommons.org/licenses/by/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by/3.0/80x15.png" /></a>
				</p>
			</div>
		</div>
	</footer>

	<div id="test"></div>

	<script src="/javascripts/vendor/jquery.js"></script>

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

	<!-- Review Modal -->

	<script src="/javascripts/jquery.raty.min.js"></script>

	

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
				<div class="large-3 small-6 columns">
					<label class="right inline">Your Review</label>
				</div>
				<div class="large-9 small-6 columns">
					<div id="star"></div>
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
		$(function() {
			// from http://wbotelhos.com/raty/
			$('#star').raty({
				path: '/images'
			});
		});
	</script>

	<!-- End Review Modal -->

	<script>
		$(document).foundation();
	</script>

	<!-- D3 -->
	<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>

	<script src="/javascripts/nv.d3.min.js"></script>

	<script src="/javascripts/graph.js"></script>
	<!-- /D3 -->
	
	<script src="/javascripts/app.js"></script>
</body>
</html>