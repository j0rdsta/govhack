{assign var=title value="{$suburb.suburb_name}"}
{include "includes/header.tpl"}
{include "includes/nav.tpl"}

<!-- Header -->
<div class="row">
	<div class="large-10 columns">
		<h1 class="suburb_name" data-latitude="{$suburb.latitude}" data-longitude="{$suburb.longitude}">{$suburb.suburb_name}</h1>
	</div>
	<div class="large-2 columns">
		<a class="button" href="#" data-reveal-id="reviewModal">Review</a>
	</div>
</div>

<div class="row">
	<div class="large-3 columns">
		<p>Crime Rating: {include "includes/crime_rating_label.tpl" crime=$suburb.crime_latest }</p>
	</div>
	<div class="large-3 columns">
		<p>Population: {$suburb.population_latest|number_format:0:".":","}</p>
	</div>
	<div class="large-offset-6 columns">
	</div>
</div>
<!-- End Header -->

<!-- Map -->
<iframe class="maps" height="350" src="https://maps.google.com.au/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;aq=0&amp;oq=gold+coast&amp;sll={$suburb.latitude},{$suburb.longitude}&amp;sspn=0.670618,1.352692&amp;ie=UTF8&amp;hq=&amp;hnear=Gold+Coast+Queensland&amp;ll={$suburb.latitude},{$suburb.longitude}&amp;spn=0.670429,1.352692&amp;t=m&amp;z=15&amp;output=embed"></iframe>
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
			<section class="load-places">
				<p class="title" data-section-title><a href="#panel1">Restaurants</a></p>
				<div class="content initial" data-section-content data-category="RESTAURANT">
					<p>Loading... <img src="/images/loader.gif" alt="" /></p>
				</div>
			</section>
			<section class="load-places">
				<p class="title" data-section-title><a href="#panel2">Attractions</a></p>
				<div class="content" data-section-content data-category="ATTRACTION">
					<p>Loading... <img src="/images/loader.gif" alt="" /></p>
				</div>
			</section>
			<section class="load-places">
				<p class="title" data-section-title><a href="#panel3">Tours</a></p>
				<div class="content" data-section-content data-category="TOUR">
					<p>Loading... <img src="/images/loader.gif" alt="" /></p>
				</div>
			</section>
			<section class="load-places">
				<p class="title" data-section-title><a href="#panel4">Transport</a></p>
				<div class="content" data-section-content data-category="TRANSPORT">
					<p>Loading... <img src="/images/loader.gif" alt="" /></p>
				</div>
			</section>
			<section class="load-places">
				<p class="title" data-section-title><a href="#panel5">Events</a></p>
				<div class="content" data-section-content data-category="EVENT">
					<p>Loading... <img src="/images/loader.gif" alt="" /></p>
				</div>
			</section>
			<section class="load-places">
				<p class="title" data-section-title><a href="#panel6">Hire</a></p>
				<div class="content" data-section-content data-category="HIRE">
					<p>Loading... <img src="/images/loader.gif" alt="" /></p>
				</div>
			</section>
			<section class="load-nearby-places">
				<p class="title" data-section-title><a href="#panel7"><i class="icon icon-screenshot"></i> Near Me</a></p>
				<div class="content" data-section-content>
					<p>Loading... <img src="/images/loader.gif" alt="" /></p>
				</div>
			</section>
			<section>
				<p class="title" id="reviewTab" data-section-title><a href="#panel8">Reviews</a></p>
				<div class="content" data-section-content>
					{include "reviews/list.tpl"}
				</div>
			</section>				
		</div>
	</div>
</div>


{include "includes/footer.tpl"}