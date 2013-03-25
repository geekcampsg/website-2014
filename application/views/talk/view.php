<div class="span12">
    <div class="padded-element">
        <h3>View more talks  <a href="<?php echo base_url()?>">here</a>!</h3>
        <p class="subsubtitle">Click on the Facebook Like Button, or Google +1 button to vote.</p>
        <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Topic</th>
            <th>Speaker</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <b><?php echo $talk['title']?></b><br /><?php echo str_replace(PHP_EOL, '<br />', html_entity_decode($talk['description'])) ?><br />
              <?php 
              $url_share_normal = site_url('talk/view/'.$talk['_id']);
              ?>
              <br />
              <div style="width:90px;" class="fb-like" data-href="<?php echo $url_share_normal ?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>
              <div class="g-plusone" data-href="<?php echo $url_share_normal ?>" data-width="90" data-size="medium"></div>
            </td>
            <td><?php echo $talk['speaker_name'] ?><br />
              <?php if($talk['twitter_handle']): ?>
              <a href="http://twitter.com/<?php echo $talk['twitter_handle']?>" target="_blank">@<?php echo $talk['twitter_handle']?></a><br />
              <?php endif; ?>
              <?php if($talk['website']): ?>
              <a href="<?php echo $talk['website']?>" target="_blank">Link</a><br />
              <?php endif; ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>