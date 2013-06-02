{if !empty($results)}
	{foreach $results as $result}
	<!-- Item -->
	<a href="/suburbs/view/{$result.suburb_id}" class="{cycle values='odd,even'}">
		<div class="row">
			<div class="small-3 columns text-center">
				<img src="{$result.image|default:'/images/placeholder_pin.png'}" alt="">
			</div>
			<div class="small-9 columns">
				<div class="row">
					<div class="large-4 columns">
						<h5>{$result.suburb_name}</h5>
					</div>
					<div class="large-4 columns">
						<p>Crime Rating: {include "includes/crime_rating_label.tpl" crime=$result.crime_latest }</p>
					</div>
					<div class="large-4 columns">
						<p>Population: {$result.population_latest|number_format:0:".":","}</p>
					</div>
				</div>
			</div>
			
		</div>
	</a>
	<!-- End Item -->
	{/foreach}
{else}
<div class="row">
	<div class="large-12 columns">
		<p>No Results Found</p>
	</div>
</div>
{/if}