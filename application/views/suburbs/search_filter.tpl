<form class="filter-form custom row" action="/suburbs/search">
	<input type="hidden" name="query" value="{$query|default:''}" />
	<div class="large-2 columns">
		<h5>Filter:</h5>
	</div>
	<div class="large-2 columns">
		<select name="crime">
			{html_options options=['' => 'Crime', 'low' => 'Low', 'high' => 'High'] selected=$search_params.crime|default:''}
		</select>
	</div>
	<div class="large-2 columns">
		&nbsp;
	</div>
	<div class="large-2 columns">
		<h5>Sort:</h5>
	</div>
	<div class="large-2 columns">
		<select name="orderby">
			{html_options options=['' => 'Order By', 'alpha' => 'Alphabetically', 'crime' => 'Crime', 'population' => 'Population'] selected=$search_params.orderby|default:''}
		</select>
	</div>
	<div class="large-2 columns">
		<select name="sort">
			{html_options options=['' => 'Direction', 'asc' => 'Ascending', 'desc' => 'Descending'] selected=$search_params.sort|default:''}
		</select>
	</div>
</form>