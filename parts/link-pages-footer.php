<?php wp_link_pages( array(
'before' => '<nav class="pagebreak_footer">',
'after' => '</nav>',
'next_or_number'=>'next',
'nextpagelink'=> '<span class="pagebreak_continue">'.__('Continue reading','nc-framework').' &#10140;</span>',
'previouspagelink' => '<span class="pagebreak_goback">'.__('Go back','nc-framework').'</span>',
'link_before' => '',
'link_after' => '',
));?>