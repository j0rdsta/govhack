{assign var=title value="varname Map"}
{include "includes/header.tpl"}
{include "includes/nav.tpl"}

<body>

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

{include "includes/footer.tpl"}