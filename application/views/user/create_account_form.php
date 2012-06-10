<div class="span12">
    <div class="padded-element">
        <h2>Creating an account</h2>
        <?php 
        echo form_open('user/create_account_form', array('class'=>'form-vertical')); 
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
            <?php $str = form_error('password'); ?>
            <div class="control-group<?php echo ($str == NULL)?'':' error'?>">
                <div class="controls">
                    <label>Password</label>
                    <input type="password" class="input-xlarge" id="password" name="password" placeholder="Type your password here" tabindex="2"><br />
                      <?php echo ($str == NULL)?'':'<span class="help-inline">'.$str.'</span>'?>
                </div>
            </div>
            <?php $str = form_error('password_conf'); ?>
            <div class="control-group<?php echo ($str == NULL)?'':' error'?>">
                <div class="controls">
                    <label>Password Confirmation</label>
                    <input type="password" class="input-xlarge" id="password_conf" name="password_conf" placeholder="Type your password Confirmation here" tabindex="3"><br />
                    <?php echo ($str == NULL)?'':'<span class="help-inline">'.$str.'</span>'?>
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn signup">Register here</button>
        <?php echo form_close(); ?>
    </div>
</div>