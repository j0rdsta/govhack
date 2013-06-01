{foreach $results as $result}
<!-- Item -->
<a href="/suburbs/view/{$result.suburb_id}" class="{cycle values='odd,even'}">
	<div class="row">
		<div class="small-2 columns text-center">
			<img src="{$result.image|default:'/images/placeholder_pin.png'}" alt="">
		</div>
		<div class="small-10 columns">
			<h5>{$result.suburb_name}</h5>

			<p>Crime Rating:
			{if $result.crime_percentile}
				{if $result.crime_percentile > 1}
					<span class="radius alert label">High</span>
				{elseif $result.crime_percentile > 0}
					<span class="radius warning label">Medium</span>
				{else}
					<span class="radius success label">Low</span>
				{/if}
			{else}
				<span class="radius secondary label">Unknown</span>
			{/if}
			</p>
			<p>Population: {$result.population_percentile}</p>
		</div>
	</div>
</a>
<!-- End Item -->
{/foreach}