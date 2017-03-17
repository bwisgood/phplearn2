<?php
/* Smarty version 3.1.30, created on 2017-03-17 12:06:52
  from "D:\php\test01\smarty\test\tpl\test.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cbd15ce846e7_08976685',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '165e48e81400d36b3ddfdafbeb0cfb0834eb90bb' => 
    array (
      0 => 'D:\\php\\test01\\smarty\\test\\tpl\\test.tpl',
      1 => 1489752411,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cbd15ce846e7_08976685 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\php\\test01\\smarty\\libs\\plugins\\modifier.date_format.php';
$_smarty_tpl->compiled->nocache_hash = '669058cbd15ce39559_09544900';
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['time']->value);?>

<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['time']->value,"%Y-%B-%e %H-%M-%S");
}
}
