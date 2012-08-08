<a href="https://github.com/laurenceputra/Geekcamp.SG/" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png" alt="Fork me on GitHub"></a>
<div class="span7">
  <h2 class="about">What is it?</h2>
  <p class="subtitle">Conference for the geeks.</p>
  <p class="subtitle">No startup talks. No how to get rich talks. This is purely a tech conference.</p> 
  <p class="subtitle"><b>For geeks. By geeks.</b></p>
  <p class="subtitle">Hashtag: <b>#geekcampsg</b> | Date: <b>18th August 2012</b> | Time: <b>9:30am to 6pm (Afterparty afterwards)</b> | Location: <b>Microsoft</b></p>
  <p class="subtitle">Talks confirmed! Schedule can be found over <a href="<?php echo site_url('schedule/view_schedule') ?>">here</a></p>
  <h2 class="about">Theme</h2>
  <p class="subtitle">This year, our theme is</p>
  <pre>Bring a youngling to GeekcampSG!</pre> 
  <p class="subtitle">The geek scene's average age has been growing year by year over the past few years, and we believe that the time is now right to get more younglings in again :) So, bring a young geek along with you when you come to GeekcampSG this year.</p>
  <pre>Youngling: A geek who's still in school, be it Primary, Secondary, ITE/Poly/JC, or Uni.</pre>
  <h2 class="about">Topics up for voting!</h2>
  <p class="subtitle"><b>Like or +1 the topics that you want to hear to vote.</b> Voting will close on 5 Aug 2359h. Top 15 talks (depending on venue) will be scheduled.</p>
  <p class="subtitle">Each talk should last around 30 minutes.</p>
  <h3>Announcements</h3>
  <h4>28/07/2012</h4>
  <p class="subsubtitle">We will be closing talks submission on Aug 1, so do register your talk by then if you want to volunteer a talk. Thanks!<em>- Laurence</em></p>
  <p class="subtitle"></p>
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
          <a id="<?php echo preg_replace("/[^a-zA-Z0-9]/", "", $talk['year'].'-'.$talk['title'].'-'.$talk['speaker_name']) ?>"></a>
          <b><?php echo $talk['title']?></b><br /><?php echo str_replace(PHP_EOL, '<br />', html_entity_decode($talk['description'])) ?><br />
          <?php 
          $url_share_normal = site_url('pages/index/'.$talk['year'].'/'.preg_replace("/[^a-zA-Z0-9]/", "", $talk['title']).'/'.preg_replace("/[^a-zA-Z0-9]/", "", $talk['speaker_name']).'#'.preg_replace("/[^a-zA-Z0-9]/", "", $talk['year'].'-'.$talk['title'].'-'.$talk['speaker_name']));
          ?>
          <br />
          <div class="fb-like" data-href="<?php echo $url_share_normal ?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>
          <div class="g-plusone" data-href="<?php echo $url_share_normal ?>" data-width="90" data-size="medium"></div>
        </td>
        <td><?php echo $talk['speaker_name'] ?><br />
          <?php if($talk['twitter_handle']){ ?>
          <a href="http://twitter.com/<?php echo $talk['twitter_handle']?>" target="_blank">@<?php echo $talk['twitter_handle']?></a><br /><?php } ?>
          <?php if($talk['website']){ ?>
          <a href="<?php echo $talk['website']?>" target="_blank">Link</a><br /><?php } ?>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>
  <?php } ?>
</div>
<div class="span5">
  <h2 class="about">Brought to you by</h2>
  <ul class="subtitle">
    <li>Chua Ruiwen</li>
    <li><a href="http://flavors.me/joycehliting" target="_blank">Joyce Huang</a></li>
    <li>Justin Lee</li>
    <li><a href="http://geeksphere.net" target="_blank">Laurence Putra</a></li>
    <li>Luther Goh (elfgoh)</li>
    <li><a href="https://twitter.com/shannietron" target="_blank">Shanmugam Mpl</a></li>
    <li>Sneha Menon</li>
    <li>Vishnu Prem</li>
  </ul>
  <h2 class="about">Partners</h2>
  <p class="sublabel">Interested to work with us?</p>
  <p class="sublabel">Drop us an email <a href="<?php echo site_url('pages/email')?>">here</a>.</p>
  <h3 class="about">Platinum Sponsors</h3>
    <a href="https://www.windowsazure.com/en-us/pricing/free-trial/?WT.mc_id=AB39D46DE" target="_blank"><img class="platinum-sponsor-images" src="<?php echo base_url('static/images/winazure-logo.png')?>" alt="Windows Azure"></a>
  <h3 class="about">Gold Sponsors</h3>
    <a href="http://www.softlayer.com/cloudcash" target="_blank"><img class="gold-sponsor-images" src="<?php echo base_url('static/images/softlayer-logo.png')?>" alt="Softlayer"><p>Promo Code: SNGCLOUD01</p></a>
  <h3 class="about">Supported By</h3>
    <a href="http://www.ida.gov.sg/home/index.aspx" target="_blank"><img class="platinum-sponsor-images" src="<?php echo base_url('static/images/ida-logo.jpg')?>" alt="IDA"></a>
  <h3 class="about">Digital Media Partner</h3>
    <a href="http://www.tech65.org/" target="_blank"><img class="platinum-sponsor-images" src="<?php echo base_url('static/images/tech65-logo.jpg')?>" alt="IDA"></a>
  <h3 class="about">Media Partners</h3>
  <div class="info">
    <a href="http://e27.sg" target="_blank"><img class="media-partner-images" src="<?php echo base_url('static/images/e27-logo.jpg')?>" alt="e27"></a>
    <a href="http://sgentrepreneurs.com/" target="_blank"><img class="media-partner-images" src="<?php echo base_url('static/images/sge-logo.jpg')?>" alt="sge"></a>
    <a href="http://www.techinasia.com/" target="_blank"><img class="media-partner-images" src="<?php echo base_url('static/images/techinasia-logo.jpg')?>" alt="Tech In Asia"></a>
  </div>
  <h3 class="about">Community Partners</h3>
  <div class="info">
    <a href="http://hackerspace.sg" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/hackerspace-logo.jpg')?>" alt="HackerspaceSG"></a>
    <a href="https://www.facebook.com/groups/sghypertextpreprocessors" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/singapore-php-logo.jpg')?>" alt="SG PHP Meetup Group"></a>
    <a href="http://www.nushackers.org" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/nushackers-logo.jpg')?>" alt="NUSHackers"></a>
    <a href="https://groups.google.com/forum/#!forum/singapore-rb" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/srb-logo.jpg')?>" alt="Singapore Ruby Brigade"></a>
    <a href="http://www.sggeekgirls.com" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/sg-geek-girls-logo.jpg')?>" alt="SG Geek Girls"></a>
    <a href="http://www.meetup.com/devops-singapore" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/devops-logo.png')?>" alt="DevOps Singapore"></a>
    <a href="http://iosdevscout.com" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/ios-dev-scout-logo.png')?>" alt="IOS Dev Scout"></a>
    <a href="https://www.facebook.com/groups/littlehackers/" target="_blank" title="parent-and-child bonding through creative and techie projects"><img class="community-partner-images" src="<?php echo base_url('static/images/little-hackers-logo.png')?>" alt="A place for creative and techie kids to showcase their projects"></a>
    <a href="https://www.facebook.com/groups/pythonsg/" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/pugs-logo.jpg')?>" alt="PUGS"></a>

    
  </div>
</div>
<div id="fb-root"></div>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>