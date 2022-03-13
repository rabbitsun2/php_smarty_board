<?php
/* Smarty version 4.0.4, created on 2022-03-13 19:19:59
  from 'C:\wamp\apache2\htdocs\hello2\view\board\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.4',
  'unifunc' => 'content_622dc54f532bf4_08247396',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94dd24cc5d601d1ab0db2c450363237a9c82658c' => 
    array (
      0 => 'C:\\wamp\\apache2\\htdocs\\hello2\\view\\board\\list.tpl',
      1 => 1647149965,
      2 => 'file',
    ),
    '0f82169ac6b18028214248ef06f5e9a10eedfd8d' => 
    array (
      0 => 'C:\\wamp\\apache2\\htdocs\\hello2\\view\\board\\header.tpl',
      1 => 1646882798,
      2 => 'file',
    ),
    'b03c655d39c3ad8cb5aa613fc79b79ccd98cb63c' => 
    array (
      0 => 'C:\\wamp\\apache2\\htdocs\\hello2\\view\\board\\paging.tpl',
      1 => 1647147817,
      2 => 'file',
    ),
    '3aa8b9bfba56776b5cf10abaf2e569ac2ab5895c' => 
    array (
      0 => 'C:\\wamp\\apache2\\htdocs\\hello2\\view\\board\\footer.tpl',
      1 => 1646887376,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_622dc54f532bf4_08247396 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
    <meta charset="UTF-8">
    <title>Hello World</title>

    <style>

        .cakeon_home_tbl{
            width:100%;
            margin:auto;
            border-collapse: collapse;
        }

        .cakeon_list_tbl{
            width:100%;
            margin:auto;
            border-collapse: collapse;
        }

        .cakeon_list_tbl td{
            border: 1px solid #444444;
        }

        .cakeon_write_tbl{
            width:100%;
            margin:auto;
            border-collapse: collapse;
        }

        .cakeon_write_tbl td{
            border: 1px solid #444444;
        }

    </style>

</head>
<body>
    
<table class="cakeon_home_tbl">
    <tr>
        <td>로고</td>
        <td>메뉴바</td>
    </tr>
    <tr>
        <td colspan="2">            
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

                                <tr>
                    <td>
                        51
                    </td>
                    
                    <td>
                        <a href="../view/hello?id=51">
                        반갑습니다
                        </a>
                    </td>
                    
                    <td>
                        반갑다
                    </td>
                    <td>
                        0
                    </td>
                    
                                <tr>
                    <td>
                        50
                    </td>
                    
                    <td>
                        <a href="../view/hello?id=50">
                        반갑습니다
                        </a>
                    </td>
                    
                    <td>
                        반갑다
                    </td>
                    <td>
                        0
                    </td>
                    
                                <tr>
                    <td>
                        49
                    </td>
                    
                    <td>
                        <a href="../view/hello?id=49">
                        반갑습니다
                        </a>
                    </td>
                    
                    <td>
                        반갑다
                    </td>
                    <td>
                        0
                    </td>
                    
                                <tr>
                    <td>
                        48
                    </td>
                    
                    <td>
                        <a href="../view/hello?id=48">
                        반갑습니다
                        </a>
                    </td>
                    
                    <td>
                        반갑다
                    </td>
                    <td>
                        0
                    </td>
                    
                                <tr>
                    <td>
                        47
                    </td>
                    
                    <td>
                        <a href="../view/hello?id=47">
                        반갑습니다
                        </a>
                    </td>
                    
                    <td>
                        반갑다
                    </td>
                    <td>
                        0
                    </td>
                    
                                <tr>
                    <td>
                        46
                    </td>
                    
                    <td>
                        <a href="../view/hello?id=46">
                        반갑습니다444
                        </a>
                    </td>
                    
                    <td>
                        aaa
                    </td>
                    <td>
                        0
                    </td>
                    
                                <tr>
                    <td>
                        43
                    </td>
                    
                    <td>
                        <a href="../view/hello?id=43">
                        반갑습니다
                        </a>
                    </td>
                    
                    <td>
                        반갑다
                    </td>
                    <td>
                        0
                    </td>
                    
                                <tr>
                    <td>
                        42
                    </td>
                    
                    <td>
                        <a href="../view/hello?id=42">
                        반갑습니다
                        </a>
                    </td>
                    
                    <td>
                        반갑다1
                    </td>
                    <td>
                        0
                    </td>
                    
                                <tr>
                    <td>
                        40
                    </td>
                    
                    <td>
                        <a href="../view/hello?id=40">
                        반갑습니다
                        </a>
                    </td>
                    
                    <td>
                        반갑다
                    </td>
                    <td>
                        0
                    </td>
                    
                                <tr>
                    <td>
                        39
                    </td>
                    
                    <td>
                        <a href="../view/hello?id=39">
                        반갑습니다
                        </a>
                    </td>
                    
                    <td>
                        반갑다
                    </td>
                    <td>
                        0
                    </td>
                    
                                <!--
                                        <td style="width:15%">
                    </td>
                                        <td style="width:15%">
                    </td>
                                        <td style="width:15%">
                    </td>
                                        <td style="width:15%">
                    </td>
                                        <td style="width:15%">
                    </td>
                                        <td style="width:15%">
                    </td>
                                        <td style="width:15%">
                    </td>
                                        <td style="width:15%">
                    </td>
                                    -->
            </table>
            <!-- 게시판 -->

            <a href="../write/hello">글쓰기</a>

            <div class="paginate">
    <a href="?page=1" class="first">처음 페이지</a>
    <a href="?page=1" class="prev">이전 페이지</a>
    <span>
                                    <a href="?page=1" class="choice">1</a>
                                                <a href="?page=2">2</a>
                                                <a href="?page=3">3</a>
                                                <a href="?page=4">4</a>
                        </span>
    <a href="?page=2" class="next">다음 페이지</a>
    <a href="?page=4" class="last">마지막 페이지</a>
</div>
        </td>
    </tr>
</table>
</body>
</html><?php }
}
