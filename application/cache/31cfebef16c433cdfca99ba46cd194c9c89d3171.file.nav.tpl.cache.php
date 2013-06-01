<?php /* Smarty version Smarty-3.0.8, created on 2013-06-01 19:21:52
         compiled from "/Users/Bentley/Documents/Work/Freelance/GovHat/GovHat/api/application/views/includes/nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60995271651a9bd30766958-66561668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31cfebef16c433cdfca99ba46cd194c9c89d3171' => 
    array (
      0 => '/Users/Bentley/Documents/Work/Freelance/GovHat/GovHat/api/application/views/includes/nav.tpl',
      1 => 1370078396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60995271651a9bd30766958-66561668',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<body <?php if ($_smarty_tpl->getVariable('title')->value=="FullStop"){?>class='home'<?php }else{ ?>class='page'<?php }?>>

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

			<?php if ($_smarty_tpl->getVariable('title')->value!="FullStop"){?>
				<section class="top-bar-section">
					<!-- Right Nav Section -->
					<ul class="right">
						<li class="divider"></li>
						<li class="has-form">
							<a class="button" href="#">Review</a>
						</li>
					</ul>
				</section>
			<?php }?>
		</nav>
	</div>

	<!-- End Top Bar -->

	<?php if ($_smarty_tpl->getVariable('title')->value=="FullStop"){?><?php $sha = sha1("feature.tpl" . $_smarty_tpl->cache_id . $_smarty_tpl->compile_id);
if (isset($_smarty_tpl->smarty->template_objects[$sha])) {
$_template = $_smarty_tpl->smarty->template_objects[$sha]; $_template->caching = 9999; $_template->cache_lifetime =  null;
} else {
$_template = new Smarty_Internal_Template("feature.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null);
}
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?><?php }?>

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