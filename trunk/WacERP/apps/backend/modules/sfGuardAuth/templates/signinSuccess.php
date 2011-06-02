<?php 
//use_helper('I18N');

use_stylesheet('common/wac/main.css');
use_stylesheet(WacAssetHelper::getInstance()->getI18nCssDir().'apps/backend/sfGuardAuth/signin.css');
?>
<div>
    <?php if (!empty($form)) { ?>
    <form id="signinForm" name="signinForm" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
        <div id="panelErrorMsg">
            <span id="error_username" class="<?php echo $form['username']->hasError() ? 'wacError' : ''; ?>">
                    <?php echo __($form['username']->getError()); ?>
            </span>
        </div>

        <div id="login">
            <div id="cap-top"></div>
            <div id="cap-body">
                <div id="branding" align="center">
                    <?php echo image_tag(WacAssetHelper::getInstance()->getI18nImageDir().'apps/backend/sfGuardAuth/login_logo.png', array('style' => 'border-width:0px;height:60px;width:316px;', 'id' => 'imgLogo')); ?>
                </div>
                <div id="panelLogin">

                    <div>
                        <label>
                                <?php echo __('Username'); ?>
                        </label>
                            <?php echo $form['username']->render(array("class"=>"textbox340")); ?>
                    </div>
                    <div>
                        <label>
                                <?php echo __('Password'); ?>
                        </label>
                            <?php echo $form['password']->render(array("class"=>"textbox340")); ?>
                    </div>

                    <div class="submit clearfix">
                        <input value="<?php echo __('Login'); ?>" type="image" src="<?php echo WacAssetHelper::getInstance()->getI18nImageDir().'apps/backend/sfGuardAuth/button-login.png'; ?>" alt="Login" name="btnLogin" id="btnLogin" />
                    </div>

                </div>


            </div>
            <div id="cap-bottom"></div>
        </div><!-- END #login -->

    </form>
        <?php } ?>



</div>