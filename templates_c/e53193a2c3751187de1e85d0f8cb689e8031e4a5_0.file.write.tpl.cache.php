<?php
/* Smarty version 4.0.4, created on 2022-03-13 15:57:47
  from 'C:\wamp\apache2\htdocs\hello2\view\board\write.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.4',
  'unifunc' => 'content_622d95eb485ea6_63910750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e53193a2c3751187de1e85d0f8cb689e8031e4a5' => 
    array (
      0 => 'C:\\wamp\\apache2\\htdocs\\hello2\\view\\board\\write.tpl',
      1 => 1647154666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_622d95eb485ea6_63910750 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1910936225622d95eb446dc3_23997784';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['title']->value), 0, false);
?>
            
            <!-- 게시판 -->
            <form action="../write_ok/<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="boardname" value="<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
">
            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">

            <table class="cakeon_write_tbl">
                <tr>
                    <td style="width:15%">
                        제목
                    </td>
                    <td colspan="3">
                        <input type="text" name="subject">                        
                    </td>
                </tr>
                <tr>
                    <td>
                        작성자
                    </td>
                    <td colspan="3">
                        <input type="text" name="username">
                    </td>
                </tr>
                <tr>
                    <td style="width:15%">
                        비밀번호
                    </td>
                    <td>
                        <input type="password" name="passwd1">
                    </td>
                    <td style="width:15%">
                        비밀번호 확인
                    </td>
                    <td>
                        <input type="password" name="passwd2">
                    </td>
                </tr>
                <tr>
                    <td colspan="4">   
                        내용
                    </td>
                </tr>
                
                <tr>
                    <td colspan="4">   
                        <textarea name="memo"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        파일업로드
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input type="file" name="usrupload[]" multiple="multiple">
                        <input type="file" name="usrupload[]" multiple="multiple">
                    </td>
                </tr>
                <tr>
                    <td colspan="4">   
                        <input type="submit" value="작성">
                    </td>
                </tr>
            </table>
            </form>
            <!-- 게시판 -->

            <a href="../list/<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
">목록</a>
            

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
