<div class="span12">
    <div class="padded-element">
        <?php if(isset($msg)){ ?>
        <div class="alert alert-success"><?php echo $msg ?></div>
        <?php }  ?>
        <h2 class="about">Share your talk!</h2>
        <p class="subtitle">Let people know about your talk by sharing it/liking it below!</p>
        <p>
            <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(site_url('pages/index/'.date('Y').'/'.set_value('title').'/'.set_value('speaker-name').'#'.date('Y').'-'.set_value('title').'-'.set_value('speaker-name'))); ?>&amp;send=false&amp;layout=button_count&amp;width=95&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=segoe+ui&amp;height=21&amp;appId=275526672542963" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:95px; height:21px;" allowTransparency="true"></iframe>
            <div class="g-plusone" data-href="<?php echo site_url('pages/index/'.date('Y').'/'.set_value('title').'/'.set_value('speaker-name').'#'.date('Y').'-'.set_value('title').'-'.set_value('speaker-name'))?>" ></div>
        </p>
    </div>
</div>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>