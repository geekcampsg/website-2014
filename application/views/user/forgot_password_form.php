<div class="span12 box drop-shadow">
    <div class="padded-element">
        <h2>Forgot your password?</h2>
        <p><strong>Enter your email here and get a link to reset your password.</strong></p>
        <?php 
        echo form_open('user/forget_password_form', array('class'=>'form-vertical')); 
        ?>
        <fieldset>
            <?php $str = form_error('email'); ?>
            <div class="control-group<?php echo ($str == NULL)?'':' error'?>">
                <div class="controls">
                    <label>Email Address</label>
                      <input type="text" class="input-xlarge" id="email" name="email" placeholder="Type your email here" value="<?php echo set_value('email'); ?>" tabindex="1"><br />
                      <?php echo ($str == NULL)?'':'<span class="help-inline">'.$str.'</span>'?>
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn signup">Reset Password</button>
        <?php echo form_close(); ?>
    </div>
</div>
