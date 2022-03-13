<?php
/* Smarty version 4.0.4, created on 2022-03-13 17:02:28
  from 'C:\wamp\apache2\htdocs\hello2\view\board\view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.4',
  'unifunc' => 'content_622da5143f13f9_97254540',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f39d4706770f7c60c15f3eafb6923a5aee2472a' => 
    array (
      0 => 'C:\\wamp\\apache2\\htdocs\\hello2\\view\\board\\view.tpl',
      1 => 1647158545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_622da5143f13f9_97254540 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '582978435622da5143d1886_16997613';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['title']->value), 0, false);
?>
            
            <!-- 게시판 -->
            <table class="cakeon_write_tbl">
                <tr>
                    <td style="width:15%">
                        제목
                    </td>
                    <td colspan="3">
                        <?php echo $_smarty_tpl->tpl_vars['boardview']->value['subject'];?>

                    </td>
                </tr>
                <tr>
                    <td>
                        작성자
                    </td>
                    <td colspan="3">
                        <?php echo $_smarty_tpl->tpl_vars['boardview']->value['username'];?>

                    </td>
                </tr>
                <tr>
                    <td colspan="4">   
                        내용
                    </td>
                </tr>
                
                <tr>
                    <td colspan="4">   
                        <?php echo $_smarty_tpl->tpl_vars['boardview']->value['memo'];?>

                    </td>
                </tr>
                <tr>
                    <td colspan="4">   
                        <?php echo $_smarty_tpl->tpl_vars['boardview']->value['regidate'];?>

                    </td>
                </tr>
            </table>

            <a href="../delete/<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
?id=<?php echo $_smarty_tpl->tpl_vars['boardview']->value['id'];?>
">글삭제</a>
            <a href="../list/<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
">목록</a>
            <a href="../modify/<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
?id=<?php echo $_smarty_tpl->tpl_vars['boardview']->value['id'];?>
">글수정</a>
            <!-- 게시판 -->
            
            
            <?php if ((isset($_smarty_tpl->tpl_vars['boardfile']->value))) {?>
            <!-- 파일 목록 -->
            <table class="cakeon_write_tbl">
                <tr>
                    <td>번호</td>
                    <td>파일명</td>
                    <td>파일크기</td>
                </tr>
                <?php $_smarty_tpl->_assignInScope('i', 1);?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['boardfile']->value, 'fileitem');
$_smarty_tpl->tpl_vars['fileitem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['fileitem']->value) {
$_smarty_tpl->tpl_vars['fileitem']->do_else = false;
?>
                    
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
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
                    <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
            <!-- 파일 목록 -->
            <?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
