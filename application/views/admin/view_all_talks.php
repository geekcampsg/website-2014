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
            <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode('http://geekcamp.sg/#'.$talk['year'].'-'.$talk['title'].'-'.$talk['speaker_name']); ?>&amp;send=false&amp;layout=button_count&amp;width=95&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=segoe+ui&amp;height=21&amp;appId=275526672542963" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:95px; height:21px;" allowTransparency="true"></iframe>
          </td>
          <td><?php echo $talk['speaker_name'] ?><br />
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
  