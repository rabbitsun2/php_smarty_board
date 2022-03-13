{include file="header.tpl" title=$title}
            
            <!-- 게시판 -->
            <table class="cakeon_write_tbl">
                <tr>
                    <td style="width:15%">
                        제목
                    </td>
                    <td colspan="3">
                        {$boardview.subject}
                    </td>
                </tr>
                <tr>
                    <td>
                        작성자
                    </td>
                    <td colspan="3">
                        {$boardview.username}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">   
                        내용
                    </td>
                </tr>
                
                <tr>
                    <td colspan="4">   
                        {$boardview.memo}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">   
                        {$boardview.regidate}
                    </td>
                </tr>
            </table>

            <a href="../delete/{$boardname}?id={$boardview.id}">글삭제</a>
            <a href="../list/{$boardname}">목록</a>
            <a href="../modify/{$boardname}?id={$boardview.id}">글수정</a>
            <!-- 게시판 -->
            
            
            {if isset($boardfile) }
            <!-- 파일 목록 -->
            <table class="cakeon_write_tbl">
                <tr>
                    <td>번호</td>
                    <td>파일명</td>
                    <td>파일크기</td>
                </tr>
                {$i=1}
                {foreach $boardfile as $fileitem}
                    
                <tr>
                    <td>{$i}</td>
                    <td>
                        <a href="../download/{$boardname}?file_id={$fileitem.id}">
                            {$fileitem.original_name}
                        </a>
                        </td>
                    <td>{$fileitem.file_size}</td>
                </tr>
                    {$i=$i+1}
                {/foreach}
            </table>
            <!-- 파일 목록 -->
            {/if}

{include file="footer.tpl"}

</body>
</html>