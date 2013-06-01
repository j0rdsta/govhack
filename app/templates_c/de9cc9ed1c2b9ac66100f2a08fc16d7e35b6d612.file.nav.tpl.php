<?php /* Smarty version Smarty-3.1.13, created on 2013-06-01 08:12:39
         compiled from ".\templates\includes\nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:843451a967f1ec8a08-22740583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de9cc9ed1c2b9ac66100f2a08fc16d7e35b6d612' => 
    array (
      0 => '.\\templates\\includes\\nav.tpl',
      1 => 1370066953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '843451a967f1ec8a08-22740583',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51a967f1eca2d8_89876707',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a967f1eca2d8_89876707')) {function content_51a967f1eca2d8_89876707($_smarty_tpl) {?><body>

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

			<section class="top-bar-section">
				<!-- Left Nav Section -->
				<ul class="left">
					<li class="divider"></li>
					<li><a href="#">Suburbs</a>
					</li>
				</ul>
				<!-- Right Nav Section -->
				<ul class="right">
					<li class="divider"></li>
					<li class="has-form">
						<a class="button" href="#">Review</a>
					</li>
				</ul>
			</section>
		</nav>
	</div>

	<!-- End Top Bar -->

	<?php echo $_smarty_tpl->getSubTemplate ("feature.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
	<!-- End Search --><?php }} ?>