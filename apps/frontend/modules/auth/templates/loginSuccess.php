<div class="container">
    <div class="row">
        <div class="span4"></div>
        <div class="span5">
            <fieldset id="loginform">
                <legend><p class="logoLockClosed" ></p><?php echo __('IDENTIFICATION') ?></legend>

            </fieldset>
            <form action="<?php echo url_for('auth/login') ?>" method="post" class="form-signin">
                <table>
                    <?php echo $form ?>
                </table>
                <div class="login_button" >
                    <input style="margin-left: 50%;" class="btn btn-lg btn-primary" type="submit"  value="<?php echo __('VALIDER') ?>"/>
                </div>

            </form>
        </div>
    </div>
</div>