<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo isset($title)?$title:'Geekcamp.SG'?></title>
    <meta name="keywords" content="geek, geekcamp, geekcampsg, tech, technology, conference, barcamp"> 
    <meta name="description" content="Join us for GeekcampSG this year, with tons of geeky talks and what not!">
    <meta property="fb:app_id" content="458924617453783">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo isset($meta_title)?$meta_title:'Geekcamp.SG'?>">
    <meta property="og:description" content="<?php echo isset($meta_description)?$meta_description:'Vote for your favourite talks here!'; ?>">
    <meta property="og:image" content="<?php echo base_url()?>static/images/geekcamp-logo-og.jpg" />
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="http://divshot.github.io/geo-bootstrap/swatch/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>static/css/custom.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
    <!-- start Mixpanel --><script type="text/javascript">(function(c,a){window.mixpanel=a;var b,d,h,e;b=c.createElement("script");b.type="text/javascript";b.async=!0;b.src=("https:"===c.location.protocol?"https:":"http:")+'//cdn.mxpnl.com/libs/mixpanel-2.0.min.js';d=c.getElementsByTagName("script")[0];d.parentNode.insertBefore(b,d);a._i=[];a.init=function(b,c,f){function d(a,b){var c=b.split(".");2==c.length&&(a=a[c[0]],b=c[1]);a[b]=function(){a.push([b].concat(Array.prototype.slice.call(arguments,0)))}}var g=a;"undefined"!==typeof f?
g=a[f]=[]:f="mixpanel";g.people=g.people||[];h="disable track track_pageview track_links track_forms register register_once unregister identify name_tag set_config people.set people.increment".split(" ");for(e=0;e<h.length;e++)d(g,h[e]);a._i.push([b,c,f])};a.__SV=1.1})(document,window.mixpanel||[]);
mixpanel.init("adeb4cfee8bc300c7ab493ca2052c1b5");</script><!-- end Mixpanel -->
  </head>

  <body>

    <div class="container">
      <div class="row">

        <div class="span6">
          <a href="<?php echo base_url() ?>"><img src="<?php echo base_url('static/images/geekcampsg-logo-hori.png')?>"></a>
          <p>Click <a href="<?php echo base_url() ?>">here</a> to go back to the normal site.</p>
        </div>
        <div class="span6">
          <div class="fb-like" data-href="https://www.facebook.com/geekcampsg" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>
          <a href="https://twitter.com/geekcamp" class="twitter-follow-button" data-show-count="true" data-lang="en">Follow @GeekcampSG</a>
          <?php if($this->user_lib->is_logged_in()){ ?>
          | <a href="<?php echo site_url('admin/view_all_talks')?>">View all talks</a>
          <a href="<?php echo site_url('user/logout')?>">Logout</a>
          <?php } ?>
        </div>
      </div>
      <div class="row">
        <?php echo $content ?>
      </div>
      <hr>     
      <footer>
        <div class="row">
          <div class="span4">
            <p>Because we can!</p>
            <p>Loading took {elapsed_time}s.</p>
          </div>
          <div style="display:none"><a href="https://mixpanel.com/f/partner"><img src="//cdn.mxpnl.com/site_media/images/partner/badge_blue.png" alt="Mobile Analytics" /></a></div>
        </div>
      </footer>
    </div> <!-- /container -->
    <div id="fb-root"></div>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-32625634-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=458924617453783";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<script type="text/javascript">
  mixpanel.track("Troll Page Load");
</script>
  </body>
</html>