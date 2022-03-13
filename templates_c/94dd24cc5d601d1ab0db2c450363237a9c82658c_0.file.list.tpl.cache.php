<?php
/* Smarty version 4.0.4, created on 2022-03-13 14:39:27
  from 'C:\wamp\apache2\htdocs\hello2\view\board\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.4',
  'unifunc' => 'content_622d838fa6b039_70558321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94dd24cc5d601d1ab0db2c450363237a9c82658c' => 
    array (
      0 => 'C:\\wamp\\apache2\\htdocs\\hello2\\view\\board\\list.tpl',
      1 => 1647149965,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:paging.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_622d838fa6b039_70558321 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1725552585622d838fa600c8_85015705';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['title']->value), 0, false);
?>
            
            <!-- 게시판 -->
            <table class="cakeon_list_tbl">
                <tr>
                    <td style="width:15%">
                        번호
                    </td>
                    <td>
                        제목
                    </td>
                    <td>
                        작성자
                    </td>
                    <td>
                        조회수
                    </td>
                </tr>

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['boardList']->value, 'boarditem');
$_smarty_tpl->tpl_vars['boarditem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['boarditem']->value) {
$_smarty_tpl->tpl_vars['boarditem']->do_else = false;
?>
                <tr>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['boarditem']->value['id'];?>

                    </td>
                    
                    <td>
                        <a href="../view/<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
?id=<?php echo $_smarty_tpl->tpl_vars['boarditem']->value['id'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['boarditem']->value['subject'];?>

                        </a>
                    </td>
                    
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['boarditem']->value['username'];?>

                    </td>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['boarditem']->value['cnt'];?>

                    </td>
                    
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <!--
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['boarditem']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                    <td style="width:15%">
                    </td>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                -->
            </table>
            <!-- 게시판 -->

            <a href="../write/<?php echo $_smarty_tpl->tpl_vars['boardname']->value;?>
">글쓰기</a>

            <?php $_smarty_tpl->_subTemplateRender("file:paging.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
