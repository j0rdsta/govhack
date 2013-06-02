<body {if empty($suburb)}class='home'{else}class='page'{/if}>

	<!-- Facebook Like Button -->

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

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
			</ul>
		</nav>
	</div>

	<!-- End Top Bar -->
