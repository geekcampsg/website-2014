<a href="https://github.com/GeekcampSG/Geekcamp.SG" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png" alt="Fork me on GitHub"></a>
<link href="<?php echo base_url('static/css/prettyPhoto.css')?>" rel="stylesheet">
<div class="span7">
  <h2>What is it?</h2>
  <p class="subtitle">Conference for the geeks.</p>
  <p class="subtitle">No startup talks. No how to get rich talks. This is purely a tech conference.</p> 
  <p class="subtitle">Hashtag: <b>#geekcampsg</b> | Date: <b>7th September 2013</b> | Time: <b>9:30am to 6pm (Afterparty afterwards)</b> | Location: <b>Microsoft, 21st Floor</b></p>
  <p class="subtitle"><b>Sign up over at <a href="http://geekcampsg13.eventbrite.com">Eventbrite</a></b></p>
  <p class="subtitle">Schedule can be found <a href="<?php echo site_url('schedule/view_schedule/2013') ?>">here</a>.</p>
  <p class="subtitle">Coming from overseas? Book your hotel <a href="<?php echo site_url('pages/hotel') ?>">here</a>.</p>
  <h2 class="about">Theme</h2>
  <p class="subtitle">This year, our theme is <code>Because we can!</code>. See inspiration <a rel="geekcampsg[video]" onclick="mixpanel.track('Video | Because we can')" title="Loading video from external site. Please give it a few seconds to load." href="https://www.youtube-nocookie.com/embed/HsbvLd7MSWQ?iframe=true&width=800&height=600">here</a>!</p>
  <h2 class="about">Topics up for voting!</h2>
  <a name="talks"></a>
  <?php if($talks == NULL || $talks->count() == 0){ ?>
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
          <a id="<?php echo $talk['_id'] ?>"></a>
          <?php 
          $url_share_normal = site_url('talk/view/'.$talk['_id']);
          ?>
          <a href="<?php echo $url_share_normal ?>"><b><?php echo $talk['title']?></b></a><br />
          <?php echo str_replace(PHP_EOL, '<br />', html_entity_decode($talk['description'])) ?><br />
          <br />
          <div style="width:90px;" class="fb-like" data-href="<?php echo $url_share_normal ?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>
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
  <h2>Checkout the team <a href="<?php echo site_url('pages/team')?>">here</a></h2>
  
  <h3 class="about">Subscribe to our mailing list</h2>
  <!-- Begin MailChimp Signup Form -->
  <form action="http://geekcamp.us6.list-manage1.com/subscribe/post?u=174cbd8da574a4c003fc8b319&amp;id=b3607cf4d3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <input type="email" value="" name="EMAIL" class="input-large" id="mce-EMAIL" placeholder="email address" required>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary"></div>
  </form>

  <!--End mc_embed_signup-->
  <h2 class="about">Partners</h2>
  <p class="sublabel">Interested to work with us?</p>
  <p class="sublabel">Drop us an email <a href="<?php echo site_url('pages/email')?>">here</a>.</p>
  <h3 class="about">Platinum Sponsor</h3>
    <a onclick="mixpanel.track('Sponsor | Azure')" href="https://www.windowsazure.com/" target="_blank"><img class="platinum-sponsor-images" src="<?php echo base_url('static/images/winazure-logo.png')?>" alt="Windows Azure"></a>
  <h3 class="about">Gold Sponsor</h3>
    <a onclick="mixpanel.track('Sponsor | Odd-e')" href="http://odd-e.com/" target="_blank"><img class="gold-sponsor-images" src="<?php echo base_url('static/images/odd-e-logo.jpeg')?>" alt="Odd-e"></a>
    <a onclick="mixpanel.track('Sponsor | ThoughtWorks')" href="http://www.thoughtworks.com/" target="_blank"><img class="gold-sponsor-images" src="<?php echo base_url('static/images/thoughtworks-logo.jpg')?>" alt="ThoughtWorks"></a>
  <h3 class="about">Supported By</h3>
    <a onclick="mixpanel.track('Sponsor | iDA')" href="http://www.ida.gov.sg/home/index.aspx" target="_blank"><img class="platinum-sponsor-images" src="<?php echo base_url('static/images/ida-logo.jpg')?>" alt="IDA"></a>
  <h3 class="about">Digital Media Partner</h3>
    <a onclick="mixpanel.track('Media Partner | Tech65')" href="http://www.tech65.org/" target="_blank"><img class="platinum-sponsor-images" src="<?php echo base_url('static/images/tech65-logo.jpg')?>" alt="tech65"></a>
  <h3 class="about">Supporting Companies</h3>
    <a onclick="mixpanel.track('Supporting | BillPin')" href="http://billpin.com/" target="_blank"><img class="supporting-company-images" src="<?php echo base_url('static/images/billpin-logo.png')?>" alt="BillPin"></a>
    <a onclick="mixpanel.track('Supporting | TypeSafe')" href="http://typesafe.com/" target="_blank"><img class="supporting-company-images" src="<?php echo base_url('static/images/typesafe-logo.png')?>" alt="TypeSafe"></a>
    <a onclick="mixpanel.track('Supporting | Uber')" href="https://www.uber.com/" target="_blank"><img class="supporting-company-images" src="<?php echo base_url('static/images/uber-logo.png')?>" alt="Uber"></a>
  <h3 class="about">Media Partners</h3>
    <a onclick="mixpanel.track('Media Partner | e27')" href="http://e27.sg" target="_blank"><img class="media-partner-images" src="<?php echo base_url('static/images/e27-logo.jpg')?>" alt="e27"></a>
    <a onclick="mixpanel.track('Media Partner | SGE')" href="http://sgentrepreneurs.com/" target="_blank"><img class="media-partner-images" src="<?php echo base_url('static/images/sge-logo.jpg')?>" alt="sge"></a>
  <h3 class="about">Community Partners</h3>
    <a onclick="mixpanel.track('Community Partner | HackerspaceSG')" href="http://hackerspace.sg" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/hackerspace-logo.jpg')?>" alt="HackerspaceSG"></a>
    <a onclick="mixpanel.track('Community Partner | Singapore PHP User Group')" href="https://www.facebook.com/groups/sghypertextpreprocessors" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/singapore-php-logo.jpg')?>" alt="SG PHP Meetup Group"></a>
    <a onclick="mixpanel.track('Community Partner | NUSHackers')" href="http://www.nushackers.org" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/nushackers-logo.jpg')?>" alt="NUSHackers"></a>
    <a onclick="mixpanel.track('Community Partner | Singapore Ruby Brigade')" href="https://groups.google.com/forum/#!forum/singapore-rb" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/srb-logo.jpg')?>" alt="Singapore Ruby Brigade"></a>
    <a onclick="mixpanel.track('Community Partner | Singapore Geek Girls')" href="http://www.sggeekgirls.com" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/sg-geek-girls-logo.jpg')?>" alt="SG Geek Girls"></a>
    <a onclick="mixpanel.track('Community Partner | Devops Singapore')" href="http://www.meetup.com/devops-singapore" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/devops-logo.png')?>" alt="DevOps Singapore"></a>
    <a onclick="mixpanel.track('Community Partner | iOS Dev Scout')" href="http://iosdevscout.com" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/ios-dev-scout-logo.png')?>" alt="IOS Dev Scout"></a>
    <a onclick="mixpanel.track('Community Partner | Little Hackers')" href="https://www.facebook.com/groups/littlehackers/" target="_blank" title="parent-and-child bonding through creative and techie projects"><img class="community-partner-images" src="<?php echo base_url('static/images/little-hackers-logo.png')?>" alt="A place for creative and techie kids to showcase their projects"></a>
    <a onclick="mixpanel.track('Community Partner | PythonSG')" href="https://www.facebook.com/groups/pythonsg/" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/pugs-logo.jpg')?>" alt="PUGS"></a>
    <a onclick="mixpanel.track('Community Partner | Front End Developer')" href="https://www.facebook.com/groups/frontendsingapore/" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/front-end-developer.jpg')?>" alt="Front End Developer"></a>
    <a onclick="mixpanel.track('Community Partner | We Build SG')" href="http://webuild.sg/" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/we-build-sg.jpg')?>" alt="We Build SG"></a>
    <a onclick="mixpanel.track('Community Partner | Agile SG')" href="https://www.facebook.com/groups/agiledevopssg/" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/agile-sg.jpg')?>" alt="Agile SG"></a>
</div>
<script type="text/javascript" src="<?php echo base_url('static/js/jquery-1.7.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/js/jquery.prettyPhoto.js')?>"></script>
<script type="text/javascript">
  mixpanel.track("Index Loaded");
  $("a[rel='geekcampsg[video]']").prettyPhoto({
      social_tools: false,
      allow_expand: false,
  });
</script>
<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0016/1341.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>
