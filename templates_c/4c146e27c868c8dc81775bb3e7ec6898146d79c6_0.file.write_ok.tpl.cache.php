<?php
/* Smarty version 4.0.4, created on 2022-03-13 15:39:29
  from 'C:\wamp\apache2\htdocs\hello2\view\board\write_ok.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.4',
  'unifunc' => 'content_622d91a1904884_69756362',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c146e27c868c8dc81775bb3e7ec6898146d79c6' => 
    array (
      0 => 'C:\\wamp\\apache2\\htdocs\\hello2\\view\\board\\write_ok.tpl',
      1 => 1647153564,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_622d91a1904884_69756362 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '313415229622d91a18fa741_32921832';
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
                        <?php if ($_smarty_tpl->tpl_vars['status']->value === 1) {?>
                            <a href="../list/<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
">목록으로</a>
                        <?php } else { ?>
                            <a href="../write/<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
">목록으로</a>
                        <?php }?>
                    </td>
                </tr>
            </table>
            <!-- 게시판 -->
            

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
