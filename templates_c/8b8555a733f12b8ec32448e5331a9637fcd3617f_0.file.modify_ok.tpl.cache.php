<?php
/* Smarty version 4.0.4, created on 2022-03-13 17:53:31
  from 'C:\wamp\apache2\htdocs\hello2\view\board\modify_ok.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.4',
  'unifunc' => 'content_622db10b14cae8_60279421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b8555a733f12b8ec32448e5331a9637fcd3617f' => 
    array (
      0 => 'C:\\wamp\\apache2\\htdocs\\hello2\\view\\board\\modify_ok.tpl',
      1 => 1647082801,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_622db10b14cae8_60279421 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '208941374622db10b146188_00828280';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['title']->value), 0, false);
?>
            
            <!-- 게시판 -->
            <table class="cakeon_write_tbl">
                <tr>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="../modify/<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
?id=<?php echo $_smarty_tpl->tpl_vars['articleId']->value;?>
">이전으로</a>
                    </td>
                </tr>
            </table>
            <!-- 게시판 -->
            

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
