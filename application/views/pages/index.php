<a href="https://github.com/GeekcampSG/Geekcamp.SG" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png" alt="Fork me on GitHub"></a>
<link href="<?php echo base_url('static/css/prettyPhoto.css')?>" rel="stylesheet">
<div class="span7">
	<h2>What is it?</h2>
	<p class="subtitle">Conference for the geeks.</p>
	<p class="subtitle">No startup talks. No how to get rich talks. This is purely a tech conference.</p> 
	<p class="subtitle">Hashtag: <b>#geekcampsg</b> | Date: <b>18th October 2014</b> | Time: <b>9:30am to 6pm (Afterparty afterwards)</b> | Location: <b>NUS School of Computing</b></p>
	<p class="subtitle">Talk Submissions have closed. Voting will close on <b>Sept 15th</b></p>
	<h2 class="about">Topics up for voting!</h2>
	<a name="talks"></a>
	<?php if($talks == NULL || $talks->count() == 0){ ?>
	<p class="subtitle">No talks submitted for this year yet. <b></p>
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
					<div class="social">
						<div style="width:90px;" class="fb-like" data-href="<?php echo $url_share_normal ?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>
						<div class="g-plusone" data-href="<?php echo $url_share_normal ?>" data-width="90" data-size="medium"></div>
					</div>
					
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
	<h3><a href="<?php echo site_url('pages/team')?>">The Team</a></h3>
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
	<h3 class="about">Lunch Sponsor</h3>
		<a onclick="mixpanel.track('Sponsor | PayPal')" href="http://paypal.com/" target="_blank"><img class="platinum-sponsor-images" src="<?php echo base_url('static/images/paypal-logo-new.png')?>" alt="12Geeks"></a>
	<h3 class="about">Venue Sponsor</h3>
		<a onclick="mixpanel.track('Sponsor | SoC')" href="http://www.comp.nus.edu.sg/" target="_blank"><img class="platinum-sponsor-images" src="<?php echo base_url('static/images/soc-logo.png')?>" alt="12Geeks"></a>
	<h3 class="about">Supporting Companies</h3>
		<a onclick="mixpanel.track('Supporting | 12Geeks')" href="http://12Geeks.com/" target="_blank"><img class="supporting-company-images" src="<?php echo base_url('static/images/12geeks-logo.png')?>" alt="12Geeks"></a>
	<h3 class="about">Media Partners</h3>
		<a onclick="mixpanel.track('Media Partner | e27')" href="http://e27.sg" target="_blank"><img class="media-partner-images" src="<?php echo base_url('static/images/e27-logo.png')?>" alt="e27"></a>
	<h3 class="about">Community Partners</h3>
		<a onclick="mixpanel.track('Community Partner | HackerspaceSG')" href="http://hackerspace.sg" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/hackerspace-logo.jpg')?>" alt="HackerspaceSG"></a>
		<a onclick="mixpanel.track('Community Partner | Singapore PHP User Group')" href="https://www.facebook.com/groups/sghypertextpreprocessors" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/singapore-php-logo.jpg')?>" alt="SG PHP Meetup Group"></a>
		<a onclick="mixpanel.track('Community Partner | NUSHackers')" href="http://www.nushackers.org" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/nushackers-logo.jpg')?>" alt="NUSHackers"></a>
		<a onclick="mixpanel.track('Community Partner | Singapore Ruby Brigade')" href="https://groups.google.com/forum/#!forum/singapore-rb" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/srb-logo.jpg')?>" alt="Singapore Ruby Brigade"></a>
		<a onclick="mixpanel.track('Community Partner | Singapore Geek Girls')" href="http://www.sggeekgirls.com" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/sg-geek-girls-logo.jpg')?>" alt="SG Geek Girls"></a>
		<a onclick="mixpanel.track('Community Partner | Devops Singapore')" href="http://www.meetup.com/devops-singapore" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/devops-logo.png')?>" alt="DevOps Singapore"></a>
		<a onclick="mixpanel.track('Community Partner | iOS Dev Scout')" href="http://iosdevscout.com" target="_blank"><img class="community-partner-images" src="<?php echo base_url('static/images/ios-dev-scout-logo.png')?>" alt="IOS Dev Scout"></a>
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
