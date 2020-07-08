<?php
/* Smarty version 3.1.30, created on 2020-06-17 05:18:04
  from "/Applications/MAMP/htdocs/php7-c9/php_libs/testhqf.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ee9a78cbeff80_74310932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b368b5d72bd6b26dabf077748586d2b9e45d2bd9' => 
    array (
      0 => '/Applications/MAMP/htdocs/php7-c9/php_libs/testhqf.tpl',
      1 => 1500024228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee9a78cbeff80_74310932 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript" src="js/quickform.js" async><?php echo '</script'; ?>
>
<form <?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>
    <?php echo $_smarty_tpl->tpl_vars['form']->value['hidden'];?>

<?php if (isset($_smarty_tpl->tpl_vars['form']->value['name']['error'])) {?>
    <div style="color: red"><?php echo $_smarty_tpl->tpl_vars['form']->value['name']['error'];?>
</div>
<?php }
echo $_smarty_tpl->tpl_vars['form']->value['name']['label'];?>
:<?php echo $_smarty_tpl->tpl_vars['form']->value['name']['html'];?>

<?php echo $_smarty_tpl->tpl_vars['form']->value['submit']['html'];?>

</form>
<?php if (isset($_smarty_tpl->tpl_vars['form']->value['javascript'])) {?>
    <?php echo $_smarty_tpl->tpl_vars['form']->value['javascript'];?>

<?php }
}
}
