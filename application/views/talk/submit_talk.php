<div class="span12">
    <div class="padded-element">
        <h2>Submit a talk!</h2>
        <p class="subtitle">(Talk about a technology you are really passionate about.<br /> Can be anything techy/geeky in nature.)</p>

        <?php echo form_open(current_url().(isset($talk['_id'])?'/'.$talk['_id']:''), array('class'=>'form-vertical')) ?>
        <fieldset>
            <?php $str = form_error('title'); ?>
            <div class="control-group<?php echo ($str == NULL)?'':' error'?>">
                <div class="controls">
                    <label for="title">Title *</label>
                    <input type="text" class="input-xlarge" id="title" name="title" placeholder="Enter the talk's title here" value="<?php echo html_entity_decode(set_value('title', isset($talk['title'])?$talk['title']:'')); ?>" tabindex="1"><br />
                    <?php echo ($str == NULL)?'':'<span class="help-inline">'.$str.'</span>'?>
                </div>
            </div>

            <?php $str = form_error('talk-description'); ?>
            <div class="control-group<?php echo ($str == NULL)?'':' error'?>">
                <div class="controls">
                    <label for="talk-description">Description of the talk *</label>
                    <textarea name="talk-description" id="talk-description" class="textarea-half" tabindex="2"><?php echo html_entity_decode(set_value('talk-description', isset($talk['description'])?$talk['description']:'')); ?></textarea><br />
                    <?php echo ($str == NULL)?'':'<span class="help-inline">'.$str.'</span>'?>
                </div>
            </div>

            <?php $str = form_error('speaker-name'); ?>
            <div class="control-group<?php echo ($str == NULL)?'':' error'?>">
                <div class="controls">
                    <label for="speaker-name">Speaker Name *</label>
                    <input type="text" class="input-xlarge" id="speaker-name" name="speaker-name" placeholder="Enter your real name here" value="<?php echo html_entity_decode(set_value('speaker-name', isset($talk['speaker_name'])?$talk['speaker_name']:'')); ?>" tabindex="3"><br />
                    <?php echo ($str == NULL)?'':'<span class="help-inline">'.$str.'</span>'?>
                </div>
            </div>

            <?php $str = form_error('email-address'); ?>
            <div class="control-group<?php echo ($str == NULL)?'':' error'?>">
                <div class="controls">
                    <label for="email-address">Email Address *</label>
                    <p class="sublabel">(Note! Your email address is collected to arrange the schedules when the vote results are out.<br />It will not be released to public without your permission)</p>
                    <input type="text" class="input-xlarge" id="email-address" name="email-address" placeholder="Enter your email address here" value="<?php echo html_entity_decode(set_value('email-address', isset($talk['email'])?$talk['email']:'')); ?>" tabindex="4"><br />
                    <?php echo ($str == NULL)?'':'<span class="help-inline">'.$str.'</span>'?>
                </div>
            </div>

            <?php $str = form_error('website'); ?>
            <div class="control-group<?php echo ($str == NULL)?'':' error'?>">
                <div class="controls">
                    <label for="website">Website</label>
                    <input type="text" class="input-xlarge" id="website" name="website" placeholder="Enter your website here" value="<?php echo html_entity_decode(set_value('website', isset($talk['website'])?$talk['website']:'')); ?>" tabindex="5"><br />
                    <?php echo ($str == NULL)?'':'<span class="help-inline">'.$str.'</span>'?>
                </div>
            </div>

            <?php $str = form_error('twitter-handle'); ?>
            <div class="control-group<?php echo ($str == NULL)?'':' error'?>">
                <div class="controls">
                    <label for="twitter-handle">Twitter handle</label>
                    <input type="text" class="twitter-input input-xlarge" id="twitter-handle" name="twitter-handle" placeholder="geekcamp" value="<?php echo html_entity_decode(set_value('twitter-handle', isset($talk['twitter_handle'])?$talk['twitter_handle']:'')); ?>" tabindex="6"><br />
                    <?php echo ($str == NULL)?'':'<span class="help-inline">'.$str.'</span>'?>
                </div>
            </div>
            <?php if(!isset($edit)):?>
            <?php $str = form_error('captcha'); 
            $digit1 = rand(0, 9);
            $digit2 = rand(0, 9);
            $operation = rand(0, 2);
            ?>
            <div class="control-group<?php echo (isset($captcha) && !$captcha)?' error':''?>">
                <div class="controls">
                    <label for="captcha"><?php 
                        switch ($operation) {
                            case 0:
                                echo 'What is the sum of '."$digit1".' and '."$digit2".'?';
                                break;
                            
                            case 1:
                                echo 'What do you get when you subtract '."$digit1".' from '."$digit2".'?';
                                break;
                            case 2:
                                echo 'What is '."$digit1".' multiplied by '."$digit2".'?';
                                break;
                        }
                    ?></label>
                    <input type="text" class="input-xlarge" id="captcha" name="captcha" tabindex="7"><br />
                    <input type="hidden" value="<?php echo $operation?>" name="operation">
                    <input type="hidden" value="<?php echo $digit1?>" name="digit1">
                    <input type="hidden" value="<?php echo $digit2?>" name="digit2">
                    <?php echo (isset($captcha) && !$captcha)?'<span class="help-inline">Your answer was wrong. Please try again.</span>':''?>
                </div>
            </div>
            <input type="text" class="captcha2" name="captcha2">
            <?php endif; ?>
            <?php if (isset($edit) && $edit){ ?>
            <div class="control-group">
                <div class="controls">
                    <label for="twitter-handle">Twitter handle</label>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <button type="button" id="published" class="btn btn-primary<?php echo set_value('publish_status',isset($talk['published'])?$talk['published']:FALSE)?' active':'' ?>">Publish</button>
                        <button type="button" id="unpublished" class="btn btn-primary<?php echo set_value('publish_status',isset($talk['published'])?$talk['published']:FALSE)?'':' active' ?>">Unpublished</button>
                    </div>
                    <input type="hidden" id="publish_status" name="publish_status" value="<?php echo set_value('publish_status',isset($talk['published'])?$talk['published']:FALSE)?'TRUE':'FALSE'?>">
                </div>
            </div>
                    
            <?php } ?>
        </fieldset>
        <button type="submit" class="btn"><?php if(isset($edit)){?>Update talk now!<?php }else{?>Register talk now! <?php }?></button>
        </form>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>static/js/bootstrap-button.js"></script>
<script type="text/javascript">
$(document).ready(function(){
        $('.btn-group').button();
        $('#published').click(function(){
            $('#publish_status').val('TRUE');
        });
        $('#unpublished').click(function(){
            $('#publish_status').val('FALSE');
        });

    }
);
</script>
