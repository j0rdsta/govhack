<body {if empty($suburb)}class='home'{else}class='page'{/if}>

	<!-- Navigation -->
	<div class="contain-to-grid">
		<nav class="top-bar">
			<ul class="title-area">
				<!-- Title Area -->
				<li class="name">
					<h1>
						<a href="/">
							<img src="/images/logo.png" alt="FullStop Logo">
						</a>
					</h1>
				</li>
			</ul>

			<ul class="right">
				<li class="has-form">
					<form action="/suburbs/search">
						<input type="text" id="searchText" name="query" placeholder="Search">
						<input type="submit" id="searchSub" value=""/>
					</form>
				</li>
				{if !empty($suburb)}
				<li id="nav-divide" class="divider"></li>
				<li class="has-form">
					<a class="button" href="#">Review</a>
				</li>
				{/if}
			</ul>
		</nav>
	</div>

	<!-- End Top Bar -->
