<div class="span12">
    <div class="padded-element">
        <h2>Login</h2>
        <?php 
        echo form_open('user/login_form', array('class'=>'form-vertical')); 
        ?>
        <fieldset> 
            <?php if($error){ ?>
            <div class="alert alert-error">Either your email or password is wrong.</div>
            <?php } ?>
            <?php $str = form_error('email'); ?>
            <div class="control-group<?php echo ($str == NULL)?'':' error'?>">
                <div class="controls">
                    <label>Email Address</label>
                      <input type="text" class="input-xlarge" id="email" name="email" placeholder="Type your email here" value="<?php echo set_value('email'); ?>" tabindex="1"><br /><?php echo ($str == NULL)?'':'<span class="help-inline">'.$str.'</span>'?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label>Password</label>
                    <input type="password" class="input-xlarge" id="password" name="password" placeholder="Type your password here" tabindex="2">
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn signup">Login</button>
        <?php echo form_close(); ?>
        <p><a href="<?php echo site_url('user/forget_password_form'); ?>">Forgot your password?</a></p>
    </div>
</div>
