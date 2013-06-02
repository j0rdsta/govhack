{if !empty($reviews)}
	{foreach $reviews as $review}
		<div class="node">
			<div class="row">
				<div class="large-12 columns">
					<h5>{$review.name}</h5>
					<p>{$review.review}</p>
					<div class="reviewstars" data-score="{$review.rating}"></div>
				</div>
			</div>
		</div>
		<hr />
	<!-- End Item -->
	{/foreach}
{else}
<div class="row">
	<div class="large-12 columns">
		<p>No Reviews Found. <a class="button" data-reveal-id="reviewModal">Add One?</a></p>
	</div>
</div>
{/if}