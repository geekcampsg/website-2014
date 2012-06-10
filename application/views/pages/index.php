<div class="span7">
  <h2 class="about">What is it?</h2>
  <p class="subtitle">Conference for the geeks.</p>
  <p class="subtitle">No quick get rich schemes. No startup talks. This is a purely tech conference. For geeks. By geeks.</p>
  <h2 class="about">Theme</h2>
  <p class="subtitle">This year, our theme is <pre>Bring a youngling to GeekcampSG!</pre></p> 
  <p class="subtitle">The geek scene's average age has been growing year by year over the past few years, and we believe that the time is now right to get more younglings in again :) So, bring a young geek along with you when you come to GeekcampSG this year.</p>
  <h2 class="about">Topics up for voting!</h2>
  <p class="subtitle">Sign up to talk <a href="<?php echo site_url('pages/submit_talk') ?>">here</a>!</p>
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
          <b><?php echo $talk['title']?></b><br /><?php echo $talk['description'] ?><br />
          <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode('http://geekcamp.sg/#'.$talk['year'].'-'.$talk['title'].'-'.$talk['speaker_name']); ?>&amp;send=false&amp;layout=button_count&amp;width=95&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=segoe+ui&amp;height=21&amp;appId=275526672542963" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:95px; height:21px;" allowTransparency="true"></iframe>
        </td>
        <td><?php echo $talk['speaker_name'] ?><br /><a href="http://twitter.com/<?php echo $talk['twitter_handle']?>" target="_blank">@<?php echo $talk['twitter_handle']?></a></td>
      </tr>
      <?php }?>
      
    </tbody>
  </table>
</div>
<div class="span5">
  <h2 class="about">Partners</h2>
  <h3 class="about">Platinum Sponsors</h2>
  <h3 class="about">Gold Sponsors</h2>
  <h3 class="about">Silver Sponsors</h2>
  <h3 class="about">Media Partners</h2>
  <span class="info">
    <a href="http://e27.sg" target="_blank"><img class="partner-images" src="<?php echo base_url()?>static/images/e27-logo.png"></a>
    <a href="http://sgentrepreneurs.com/" target="_blank"><img class="partner-images" src="<?php echo base_url()?>static/images/sge-logo.jpeg"></a>
  </span>
</div>