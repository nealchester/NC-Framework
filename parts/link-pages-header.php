<?php wp_link_pages(array(
'before' => '<nav class="pagebreak_header"><span class="pagebreak_message">'.__('You&#8217;re on page','nc-framework').'</span>',
'after' => '</nav>',
'link_before' => '<span>',
'link_after' => '</span>',
));?>

<style>
/* Internal paging */

.pagebreak_header {
  --ptext-color:#999;
  --pcurrent-color:#000;
}

.pagebreak_header a, 
.pagebreak_footer a {
  display: inline-block;
}

.pagebreak_header {
  color: var(--ptext-color);
  margin-bottom:var(--gap);
}

.pagebreak_header > a, 
.pagebreak_header > span:not(.pagebreak_message) {
  color: inherit;
  padding: 0 0.5em;
}

.pagebreak_header > span:not(.pagebreak_message) {
  font-weight: bold;
  cursor: default;
  color: var(--pcurrent-color);
}

.pagebreak_footer {
  margin-bottom:3rem;
}

.pagebreak_footer a:first-of-type {
  margin-right: 0.7rem;
}

.pagebreak_footer a {
  color:var(--link-color, royalblue);
  font-size:1.2em
}
</style>