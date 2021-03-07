<?php

function nc_formatted_date()
{
    echo '<div class="ddate">
            <span class="ddate_month">' . get_the_date("M") . '</span>
            <span class="ddate_day">' . get_the_date("d") . '</span>
            <span class="ddate_year">' . get_the_date("Y") . '</span>            
        </div>';
}

?>