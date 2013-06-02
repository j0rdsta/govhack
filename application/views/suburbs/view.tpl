{assign var=title value="{$suburb.suburb_name}"}
{include "includes/header.tpl"}
{include "includes/nav.tpl"}

<!-- Header -->
<div class="row">
	<div class="large-12 columns">
		<h1>{$suburb.suburb_name}</h1>
	</div>
</div>
<!-- End Header -->

<!-- Map -->
<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.au/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;aq=0&amp;oq=gold+coast&amp;sll={$suburb.latitude},{$suburb.longitude}&amp;sspn=0.670618,1.352692&amp;ie=UTF8&amp;hq=&amp;hnear=Gold+Coast+Queensland&amp;ll={$suburb.latitude},{$suburb.longitude}&amp;spn=0.670429,1.352692&amp;t=m&amp;z=15&amp;output=embed"></iframe>
<hr>
<!-- End Map -->

<!-- D3 -->
<div class="row">
	<div class="large-12 columns">
		<h2>Graphs</h2>

		<h5>Crime</h5>
		<div id="crime-chart">
			<svg></svg>
		</div>

		<hr>

		<h5>Population</h5>
		<div id="population-chart">
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
				<div class="content restaurant" data-section-content data-category="RESTAURANT">
				</div>
			</section>
			<section>
				<p class="title" data-section-title><a href="#panel2">Attractions</a></p>
				<div class="content" data-section-content data-category="ATTRACTION">
				</div>
			</section>
			<section>
				<p class="title" data-section-title><a href="#panel2">Tours</a></p>
				<div class="content" data-section-content data-category="TOUR">
				</div>
			</section>
			<section>
				<p class="title" data-section-title><a href="#panel2">Transport</a></p>
				<div class="content" data-section-content data-category="TRANSPORT">
				</div>
			</section>
			<section>
				<p class="title" data-section-title><a href="#panel2">Events</a></p>
				<div class="content" data-section-content data-category="EVENT">
				</div>
			</section>
			<section>
				<p class="title" data-section-title><a href="#panel2">Hire</a></p>
				<div class="content" data-section-content data-category="HIRE">
				</div>
			</section>

		</div>
	</div>
</div>



{include "includes/footer.tpl"}