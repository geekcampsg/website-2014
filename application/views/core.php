<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Geekcamp.SG</title>
    <meta name="description" content="Littlespark Coming soon page">
    <meta name="author" content="littlespark VT">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="<?php echo base_url()?>static/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>static/css/custom.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
  </head>

  <body>

    <div class="container">
      <div class="row">

        <div class="span6">
          <a href="<?php echo base_url() ?>"><h1 class="logo">Geekcamp.SG</h1></a>
        </div>
        <div class="span6">
          <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffacebook.com%2Fgeekcampsg&amp;send=false&amp;layout=button_count&amp;width=95&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=segoe+ui&amp;height=21&amp;appId=275526672542963" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:95px; height:21px;" allowTransparency="true"></iframe>
          <a href="https://twitter.com/geekcamp" class="twitter-follow-button" data-show-count="true" data-lang="en">Follow @GeekcampSG</a>
        </div>
      </div>
      <div class="row">
        <?php echo $content ?>
      </div>
      <hr>     
      <footer>
        <div class="row">
        <div class="span4">
          <p>Bring a youngling to GeekcampSG this year!</p>
          <p>Page generated in <?php echo $this->benchmark->elapsed_time();?>s</p>
        </div>
        </div>
      </footer>
    </div> <!-- /container -->
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </body>

</html>