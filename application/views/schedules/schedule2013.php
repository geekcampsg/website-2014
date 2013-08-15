<link href="<?php echo base_url('static/css/prettyPhoto.css')?>" rel="stylesheet">
<div class="span11">
    <div class="padded-element">
        <table class="table">
        	<thead>
        		<tr>
        			<th>Time</th>
        			<th>Auditorium (21st Floor)</th>
        			<th>Hall (22nd Floor)</th>
        		</tr>
        	</thead>
        	<tbody>
        		<tr>
        			<td>10:00 - 10:15</td>
        			<td>Opening</td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>10:15 - 11:00</td>
        			<td>Ruby, Rock and Roll by <strong>Sau Sheong</strong></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>11:00 - 11:45</td>
        			<td>Scale without NoSQL by <strong>Justin Mann</strong></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>11:45 - 12:30</td>
        			<td>Data Services - The Good, the Bad and the ugly... by <strong>Yap Neng Ginn</strong></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td>12:30 - 1:30</td>
        			<td colspan="2">Lunch</td>
        		</tr>
        		<tr>
        			<td>1:30 - 2:15</td>
        			<td>Building your Own Laptop: The Good, the Bad, and the Ugly by <strong>Andrew 'bunnie' Huang</strong></td>
                    <td>Explore functional programming with Scala by <strong>Raymond Tay</strong></td>
        			
        		</tr>
        		<tr>
        			<td>2:15 - 3:00</td>
        			<td>All work and no Play doesn't scale by <strong>James Roper</strong></td>
        			<td>Useful Tools for Mobile Developers by <strong>Fahim Farook</strong></td>
        		</tr>
        		<tr>
        			<td>3:00 - 3:45</td>
        			<td>Real-Time Chat App with HTML5 WebSockets by <strong>Josh Teng</strong></td>
        			<td>How I crawl the web by <strong>Bryan Lim</strong></td>
        		</tr>
        		<tr>
        			<td>3:45 - 4:30</td>
        			<td>Put it on a map! by <strong>Tim Chandler</strong></td>
                    <td>Building apps with AngularJS by <strong>Ruiwen Chua</strong></td>
        		</tr>
        		<tr>
        			<td>4:30 - 5:15</td>
        			<td>Oh NO. Not more hardware! by <strong>Dave Appleton</strong></td>
        			<td>Hack your own beer by <strong>Markus Baden</strong></td>
        		</tr>
        		<tr>
        			<td>5:15 - 6:00</td>
        			<td>PHP Apps that Scale by <strong>Michael Cheng</strong></td>
                    <td>Youngling Special! <p>Listen to some of the cool things our younglings in school are hacking around with these days.</p></td>
        		</tr>
        		<tr>
        			<td>6:00 till late</td>
        			<td colspan="2">After party @ Secret Location</td>
        		</tr>
        	</tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url('static/js/jquery-1.7.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/js/jquery.prettyPhoto.js')?>"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("a[rel='geekcampsg[slides]']").prettyPhoto({
        social_tools: false,
        allow_expand: false,
    });
    $("a[rel='geekcampsg[videos]']").prettyPhoto({
        social_tools: false,
        allow_expand: false,
    });
  });
  mixpanel.track("Schedule 2012 loaded");
</script>