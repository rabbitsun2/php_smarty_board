<?php
/* Smarty version 4.0.4, created on 2022-03-13 16:28:37
  from 'C:\wamp\apache2\htdocs\hello2\view\board\deleteView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.4',
  'unifunc' => 'content_622d9d25d33505_36345456',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5735c432e26e8e5d2782c2bc8923f79750217037' => 
    array (
      0 => 'C:\\wamp\\apache2\\htdocs\\hello2\\view\\board\\deleteView.tpl',
      1 => 1647084214,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_622d9d25d33505_36345456 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1323668697622d9d25cdf813_27346494';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['title']->value), 0, false);
?>
            
            <form action="../delete_ok/<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
" method="POST">
                <input type="hidden" name="articleId" value="<?php echo $_smarty_tpl->tpl_vars['articleId']->value;?>
">
            <!-- 게시판 -->
            <table class="cakeon_write_tbl">
                <tr>
                    <td>
                        비밀번호를 입력하세요.
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="passwd">
                    </td>
                </tr>
                <tr>
                    <td>   
                        <input type="submit" value="확인">
                    </td>
                </tr>
            </table>
            </form>

            <a href="../view/<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
?id=<?php echo $_smarty_tpl->tpl_vars['articleId']->value;?>
">게시물 보기</a>

            <!-- 게시판 -->
            

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
