<?php /* Smarty version Smarty-3.1.14, created on 2013-09-02 22:42:09
         compiled from "template\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:286365224f821e67934-31107597%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1330b55f35665f430ce9b8167feebce9b68bc0a' => 
    array (
      0 => 'template\\index.tpl',
      1 => 1378136416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '286365224f821e67934-31107597',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mode' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5224f8223b48f5_81817932',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5224f8223b48f5_81817932')) {function content_5224f8223b48f5_81817932($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_table')) include 'C:\\xampp\\smarty\\libs\\plugins\\function.html_table.php';
?><html>
<head>
<?php if ($_smarty_tpl->tpl_vars['mode']->value=='pelne'){?>
<title>Smarty. Wyswietlanie pelnych artykulow</title>
<?php }else{ ?>
<title>Smarty. Wyswietlanie zajawek</title>
<?php }?>
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['mode']->value=='pelne'){?>
<h3><?php echo $_smarty_tpl->tpl_vars['news']->value['autor'];?>
: <?php echo $_smarty_tpl->tpl_vars['news']->value['tytul'];?>
</h3>
<p><?php echo $_smarty_tpl->tpl_vars['news']->value['zajawka'];?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['news']->value['rozwiniecie'];?>
</p>
<a href="<?php echo $_SERVER['SCRIPT_NAME'];?>
">powrot</a>
<?php }else{ ?>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['news']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
<table border="1" cellspacing="0" cellpadding="0" 
  <?php if (!(1 & $_smarty_tpl->getVariable('smarty')->value['section']['i']['iteration'])){?> bgcolor="EAEAEA"<?php }?>>
<tr><td><?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['autor'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tytul'];?>
</td></tr>
<tr><td colspan="2"><?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['zajawka'];?>
</td></tr>
<td  colspan="2" align="right">
  <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>
?n=<?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
">wiecej</a>
</td></tr>
</table>
<hr>
<?php endfor; endif; ?>
<?php }?>
<?php echo smarty_function_html_table(array(),$_smarty_tpl);?>

</body>
</html><?php }} ?>