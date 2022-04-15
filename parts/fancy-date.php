<?php nc_formatted_date();?>

<style>
/* Date Module 

<div class="ddate">
  <span class="ddate_month">Mar</span>
  <span class="ddate_day">16</span>
  <span class="ddate_year">2021</span>            
</div>

Use function "nc_formatted_date()"

*/

.ddate {
  display: flex;
  flex-direction: column;
  text-align: center;
  font-size: 1.75em;
  text-transform: uppercase;
  line-height: 1;
  width: fit-content;
  font-family: var(--mono);
}

.ddate_month {
  letter-spacing: 0.2em;
  position: relative;
  left: 0.1em;
}

.ddate_day {
  font-family: var(--sans);
}

.ddate_month, .ddate_year {
  font-size: 0.5em;
}

.ddate_link {
  display: flex;
  margin: 1em 0
}

.ddate_link:last-of-type {
  margin-bottom: 0;
}

.ddate_link .ddate {
  margin-right: 1rem;
}

.ddate_year {
  font-family: var(--mono)
}

</style>