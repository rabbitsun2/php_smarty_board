{include file="header.tpl" title=$title}
            
            <!-- 게시판 -->
            <form action="../write_ok/{$boardname}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="boardname" value="{$boardname}">
            <input type="hidden" name="token" value="{$token}">

            <table class="cakeon_write_tbl">
                <tr>
                    <td style="width:15%">
                        제목
                    </td>
                    <td colspan="3">
                        <input type="text" name="subject">                        
                    </td>
                </tr>
                <tr>
                    <td>
                        작성자
                    </td>
                    <td colspan="3">
                        <input type="text" name="username">
                    </td>
                </tr>
                <tr>
                    <td style="width:15%">
                        비밀번호
                    </td>
                    <td>
                        <input type="password" name="passwd1">
                    </td>
                    <td style="width:15%">
                        비밀번호 확인
                    </td>
                    <td>
                        <input type="password" name="passwd2">
                    </td>
                </tr>
                <tr>
                    <td colspan="4">   
                        내용
                    </td>
                </tr>
                
                <tr>
                    <td colspan="4">   
                        <textarea name="memo"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        파일업로드
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input type="file" name="usrupload[]" multiple="multiple">
                        <input type="file" name="usrupload[]" multiple="multiple">
                    </td>
                </tr>
                <tr>
                    <td colspan="4">   
                        <input type="submit" value="작성">
                    </td>
                </tr>
            </table>
            </form>
            <!-- 게시판 -->

            <a href="../list/{$boardname}">목록</a>
            

{include file="footer.tpl"}

</body>
</html>