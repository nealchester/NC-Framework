<?php 
$siteurl = get_permalink();
$sitetitle = get_the_title();
$share_on = __('Share on', 'nc-framework');
?>

<div class="sharelinks">

  <a class="sharelinks_anchor" href="https://www.facebook.com/sharer.php?u=<?php echo $siteurl; ?>" target="_blank" rel="nofollow" title="<?php echo $share_on;?> FaceBook">
  <?php get_template_part('img/social/facebook.svg');?>
  </a>

  <a class="sharelinks_anchor" href="https://twitter.com/intent/tweet?url=<?php echo $siteurl; ?>&text=<?php echo $sitetitle; ?>&via=" target="_blank" rel="nofollow" title="<?php echo $share_on;?> Twitter">
  <?php get_template_part('img/social/twitter.svg');?>
  </a>

  <a class="sharelinks_anchor" href="https://www.pinterest.com/pin/create/button?url=<?php echo $siteurl; ?>&media=&description=<?php echo $sitetitle; ?>" target="_blank" rel="nofollow" title="<?php echo $share_on;?> Pinterest">
  <?php get_template_part('img/social/pinterest.svg');?>
  </a>
 
  <a class="sharelinks_anchor" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo str_replace(':','%3A', $siteurl); ?>&title=<?php echo $sitetitle; ?>&summary=&source=" target="_blank" rel="nofollow" title="<?php echo $share_on;?> LinkedIn">
    <?php get_template_part('img/social/linkedin.svg');?>
  </a>

  <a class="sharelinks_anchor" title='<?php _e('Click to copy','nc-framework'); echo ' "'.$siteurl.'"'; ?> to clipboard' onclick="copyToClipboard()">
  <?php get_template_part('img/icon-link.svg');?>
  </a>

  <a class="sharelinks_anchor" href="mailto:%7Bemail_address%7D?subject=<?php echo $sitetitle; ?>&body=<?php echo $siteurl; ?>%20" target="_blank" rel="nofollow" title="<?php _e('Share via Email','nc-framework');?>">
  <?php get_template_part('img/social/email.svg');?>
  </a>

</div>

<script>
  function copyToClipboard(text) {
  var inputc = document.body.appendChild(document.createElement("input"));
  inputc.value = window.location.href;
  inputc.focus();
  inputc.select();
  document.execCommand('copy');
  inputc.parentNode.removeChild(inputc);
  alert("URL Copied.");
  }
</script>