{foreach $results as $result}
<!-- Item -->
<a href="/suburbs/view/{$result.suburb_id}" class="{cycle values='odd,even'}">
	<div class="row">
		<div class="small-2 columns text-center">
			<img src="{$result.image|default:'/images/placeholder_pin.png'}" alt="">
		</div>
		<div class="small-10 columns">
			<h5>{$result.suburb_name}</h5>

			<p>Crime Rating: {include "includes/crime_rating_label.tpl" crime=$result.crime_latest }</p>
			<p>Population: {$result.population_latest|number_format:0:".":","}</p>
		</div>
	</div>
</a>
<!-- End Item -->
{/foreach}