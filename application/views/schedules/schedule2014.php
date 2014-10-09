<link href="<?php echo base_url('static/css/prettyPhoto.css')?>" rel="stylesheet">
<p class="subtitle">Hashtag: <b>#geekcampsg</b> | Date: <b>18th October 2014</b> | Time: <b>9:30am to 6pm (Afterparty afterwards)</b> | Location: <b>NUS School of Computing</b></p>
<div class="span11">
    <div class="padded-element">
        <table class="table">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Room 1</th>
                    <th>Room 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>10:00 - 10:15</td>
                    <td>Opening Address</td>
                    <td></td>
                </tr>
                <tr>
                    <td>10:15 - 11:00</td>
                    <td>Keynote: Introduction to Distributed Systems by <strong>Raymond Tay</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td>11:00 - 11:45</td>
                    <td>Free Wheatley - Breathing life into iconic figurines by <strong>Michelle Lye</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td>11:45 - 12:30</td>
                    <td>Money, Sex and Evolution by <strong>Sau Sheong</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td>12:30 - 1:30</td>
                    <td colspan="2">Lunch</td>
                </tr>
                <tr>
                    <td>1:30 - 2:15</td>
                    <td>Tech adventures of a minister by <strong>Dr Vivian Balakrishnan</strong></td>
                    <td>AB testing framework (in Go) for more than just color/copy changes by <strong>Ishan Agrawal</strong></td>
                </tr>
                <tr>
                    <td>2:15 - 3:00</td>
                    <td>Building awesome user interfaces by <strong>Prof Zhao</strong></td>
                    <td>So what about Ruby on Rails?... from a PHP Guy by <strong>Michael Cheng</strong></td>
                </tr>
                <tr>
                    <td>3:00 - 3:45</td>
                    <td>Why HTML5 doesn't work for Mobile Apps by <strong>Subhransu Behera</strong></td>
                    <td>ES6 - The future of Javascript by <strong>Ryo Chikazawa</strong></td>
                </tr>
                <tr>
                    <td>3:45 - 4:30</td>
                    <td>Making hardware come Alive by <strong>Kenneth Lim</strong></td>
                    <td>Ohai, Elixir! by <strong>Benjamin Tan</strong></td>
                </tr>
                <tr>
                    <td>4:30 - 5:15</td>
                    <td>The Last Great Hardware Show by <strong>Dave Appleton</strong></td>
                    <td>Bluetooth Low Energy on iOS by <strong>Mugunth Kumar</strong></td>
                </tr>
                <tr>
                    <td>5:15 - 6:00</td>
                    <td>Game of Drones: Algorithms and hardware design for Quadcopters by <strong>Shipeng Xu</strong></td>
                    <td>The internet of things (that make beer) by <strong>Markus Baden</strong></td>
                </tr>
                <tr>
                    <td>6:00 - 6:15</td>
                    <td>Closing Address</td>
                    <td></td>
                </tr>
                <tr>
                    <td>6:15 till late</td>
                    <td colspan="2">After party @ Sapore</td>
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
