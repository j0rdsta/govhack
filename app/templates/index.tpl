{assign var=title value="FullStop"}
{include "includes/header.tpl"}
{include "includes/nav.tpl"}


{assign var=search value="false"}
<!-- If search -->
{if $search == "true"}
	{include "results.tpl"}
{/if}

{include "includes/footer.tpl"}