
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Full Stop - Individual Listing</title>

  <link rel="stylesheet" href="stylesheets/normalize.css" />

  <link rel="stylesheet" href="stylesheets/app.css" />

  <link rel="stylesheet" href="stylesheets/nv.d3.css" />

  <script src="javascripts/vendor/custom.modernizr.js"></script>

</head>
<body>

	<!-- Navigation -->
	<div class="contain-to-grid">
		<nav class="top-bar">
			<ul class="title-area">
				<!-- Title Area -->
				<li class="name">
					<h1>
						<a href="#">
							Full Stop
						</a>
					</h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
			</ul>

			<section class="top-bar-section">
				<!-- Right Nav Section -->
				<ul class="right">
					<li class="divider"></li>
					<li class="has-form">
						<a class="button" href="#">Review</a>
					</li>
				</ul>
			</section>
		</nav>
	</div>

	<!-- End Top Bar -->

	<!-- Header -->
	<div class="row">
		<div class="large-12 columns">
			<h1>Varsity Lakes</h1>
		</div>
	</div>
	<!-- End Header -->

	<!-- Map -->
	<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.au/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Gold+Coast,+Queensland&amp;aq=0&amp;oq=gold+coast&amp;sll=-27.98694,153.323703&amp;sspn=0.670618,1.352692&amp;ie=UTF8&amp;hq=&amp;hnear=Gold+Coast+Queensland&amp;ll=-27.987126,153.323822&amp;spn=0.670429,1.352692&amp;t=m&amp;z=10&amp;output=embed"></iframe>
	<hr>
	<!-- End Map -->

	<!-- D3 -->
	<div class="row">
		<div class="large-12 columns">
			<h2>Graphs</h2>

			<h5>Crime</h5>
			<div id="chart">
				<svg></svg>
			</div>

			<hr>

			<h5>Growth</h5>
			<div id="chart2">
				<svg></svg>
			</div>
		</div>
	</div>
	<hr>
	<!-- End D3 -->

	<div class="row">
		<div class="large-12 columns">
			<div class="section-container auto" data-section>
				<section>
					<p class="title" data-section-title><a href="#panel1">Restaurants</a></p>
					<div class="content" data-section-content>
						<a href="#">Restaurant 1</a>
						<hr>
						<a href="#">Restaurant 2</a>
					</div>
				</section>
				<section>
					<p class="title" data-section-title><a href="#panel2">Section 2</a></p>
					<div class="content" data-section-content>
						<p>Content of section 2.</p>
					</div>
				</section>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="large-12 columns">
			<p>
				<span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">FullStop</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">GovHat</span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 Unported License</a>.
				<br>
				<a rel="license" href="http://creativecommons.org/licenses/by/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by/3.0/80x15.png" /></a>
			</p>
		</div>
	</div>

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
	

	<!-- D3 -->
	<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>

	<script src="javascripts/nv.d3.min.js"></script>

	<script src="javascripts/graph.js"></script>

	<!-- /D3 -->

	<script>
	$(document).foundation();
	</script>
</body>
</html>
