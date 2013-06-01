{assign var=title value="FullStop Search"}
{include "includes/header.tpl"}
{include "includes/nav.tpl"}

<div class="row">
	<div class="large-12 columns">
		<h2>Search for "{$query|default:''}"</h2>
	</div>
</div>
{include "suburbs/results.tpl"}

{include "includes/footer.tpl"}