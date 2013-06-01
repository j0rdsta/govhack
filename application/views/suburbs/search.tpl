{assign var=title value="FullStop Search"}
{include "includes/header.tpl"}
{include "includes/nav.tpl"}

<div class="row">
	<div class="large-12 columns">
		<h2>Search for "{$query|default:''}"</h2>
	</div>
</div>

<div class="row">
	<div class="large-4 columns">&nbsp;
	</div>
	<div class="large-2 columns">
		<h5>Filter:</h5>
	</div>

	<div class="large-2 columns">
		<p>
			<select name="population">
				<option value="null">Population</option>
				<option value="lowtohigh">Low to High</option>
				<option value="hightolow">High to Low</option>
			</select>
		</p>
	</div>

	<div class="large-2 columns">
		<p>
			<select name="crime">
				<option value="null">Crime</option>
				<option value="lowtohigh">Low to High</option>
				<option value="hightolow">High to Low</option>
			</select>
		</p>
	</div>

	<div class="large-2 columns">
		<p>
			<select>
				<option value="null">Alphabetically</option>
				<option value="lowtohigh">A to Z</option>
				<option value="hightolow">Z to A</option>
			</select>
		</p>
	</div>

</div>

{include "suburbs/results.tpl"}

{include "includes/footer.tpl"}