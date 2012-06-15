<a href="https://github.com/laurenceputra/Geekcamp.SG/" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png" alt="Fork me on GitHub"></a>
<div class="span7">
  <h2 class="about">What is it?</h2>
  <p class="subtitle">Conference for the geeks.</p>
  <p class="subtitle">No startup talks. No how to get rich talks. This is purely a tech conference.</p> 
  <p class="subtitle"><b>For geeks. By geeks.</b></p>
  <h2 class="about">Theme</h2>
  <p class="subtitle">This year, our theme is <pre>Bring a youngling to GeekcampSG!</pre></p> 
  <p class="subtitle">The geek scene's average age has been growing year by year over the past few years, and we believe that the time is now right to get more younglings in again :) So, bring a young geek along with you when you come to GeekcampSG this year. <pre>Youngling: A geek who's still in school, be it Primary, Secondary, ITE/Poly/JC, or Uni.</pre></p>
  <h2 class="about">Topics up for voting!</h2>
  <p class="subtitle"><b>Like or +1 the topics that you want to hear to vote.</b> Voting will close 1 week before the event. Top 15 talks (depending on venue) will be scheduled.</p>
  <p class="subtitle">Sign up for the event <a href="http://geekcampsg12.eventbrite.com" target="_blank">here</a>. Register your talk <a href="<?php echo site_url('pages/submit_talk') ?>">here</a>.</p>
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
          <a name="<?php echo $talk['year'].'-'.$talk['title'].'-'.$talk['speaker_name'] ?>"></a>
          <b><?php echo $talk['title']?></b><br /><?php echo str_replace(PHP_EOL, '<br />', html_entity_decode($talk['description'])) ?><br />
          <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(site_url('pages/index/'.$talk['year'].'/'.$talk['title'].'/'.$talk['speaker_name'].'#'.$talk['year'].'-'.$talk['title'].'-'.$talk['speaker_name'])) ?>&amp;send=false&amp;layout=button_count&amp;width=95&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=segoe+ui&amp;height=21&amp;appId=275526672542963" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:95px; height:21px;" allowTransparency="true"></iframe>
          <div class="g-plusone" data-href="<?php echo site_url('pages/index/'.$talk['year'].'/'.$talk['title'].'/'.$talk['speaker_name'].'#'.$talk['year'].'-'.$talk['title'].'-'.$talk['speaker_name']) ?>" ></div>

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
      <li>Chua Ruiwen</li>
      <li>Joyce Huang</li>
      <li>Justin Lee</li>
      <li><a href="http://geeksphere.net" target="_blank">Laurence Putra</a></li>
      <li>Luther Goh (elfgoh)</li>
      <li><a href="https://twitter.com/shannietron" target="_blank">Shanmugam Mpl</a></li>
      <li>Sneha Menon</li>
      <li>Vishnu Prem</li>
    </ul>
  </p>
  <h2 class="about">Partners</h2>
  <p class="sublabel">Interested to work with us?</p>
  <p class="sublabel">Drop us an email <a href="<?php echo site_url('pages/email')?>">here</a>.</p>
  <h3 class="about">Media Partners</h2>
  <span class="info">
    <a href="http://e27.sg" target="_blank"><img class="media-partner-images" src="<?php echo base_url('static/images/e27-logo.png')?>"></a>
    <a href="http://sgentrepreneurs.com/" target="_blank"><img class="media-partner-images" src="<?php echo base_url('static/images/sge-logo.jpeg')?>"></a>
    <a href="http://www.techinasia.com/" target="_blank"><img class="media-partner-images" src="<?php echo base_url('static/images/techinasia-logo.jpg')?>"></a>
  </span>
</div>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>