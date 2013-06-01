<body {if $title eq "FullStop"}class='home'{else}class='page'{/if}>

	<!-- Navigation -->
	<div class="contain-to-grid">
		<nav class="top-bar">
			<ul class="title-area">
				<!-- Title Area -->
				<li class="name">
					<h1>
						<a href="index.php">
							<img src="images/logo.png" alt="FullStop Logo">
						</a>
					</h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
			</ul>

			{if $title != "FullStop"}
				<section class="top-bar-section">
					<!-- Right Nav Section -->
					<ul class="right">
						<li class="divider"></li>
						<li class="has-form">
							<a class="button" href="#">Review</a>
						</li>
					</ul>
				</section>
			{/if}
		</nav>
	</div>

	<!-- End Top Bar -->

	{if $title eq "FullStop"}{include "feature.tpl"}{/if}

	<!-- Search -->
	<div class="row">
		<div class="large-2 columns">
			<label for="search" class="inline">Search for a location</label>
		</div>
		<div class="large-10 columns">
			<input type="text" id="search" placeholder="eg. Varsity Lakes">
		</div>
	</div>
	<hr>
	<!-- End Search -->