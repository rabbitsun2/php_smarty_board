{include file="header.tpl" title=$title}
            
            <form action="../delete_ok/{$boardname}" method="POST">
                <input type="hidden" name="articleId" value="{$articleId}">
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

            <a href="../view/{$boardname}?id={$articleId}">게시물 보기</a>

            <!-- 게시판 -->
            

{include file="footer.tpl"}

</body>
</html>