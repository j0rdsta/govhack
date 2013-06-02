{assign var=title value="FullStop Search"}
{include "includes/header.tpl"}
{include "includes/nav.tpl"}

<div class="row">
	<div class="large-12 columns">
		<h2>Search for "{$query|default:''}"</h2>
	</div>
</div>

<div class="row">
	<div class="large-offset-2 columns"></div>
	<div class="large-10 columns">
		<div class="large-3 columns">
			<h5>Filter:</h5>
		</div>

		<div class="large-2 columns">
			<p>
				<select name="population">
					<option value="null">Population</option>
					<option value="low">Low</option>
					<option value="medium">Medium</option>
					<option value="high">High</option>
				</select>
			</p>
		</div>

		<div class="large-2 columns">
			<p>
				<select name="crime">
					<option value="null">Crime</option>
					<option value="low">Low</option>
					<option value="medium">Medium</option>
					<option value="high">High</option>
				</select>
			</p>
		</div>

		<div class="large-3 columns">
			<p>
				<select name="orderby">
					<option value="null">Order By</option>
					<option value="Alphabetically">Alphabetically</option>
					<option value="medium">Crime</option>
					<option value="high">Population</option>
				</select>
			</p>
		</div>
		<div class="large-2 columns">
			<p>
				<select name="sort">
					<option value="null">Sort</option>
					<option value="asc">Ascending</option>
					<option value="desc">Descending</option>
				</select>
			</p>
		</div>		
	</div>

</div>

{include "suburbs/results.tpl"}

{include "includes/footer.tpl"}