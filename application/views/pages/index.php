<link href="<?php echo base_url('static/css/contactable.css') ?>" rel="stylesheet" type="text/css">
<div id="contactable1"></div>
<div class="span7">
  <h2 class="about">What is it?</h2>
  <p class="subtitle">Conference for the geeks.</p>
  <p class="subtitle">No quick get rich schemes. No startup talks. This is a purely tech conference.</p> 
  <p class="subtitle"><b>For geeks. By geeks.</b></p>
  <h2 class="about">Theme</h2>
  <p class="subtitle">This year, our theme is <pre>Bring a youngling to GeekcampSG!</pre></p> 
  <p class="subtitle">The geek scene's average age has been growing year by year over the past few years, and we believe that the time is now right to get more younglings in again :) So, bring a young geek along with you when you come to GeekcampSG this year.</p>
  <h2 class="about">Topics up for voting!</h2>
  <p class="subtitle"><b>Like or +1 the topics that you want to hear to vote.</b> Voting will close 1 week before the event. Top 15 talks (depending on venue) will be scheduled.</p>
  <p class="subtitle">Sign up for the event <a href="http://geekcampsg2012.eventbrite.com">here</a>. Register your talk <a href="<?php echo site_url('pages/submit_talk') ?>">here</a>.</p>
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
          <b><?php echo $talk['title']?></b><br /><?php echo html_entity_decode($talk['description']) ?><br />
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
</div>
<div class="span5">
  <h2 class="about">Brought to you by</h2>
  <p class="subtitle">
    <ul>
      <li><a href="http://geeksphere.net">Laurence Putra</a></li>
      <li>Luther Goh</li>
      <li>Sneha Menon</li>
      <li>Chua Ruiwen</li>
      <li>Justin Lee</li>
      <li>Shan MPL</li>
      <li>Vishnu Prem</li>
    </ul>
  </p>
  <h2 class="about">Partners</h2>
  <p class="sublabel">Interested to work with us?</p>
  <p class="sublabel">Click the Feedback button on the left and drop us a message.</p>
  <h3 class="about">Media Partners</h2>
  <span class="info">
    <a href="http://e27.sg" target="_blank"><img class="partner-images" src="<?php echo base_url('static/images/e27-logo.png')?>"></a>
    <a href="http://sgentrepreneurs.com/" target="_blank"><img class="partner-images" src="<?php echo base_url('static/images/sge-logo.jpeg')?>"></a>
  </span>
</div>
<script type="text/javascript" src="<?php echo base_url('static/js/jquery1.7.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/js/jquery.validate.pack.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/js/jquery.contactable.min.js')?>"></script>
<script type="text/javascript">
     $('#contactable').contactable({
      subject: 'Feedback for GeekcampSG',
      url : 'pages/email',
      hideOnSubmit: true,
     });
</script>