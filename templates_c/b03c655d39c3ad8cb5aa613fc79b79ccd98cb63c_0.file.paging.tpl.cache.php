<?php
/* Smarty version 4.0.4, created on 2022-03-13 14:03:39
  from 'C:\wamp\apache2\htdocs\hello2\view\board\paging.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.4',
  'unifunc' => 'content_622d7b2b63a252_00744398',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b03c655d39c3ad8cb5aa613fc79b79ccd98cb63c' => 
    array (
      0 => 'C:\\wamp\\apache2\\htdocs\\hello2\\view\\board\\paging.tpl',
      1 => 1647147817,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_622d7b2b63a252_00744398 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1098103814622d7b2b633868_10782222';
?>
<div class="paginate">
    <a href="?page=<?php echo $_smarty_tpl->tpl_vars['pagingObj']->value['firstPageNo'];?>
" class="first">처음 페이지</a>
    <a href="?page=<?php echo $_smarty_tpl->tpl_vars['pagingObj']->value['prevPageNo'];?>
" class="prev">이전 페이지</a>
    <span>
        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pagingObj']->value['endPageNo']+1 - ($_smarty_tpl->tpl_vars['pagingObj']->value['startPageNo']) : $_smarty_tpl->tpl_vars['pagingObj']->value['startPageNo']-($_smarty_tpl->tpl_vars['pagingObj']->value['endPageNo'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['pagingObj']->value['startPageNo'], $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
            <?php if ($_smarty_tpl->tpl_vars['i']->value === $_smarty_tpl->tpl_vars['pagingObj']->value['pageNo']) {?>
                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="choice"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
            <?php } else { ?>
                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
            <?php }?>
        <?php }
}
?>
    </span>
    <a href="?page=<?php echo $_smarty_tpl->tpl_vars['pagingObj']->value['nextPageNo'];?>
" class="next">다음 페이지</a>
    <a href="?page=<?php echo $_smarty_tpl->tpl_vars['pagingObj']->value['finalPageNo'];?>
" class="last">마지막 페이지</a>
</div><?php }
}
