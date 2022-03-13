<?php
/* Smarty version 4.0.4, created on 2022-03-13 17:16:02
  from 'C:\wamp\apache2\htdocs\hello2\view\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.4',
  'unifunc' => 'content_622da8425b1bd2_85089575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac5c1a50f7f026d2973a605609c20b086c18224d' => 
    array (
      0 => 'C:\\wamp\\apache2\\htdocs\\hello2\\view\\index.tpl',
      1 => 1646801734,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_622da8425b1bd2_85089575 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1798899408622da8425659c2_71731112';
?>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['option_selected']->value;?>
</title>
    <?php echo '<script'; ?>
 src="./js/helloWorld.js"><?php echo '</script'; ?>
>
</head>

<body>
<h1></h1>

<a href="javascript:hello();">링크</a>

</body>
</html>
<?php }
}
