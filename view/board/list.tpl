{include file="header.tpl" title=$title}
            
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

                {foreach $boardList as $boarditem}
                <tr>
                    <td>
                        {$boarditem.id}
                    </td>
                    
                    <td>
                        <a href="../view/{$boardname}?id={$boarditem.id}">
                        {$boarditem.subject}
                        </a>
                    </td>
                    
                    <td>
                        {$boarditem.username}
                    </td>
                    <td>
                        {$boarditem.cnt}
                    </td>
                    
                {/foreach}
                <!--
                    {foreach $boarditem as $value}
                    <td style="width:15%">
                    </td>
                    {/foreach}
                -->
            </table>
            <!-- 게시판 -->

            <a href="../write/{$boardname}">글쓰기</a>

            {include file="paging.tpl"}

{include file="footer.tpl"}