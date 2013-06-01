<?php /* Smarty version Smarty-3.0.8, created on 2013-06-01 19:21:52
         compiled from "/Users/Bentley/Documents/Work/Freelance/GovHat/GovHat/api/application/views/results.tpl" */ ?>
<?php /*%%SmartyHeaderCode:122870780851a9bd308c0d79-15836819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3862031176c36be388682aea4db7d54c99505059' => 
    array (
      0 => '/Users/Bentley/Documents/Work/Freelance/GovHat/GovHat/api/application/views/results.tpl',
      1 => 1370078396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122870780851a9bd308c0d79-15836819',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include '/Users/Bentley/Documents/Work/Freelance/GovHat/GovHat/api/application/third_party/Smarty-3.0.8/libs/plugins/function.cycle.php';
?><?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('results')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
<!-- Item -->
<a href="#" class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
	<div class="row">
		<div class="small-2 columns text-center">
			<img src="<?php echo $_smarty_tpl->tpl_vars['result']->value['image'];?>
" alt="">
		</div>
		<div class="small-10 columns">
			<h5><?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
</h5>
			<p>Crime Rating: <?php echo $_smarty_tpl->tpl_vars['result']->value['crimerating'];?>
<br>
			Growth Rate: <?php echo $_smarty_tpl->tpl_vars['result']->value['growthrate'];?>
</p>
		</div>
	</div>
</a>
<!-- End Item -->
<?php }} ?>