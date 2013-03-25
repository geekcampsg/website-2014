<div class="span12">
    <div class="padded-element">
        <div class="alert alert-success">Your talk has been updated. It will be shown on the front page in a <b>couple of minutes</b>.</div>
        <h2 class="about">Share your talk!</h2>
        <p class="subtitle">Let people know about your talk by sharing it/liking it below!</p>
        <?php 
        $url_share_normal = site_url('talk/view/'.$talk['_id']);
        ?>
        <br />
        <div style="width:90px;" class="fb-like" data-href="<?php echo $url_share_normal ?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>
        <div class="g-plusone" data-href="<?php echo $url_share_normal ?>" data-width="90" data-size="medium"></div>
    </div>
</div>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>