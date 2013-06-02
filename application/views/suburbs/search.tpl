{assign var=title value="FullStop Search"}
{include "includes/header.tpl"}
{include "includes/nav.tpl"}

<div class="row">
	<div class="large-12 columns">
		<h2>Search for "{$query|default:''}"</h2>
	</div>
</div>

<form class="custom row">
		<div class="large-4 columns">
			<h5>Filter:</h5>
		</div>
		<div class="large-2 columns">
			<select name="population">
				<option value="null">Population</option>
				<option value="low">Low</option>
				<option value="medium">Medium</option>
				<option value="high">High</option>
			</select>
		</div>
		<div class="large-2 columns">
			<select name="crime">
				<option value="null">Crime</option>
				<option value="low">Low</option>
				<option value="medium">Medium</option>
				<option value="high">High</option>
			</select>
		</div>
		<div class="large-2 columns">
			<select name="orderby">
				<option value="null">Order By</option>
				<option value="Alphabetically">Alphabetically</option>
				<option value="medium">Crime</option>
				<option value="high">Population</option>
			</select>
		</div>
		<div class="large-2 columns">
				<select name="sort">
					<option value="null">Sort</option>
					<option value="asc">Ascending</option>
					<option value="desc">Descending</option>
				</select>
		</div>
</form>

<hr>

{include "suburbs/results.tpl"}

{include "includes/footer.tpl"}