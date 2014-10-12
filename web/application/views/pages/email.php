<div class="span12">
    <div class="padded-element">
        <h2>Email Us!</h2>
        <p class="subtitle">(Are you interested in sponsoring us?<br />Or do you want to host our event at your location?<br />Drop us an email using the form below and we'll do our best to respond asap.)</p>

        <?php echo form_open(current_url(), array('class'=>'form-vertical')) ?>
        <fieldset>
            <?php $str = form_error('name'); ?>
            <div class="control-group<?php echo ($str == NULL)?'':' error'?>">
                <div class="controls">
                    <label for="name">Name *</label>
                    <input type="text" class="input-xlarge" id="name" name="name" placeholder="Enter your name here" value="<?php echo set_value('name'); ?>" tabindex="1"><br />
                    <?php echo ($str == NULL)?'':'<span class="help-inline">'.$str.'</span>'?>
                </div>
            </div>

            <?php $str = form_error('email'); ?>
            <div class="control-group<?php echo ($str == NULL)?'':' error'?>">
                <div class="controls">
                    <label for="email">Email Address *</label>
                    <input type="text" class="input-xlarge" id="email" name="email" placeholder="Enter your email address here" value="<?php echo set_value('email'); ?>" tabindex="2"><br />
                    <?php echo ($str == NULL)?'':'<span class="help-inline">'.$str.'</span>'?>
                </div>
            </div>

            <?php $str = form_error('subject'); ?>
            <div class="control-group<?php echo ($str == NULL)?'':' error'?>">
                <div class="controls">
                    <label for="subject">Subject *</label>
                    <input type="text" class="input-xlarge" id="subject" name="subject" placeholder="Enter the email subject here" value="<?php echo set_value('subject'); ?>" tabindex="3"><br />
                    <?php echo ($str == NULL)?'':'<span class="help-inline">'.$str.'</span>'?>
                </div>
            </div>

            <?php $str = form_error('msg'); ?>
            <div class="control-group<?php echo ($str == NULL)?'':' error'?>">
                <div class="controls">
                    <label for="msg">Message *</label>
                    <textarea name="msg" id="msg" class="textarea-half" tabindex="4"><?php echo set_value('msg'); ?></textarea><br />
                    <?php echo ($str == NULL)?'':'<span class="help-inline">'.$str.'</span>'?>
                </div>
            </div>
            <input type="text" class="captcha2" name="captcha2">

        </fieldset>
        <button type="submit" class="btn">Contact us now!</button>
        </form>
    </div>
</div>