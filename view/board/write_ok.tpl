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
                        {if $status === 1}
                            <a href="../list/{$boardname}">목록으로</a>
                        {else}
                            <a href="../write/{$boardname}">목록으로</a>
                        {/if}
                    </td>
                </tr>
            </table>
            <!-- 게시판 -->
            

{include file="footer.tpl"}

</body>
</html>