<div class="paginate">
    <a href="?page={$pagingObj.firstPageNo}" class="first">처음 페이지</a>
    <a href="?page={$pagingObj.prevPageNo}" class="prev">이전 페이지</a>
    <span>
        {for $i = $pagingObj.startPageNo to $pagingObj.endPageNo}
            {if $i === $pagingObj.pageNo}
                <a href="?page={$i}" class="choice">{$i}</a>
            {else}
                <a href="?page={$i}">{$i}</a>
            {/if}
        {/for}
    </span>
    <a href="?page={$pagingObj.nextPageNo}" class="next">다음 페이지</a>
    <a href="?page={$pagingObj.finalPageNo}" class="last">마지막 페이지</a>
</div>