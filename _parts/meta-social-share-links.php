<?php 
$siteurl = get_permalink();
$sitetitle = get_the_title();
$share_on = __('Share on', 'nc-framework');
?>

<div class="sharelinks">

  <a class="sharelinks_anchor brand-facebook" href="https://www.facebook.com/sharer.php?u=<?php echo $siteurl; ?>" target="_blank" rel="nofollow" title="<?php echo $share_on;?> FaceBook">
    <span class="ncicon nc-facebook"></span>
  </a>

  <a class="sharelinks_anchor brand-twitter" href="https://x.com/intent/tweet?url=<?php echo $siteurl; ?>&text=<?php echo $sitetitle; ?>&via=" target="_blank" rel="nofollow" title="<?php echo $share_on;?> X (formerly know as Twitter)">
    <span class="ncicon nc-twitter"></span>
  </a>

  <a class="sharelinks_anchor brand-pinterest" href="https://www.pinterest.com/pin/create/button?url=<?php echo $siteurl; ?>&media=&description=<?php echo $sitetitle; ?>" target="_blank" rel="nofollow" title="<?php echo $share_on;?> Pinterest">
    <span class="ncicon nc-pinterest"></span>
  </a>

  <a class="sharelinks_anchor brand-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo str_replace(':','%3A', $siteurl); ?>&title=<?php echo $sitetitle; ?>&summary=&source=" target="_blank" rel="nofollow" title="<?php echo $share_on;?> LinkedIn">
  <span class="ncicon nc-linkedin"></span>
  </a>

  <a class="sharelinks_anchor brand-pocket" href="https://getpocket.com/save?url=<?php echo str_replace(':','%3A', $siteurl); ?>&title=<?php echo $sitetitle; ?>" target="_blank" rel="nofollow" title="<?php _e('Save to Pocket','nc-framework');?>">
  <span class="ncicon nc-get-pocket"></span>
  </a>

  <a class="sharelinks_anchor brand-reddit" href="https://reddit.com/submit?url=<?php echo str_replace(':','%3A', $siteurl); ?>&title=<?php echo $sitetitle; ?>" target="_blank" rel="nofollow" title="<?php echo $share_on;?> Reddit">
  <span class="ncicon nc-reddit"></span>
  </a>

  <a class="sharelinks_anchor brand-link" title='<?php _e('Click to copy','nc-framework'); echo ' "'.$siteurl.'"'; ?> to clipboard' onclick="NCcopyToClipboard()">
  <span class="ncicon nc-link"></span>
  </a>

  <a class="sharelinks_anchor brand-email" href="mailto:%7Bemail_address%7D?subject=<?php echo $sitetitle; ?>&body=<?php echo $siteurl; ?>%20" target="_blank" rel="nofollow" title="<?php _e('Share via Email','nc-framework');?>">
  <span class="ncicon nc-email"></span>
  </a>

</div>

<script>
  function NCcopyToClipboard(text) {
  var inputc = document.body.appendChild(document.createElement("input"));
  inputc.value = window.location.href;
  inputc.focus();
  inputc.select();
  document.execCommand('copy');
  inputc.parentNode.removeChild(inputc);
  alert("This webpage address has been copied.");
  }
</script>