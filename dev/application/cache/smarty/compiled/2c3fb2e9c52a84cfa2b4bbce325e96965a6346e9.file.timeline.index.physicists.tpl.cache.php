<?php /* Smarty version Smarty-3.1.11, created on 2012-11-13 17:29:17
         compiled from "application\views\partials\timeline.index.physicists.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54850a2755da62408-83738607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c3fb2e9c52a84cfa2b4bbce325e96965a6346e9' => 
    array (
      0 => 'application\\views\\partials\\timeline.index.physicists.tpl',
      1 => 1352796710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54850a2755da62408-83738607',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'physicists' => 0,
    'physicist' => 1,
    'year' => 1,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50a2755db127c3_14569800',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a2755db127c3_14569800')) {function content_50a2755db127c3_14569800($_smarty_tpl) {?><?php echo '/*%%SmartyNocache:54850a2755da62408-83738607%%*/<?php  $_smarty_tpl->tpl_vars[\'physicist\'] = new Smarty_Variable; $_smarty_tpl->tpl_vars[\'physicist\']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars[\'physicists\']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, \'array\');}
foreach ($_from as $_smarty_tpl->tpl_vars[\'physicist\']->key => $_smarty_tpl->tpl_vars[\'physicist\']->value){
$_smarty_tpl->tpl_vars[\'physicist\']->_loop = true;
?>/*/%%SmartyNocache:54850a2755da62408-83738607%%*/';?>
 
    <div>
        <p><strong><?php echo '/*%%SmartyNocache:54850a2755da62408-83738607%%*/<?php echo $_smarty_tpl->tpl_vars[\'physicist\']->value->getName();?>
/*/%%SmartyNocache:54850a2755da62408-83738607%%*/';?>
</strong> (<?php echo '/*%%SmartyNocache:54850a2755da62408-83738607%%*/<?php echo $_smarty_tpl->tpl_vars[\'physicist\']->value->getBirth_year();?>
/*/%%SmartyNocache:54850a2755da62408-83738607%%*/';?>
 - <?php echo '/*%%SmartyNocache:54850a2755da62408-83738607%%*/<?php if ($_smarty_tpl->tpl_vars[\'physicist\']->value->getDeath_year()>=99999){?>/*/%%SmartyNocache:54850a2755da62408-83738607%%*/';?>
...<?php echo '/*%%SmartyNocache:54850a2755da62408-83738607%%*/<?php }else{ ?>/*/%%SmartyNocache:54850a2755da62408-83738607%%*/';?>
<?php echo '/*%%SmartyNocache:54850a2755da62408-83738607%%*/<?php echo $_smarty_tpl->tpl_vars[\'physicist\']->value->getDeath_year();?>
/*/%%SmartyNocache:54850a2755da62408-83738607%%*/';?>
<?php echo '/*%%SmartyNocache:54850a2755da62408-83738607%%*/<?php }?>/*/%%SmartyNocache:54850a2755da62408-83738607%%*/';?>
)</p>
        <?php echo '/*%%SmartyNocache:54850a2755da62408-83738607%%*/<?php echo $_smarty_tpl->tpl_vars[\'physicist\']->value->getShort_description();?>
/*/%%SmartyNocache:54850a2755da62408-83738607%%*/';?>

    </div>
<?php echo '/*%%SmartyNocache:54850a2755da62408-83738607%%*/<?php }
if (!$_smarty_tpl->tpl_vars[\'physicist\']->_loop) {
?>/*/%%SmartyNocache:54850a2755da62408-83738607%%*/';?>

    <p>Nenašli sa žiadny fyzici pre rok <?php echo '/*%%SmartyNocache:54850a2755da62408-83738607%%*/<?php echo $_smarty_tpl->tpl_vars[\'year\']->value;?>
/*/%%SmartyNocache:54850a2755da62408-83738607%%*/';?>
.</p>
<?php echo '/*%%SmartyNocache:54850a2755da62408-83738607%%*/<?php } ?>/*/%%SmartyNocache:54850a2755da62408-83738607%%*/';?>
<?php }} ?>