{assign var=title value="FullStop Search"}
{include "includes/header.tpl"}
{include "includes/nav.tpl"}

<div class="row">
	<div class="large-12 columns">
		<h2>{if $query|default:false}Search for "{$query|default:''}"{else}Results{/if}</h2>
	</div>
</div>

{include "suburbs/search_filter.tpl"}

<hr>

{include "suburbs/results.tpl"}

{include "includes/footer.tpl"}