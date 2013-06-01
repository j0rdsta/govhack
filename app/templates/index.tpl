{assign var=title value="FullStop"}
{include "includes/header.tpl"}
{include "includes/nav.tpl"}
	{foreach $results as $result}
	<!-- Item -->
	<a href="#" class="{cycle values='odd,even'}">
		<div class="row">
			<div class="small-2 columns">
				<img src="{$result.image}" alt="">
			</div>
			<div class="small-10 columns">
				<h5>{$result.name}</h5>
				<p>Crime Rating: {$result.crimerating}<br>
				Growth Rate: {$result.growthrate}</p>
			</div>
		</div>
	</a>
	<hr>
	<!-- End Item -->
	{/foreach}

{include "includes/footer.tpl"}