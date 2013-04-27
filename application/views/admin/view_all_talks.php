<div class="span12">
  <div class="padded-element">
    <?php if($talks->count() == 0){ ?>
    <p class="subtitle">No talks submitted for this year yet.</p>
    <?php }
    else{?>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Topic</th>
          <th>Speaker</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($talks as $talk) { ?>
        <tr>
          <td>
            <b><a href="<?php echo site_url('admin/edit_talk/'.$talk['_id'])?>"><?php echo $talk['title']?></a> <?php if($talk['published']){?> (Published) <?php }else{?> (Unpublished) <?php }?></b><br /><?php echo $talk['description'] ?><br />
          <?php 
          $url_share_normal = site_url('talk/view/'.$talk['_id']);
          ?>
          <div class="fb-like" data-href="<?php echo $url_share_normal ?>" data-send="false" data-layout="standard" data-width="45-" data-show-faces="false"></div>
          <div class="g-plusone" data-href="<?php echo $url_share_normal ?>" data-width="450" data-annotation="inline"></div>
          </td>
          <td><?php echo $talk['speaker_name'] ?><br />
            <?php echo $talk['email'] ?><br />
            <?php if($talk['twitter_handle']){ ?>
            <a href="http://twitter.com/<?php echo $talk['twitter_handle']?>" target="_blank">@<?php echo $talk['twitter_handle']?></a><br /><?php } ?>
            <?php if($talk['website']){ ?>
            <a href="<?php echo $talk['website']?>" target="_blank"><?php echo $talk['website']?></a><br /><?php } ?>
          </td>
        </tr>
        <?php }?>
        
      </tbody>
    </table>
    <?php } ?>
    <?php 
    echo $this->pagination->create_links();
    ?>
  </div>
</div>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>