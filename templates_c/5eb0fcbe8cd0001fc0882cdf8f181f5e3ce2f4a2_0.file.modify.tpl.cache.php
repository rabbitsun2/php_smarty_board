<?php
/* Smarty version 4.0.4, created on 2022-03-13 17:53:28
  from 'C:\wamp\apache2\htdocs\hello2\view\board\modify.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.4',
  'unifunc' => 'content_622db10832d6f2_61355770',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5eb0fcbe8cd0001fc0882cdf8f181f5e3ce2f4a2' => 
    array (
      0 => 'C:\\wamp\\apache2\\htdocs\\hello2\\view\\board\\modify.tpl',
      1 => 1647081573,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_622db10832d6f2_61355770 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1652772638622db1082fdc41_28377098';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['title']->value), 0, false);
?>
            
            <!-- 게시판 -->
            <form action="../modify_ok/<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
" method="POST">
            <input type="hidden" name="boardname" value="<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
">
            <input type="hidden" name="articleId" value="<?php echo $_smarty_tpl->tpl_vars['boardview']->value['id'];?>
">

            <table class="cakeon_write_tbl">
                <tr>
                    <td style="width:15%">
                        제목
                    </td>
                    <td>
                        <input type="text" name="subject" value="<?php echo $_smarty_tpl->tpl_vars['boardview']->value['subject'];?>
">
                    </td>
                </tr>
                <tr>
                    <td>
                        작성자
                    </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['boardview']->value['username'];?>
">
                    </td>
                </tr>
                <tr>
                    <td style="width:15%">
                        비밀번호
                    </td>
                    <td>
                        <input type="password" name="passwd">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">   
                        내용
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">   
                        <textarea name="memo"><?php echo $_smarty_tpl->tpl_vars['boardview']->value['memo'];?>
</textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">   
                        <input type="submit" value="작성">
                    </td>
                </tr>
            </table>

            <?php if ((isset($_smarty_tpl->tpl_vars['boardfile']->value))) {?>
            <!-- 파일 목록 -->
            <table class="cakeon_write_tbl">
                <tr>
                    <td>번호</td>
                    <td>파일명</td>
                    <td>파일크기</td>
                </tr>
                
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['boardfile']->value, 'fileitem');
$_smarty_tpl->tpl_vars['fileitem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['fileitem']->value) {
$_smarty_tpl->tpl_vars['fileitem']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['fileitem']->value['id'];?>
</td>
                    <td>
                        <a href="../download/<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
?file_id=<?php echo $_smarty_tpl->tpl_vars['fileitem']->value['id'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['fileitem']->value['original_name'];?>

                        </a>
                        </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['fileitem']->value['file_size'];?>
</td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
            <!-- 파일 목록 -->
            <?php }?>
            
            </form>
            <!-- 게시판 -->
            

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
