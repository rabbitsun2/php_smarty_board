{include file="header.tpl" title=$title}
            
            <!-- 게시판 -->
            <table class="cakeon_write_tbl">
                <tr>
                    <td>
                        {$message}
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="../modify/{$boardname}?id={$articleId}">이전으로</a>
                    </td>
                </tr>
            </table>
            <!-- 게시판 -->
            

{include file="footer.tpl"}

</body>
</html>