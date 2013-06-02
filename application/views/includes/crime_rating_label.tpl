{if $crime}
	{if $crime > $average_crime}
		<span class="radius alert label" data-tooltip title="{$crime}">High</span>
	{else}
		<span class="radius success label" data-tooltip title="{$crime}">Low</span>
	{/if}
{else}
	<span class="radius secondary label" data-tooltip title="No data available">Unknown</span>
{/if}