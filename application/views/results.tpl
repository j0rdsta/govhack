{foreach $results as $result}
<!-- Item -->
<a href="#" class="{cycle values='odd,even'}">
	<div class="row">
		<div class="small-2 columns text-center">
			<img src="{$result.image|default:'images/placeholder_pin.png'}" alt="">
		</div>
		<div class="small-10 columns">
			<h5>{$result.suburb_name}</h5>
			<p>Crime Rating: {$result.crime_percentile}<br>
			Growth Rate: {$result.population_percentile}</p>
		</div>
	</div>
</a>
<!-- End Item -->
{/foreach}