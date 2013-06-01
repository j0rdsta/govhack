<?php /* Smarty version Smarty-3.1.13, created on 2013-06-01 07:46:07
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3186751a960196b0c34-46223951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1370065565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3186751a960196b0c34-46223951',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51a9601996b535_66003847',
  'variables' => 
  array (
    'search' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a9601996b535_66003847')) {function content_51a9601996b535_66003847($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable("FullStop", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("includes/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("includes/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php $_smarty_tpl->tpl_vars['search'] = new Smarty_variable("false", null, 0);?>
<!-- If search -->
<?php if ($_smarty_tpl->tpl_vars['search']->value=="true"){?>
	<?php echo $_smarty_tpl->getSubTemplate ("results.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("includes/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>