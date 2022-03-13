{include file="header.tpl" title=$title}
            
            <!-- 게시판 -->
            <form action="../modify_ok/{$boardname}" method="POST">
            <input type="hidden" name="boardname" value="{$boardname}">
            <input type="hidden" name="articleId" value="{$boardview.id}">

            <table class="cakeon_write_tbl">
                <tr>
                    <td style="width:15%">
                        제목
                    </td>
                    <td>
                        <input type="text" name="subject" value="{$boardview.subject}">
                    </td>
                </tr>
                <tr>
                    <td>
                        작성자
                    </td>
                    <td>
                        <input type="text" name="username" value="{$boardview.username}">
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
                        <textarea name="memo">{$boardview.memo}</textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">   
                        <input type="submit" value="작성">
                    </td>
                </tr>
            </table>

            {if isset($boardfile) }
            <!-- 파일 목록 -->
            <table class="cakeon_write_tbl">
                <tr>
                    <td>번호</td>
                    <td>파일명</td>
                    <td>파일크기</td>
                </tr>
                
                {foreach $boardfile as $fileitem}
                <tr>
                    <td>{$fileitem.id}</td>
                    <td>
                        <a href="../download/{$boardname}?file_id={$fileitem.id}">
                            {$fileitem.original_name}
                        </a>
                        </td>
                    <td>{$fileitem.file_size}</td>
                </tr>
                {/foreach}
            </table>
            <!-- 파일 목록 -->
            {/if}
            
            </form>
            <!-- 게시판 -->
            

{include file="footer.tpl"}

</body>
</html>