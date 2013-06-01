{assign var=title value="{$suburb_name}"} <!-- Change to variable -->
{include "includes/header.tpl"}
{include "includes/nav.tpl"}

<div class="row">

	<div class="large-6 columns">

		<h2>Restaurants</h2>

		<div class="restaurant_node">
			<div class="large-4 columns">
				<img src="http://placehold.it/150x150" alt="restaurant"/>
			</div>
			<div class="large-8 columns">
			<h1>Restaurant Name</h1>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis arcu at massa condimentum id iaculis magna dignissim. Integer nec est non elit faucibus tristique in eget ipsum. Duis semper aliquam dolor, sed placerat <a href="#">risus</a> sollicitudin eu. 

				</p>

			</div>

		</div>

	</div>

	<div class="large-6 columns">

		<h2>Entertainment</h2>

	</div>

</div>

<div class="row">

	<div class="large-6 columns">

		<h2>Hotels</h2>

	</div>

	<div class="large-6 columns">

		<h2>Graphs</h2>

	</div>

</div>
{include "includes/footer.tpl"}