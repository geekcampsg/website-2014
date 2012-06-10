
<div class="span12">
    <div class="padded-element">
            <h2>Reset your password</h2>
            <p><strong>Type your new password here.</strong></p>
            <?php 
            echo form_open('user/password_reset_form/'.$key, array('class'=>'form-vertical')); 
            ?>
            <fieldset>
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
            <button type="submit" class="btn signup">Reset your password</button>
            <?php echo form_close(); ?>
    </div>
</div>
