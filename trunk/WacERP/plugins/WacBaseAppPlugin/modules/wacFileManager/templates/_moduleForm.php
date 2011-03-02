<?php
$moduleName           = $invokeParams['contextInfo']['moduleName'];
$moduleAttachName     = $invokeParams['attachInfo']['name'];
$modulePrefixName     = $invokeParams['contextInfo']['moduleName'].$invokeParams['attachInfo']['name'];
$formDialogId = WacModuleHelper::getFormDialogId($modulePrefixName);
$formId       = WacModuleHelper::getFormId($modulePrefixName);
echo "<div id=\"".$formDialogId."\" title=\"".WacModule::getInstance()->getCaption($modulePrefixName)."\" class=\"ui-widget\" style=\"display: none\" >\n\n";
?>
<!-- form, begin-->
<form name="<?php echo $formId;?>" id="<?php echo $formId;?>" method="post" class="wacFormA">
    <div class="wacFormFirstCol">
        <div class="wacFormContentA">
            <div class="wacFormRow">
                <div class="wacFormItemLeft "><?php echo __("User Name");?></div>
                <div class="wacFormItemRight">
                    <input name="username" id="<?php echo $modulePrefixName; ?>_username" type="text" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                </div>
                <div class="wacFormClear"></div>
            </div>
            <div class="wacFormRow">
                <div class="wacFormItemLeft"><?php echo __("Password");?></div>
                <div class="wacFormItemRight">
                    <input name="password" id="<?php echo $modulePrefixName; ?>_password" maxlength="20" type="password" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                </div>
                <div class="wacFormClear"></div>
            </div>
            <div class="wacFormRow">
                <div class="wacFormItemLeft"><?php echo __("Password").__("Confirm");?></div>
                <div class="wacFormItemRight">
                    <input name="password_confirm" id="<?php echo $modulePrefixName; ?>_password_confirm" maxlength="20" type="password" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                </div>
                <div class="wacFormClear"></div>
            </div>
            <div class="wacFormRow">
                <div class="wacFormItemLeft">
                    <label for="<?php echo $modulePrefixName; ?>_is_active"><?php echo __("Status Active");?></label>
                </div>
                <div class="wacFormItemRight">
                    <input name="is_active" id="<?php echo $modulePrefixName; ?>_is_active" checked="true" value="1" type="checkbox" class="ui-widget-content ui-corner-all" />
                </div>
                <div class="wacFormClear"></div>
            </div>
        </div>
        
        
    </div>
    <div class="wacFormSecondCol">
        <div class="wacFormContentA">
            <div class="wacFormRow">
                <div class="wacFormItemLeft">
                    <label for="<?php echo $modulePrefixName ?>__sf_guard_user_group_list">
                        <?php echo __("User Group");?>
                    </label>
                    <br/>(<?php echo __("Press Ctrl to mutiple select items");?>)
                </div>
                <div class="wacFormItemRight">
                   <select name="user_group_list[]" multiple="multiple" id="<?php echo $modulePrefixName ?>_sf_guard_user_group_list" style="width: 195px; height: 300px" class="ui-widget-content ui-corner-all">
                   </select>
                </div>
                <div class="wacFormClear"></div>
            </div>

        </div>
        
    </div>
    <div class="wacFormClear"></div>
    <div class="wacFormBottom" align="center">

        <hr class="wacFormRuler" style="width:700px; float:inherit;" />

   <div class="wacFormClear"></div>
   <br/>
   <input name="btnSubmit" id="<?php echo $modulePrefixName ?>_btnSubmit" class="ui-button ui-state-default ui-corner-all wacCursor" type="button" value="<?php echo __("Submit");?>"/>
      &nbsp;&nbsp;
      <input name="btnClose" id="<?php echo $modulePrefixName ?>_btnClose" class="ui-button ui-state-default ui-corner-all wacCursor" type="button" value="<?php echo __("Close");?>"/>
    </div>

    <input type="hidden" name="id" id="<?php echo $modulePrefixName ?>_id" value="0">
</form>
<!-- form, end-->
<?php
echo "</div>";
echo "<script type=\"text/javascript\" src=\"".$contextInfo["wacComponentJs"].".js\"></script>\n";


?>