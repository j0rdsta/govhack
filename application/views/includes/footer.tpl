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

	<script>
	document.write('<script src=' +
		('__proto__' in {} ? 'javascripts/vendor/zepto' : 'javascripts/vendor/jquery') +
		'.js><\/script>')
	</script>

	<script src="javascripts/foundation/foundation.js"></script>
	
	<script src="javascripts/foundation/foundation.alerts.js"></script>
	
	<script src="javascripts/foundation/foundation.clearing.js"></script>
	
	<script src="javascripts/foundation/foundation.cookie.js"></script>
	
	<script src="javascripts/foundation/foundation.dropdown.js"></script>
	
	<script src="javascripts/foundation/foundation.forms.js"></script>
	
	<script src="javascripts/foundation/foundation.joyride.js"></script>
	
	<script src="javascripts/foundation/foundation.magellan.js"></script>
	
	<script src="javascripts/foundation/foundation.orbit.js"></script>
	
	<script src="javascripts/foundation/foundation.placeholder.js"></script>
	
	<script src="javascripts/foundation/foundation.reveal.js"></script>
	
	<script src="javascripts/foundation/foundation.section.js"></script>
	
	<script src="javascripts/foundation/foundation.tooltips.js"></script>
	
	<script src="javascripts/foundation/foundation.topbar.js"></script>

	<script>
		$(document).foundation();
	</script>

	<!-- D3 -->
	<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>

	<script src="javascripts/nv.d3.min.js"></script>

	<script src="javascripts/graph.js"></script>
	<!-- /D3 -->

	{literal}
	<script>
		$(function() {
			$("#search").change(function(){
				var varname = $(this).val();
			});

			$.ajax({
				url:"http://govhack.atdw.com.au/productsearchservice.svc/products?key=278965474541&term=varname",
				method:"GET",
				data: {
					key: 278965474541,
					term: varname
				}
			});
		})
	</script>
	{/literal}

</body>
</html>
