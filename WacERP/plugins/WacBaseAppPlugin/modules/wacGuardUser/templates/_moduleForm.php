<?php
$formDialogId = WacModuleHelper::getFormDialogId($invokeParams['contextInfo']['moduleName']);
$formId       = WacModuleHelper::getFormId($invokeParams['contextInfo']['moduleName']);
echo "<div id=\"".$formDialogId."\" class=\"ui-widget\" style=\"display: none\" >\n\n";

?>
<!-- form, begin-->
<form name="<?php echo $formId;?>" id="<?php echo $formId;?>" method="post" class="wacFormA" action="">
    <div class="wacFormFirstCol">
        <h3>
        <?php
        echo WacModule::getCaption($invokeParams["contextInfo"]["moduleName"]);;
        ?>
        </h3>
        <div class="wacFormContentA">
            <div class="wacFormRow">
                <div class="wacFormItemLeft ">用户名</div>
                <div class="wacFormItemRight">
                    <input name="username" id="<?php echo $invokeParams['contextInfo']['moduleName'] ?>_username" type="text" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                </div>
                <div class="wacFormClear"></div>
            </div>
            <div class="wacFormRow">
                <div class="wacFormItemLeft">密码</div>
                <div class="wacFormItemRight">
                    <input name="password" id="<?php echo $invokeParams['contextInfo']['moduleName'] ?>_password" maxlength="20" type="password" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                </div>
                <div class="wacFormClear"></div>
            </div>
            <div class="wacFormRow">
                <div class="wacFormItemLeft">密码确认</div>
                <div class="wacFormItemRight">
                    <input name="password_confirm" id="<?php echo $invokeParams['contextInfo']['moduleName'] ?>_password_confirm" maxlength="20" type="password" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                </div>
                <div class="wacFormClear"></div>
            </div>
            <div class="wacFormRow">
                <div class="wacFormItemLeft">
                    <label for="<?php echo $invokeParams['contextInfo']['moduleName']; ?>_is_active">激活</label>
                </div>
                <div class="wacFormItemRight">
                    <input name="is_active" id="<?php echo $invokeParams['contextInfo']['moduleName']; ?>_is_active" checked="true" value="1" type="checkbox" class="ui-widget-content ui-corner-all" />
                </div>
                <div class="wacFormClear"></div>
            </div>

        </div>
        
        
    </div>
    <div class="wacFormSecondCol">
        <h3>&nbsp;</h3>
        <div class="wacFormContentA">
            <div class="wacFormRow">
                <div class="wacFormItemLeft">
                    <label for="<?php echo $invokeParams['contextInfo']['moduleName'] ?>_sf_guard_user_group_list">
                        用户组
                    </label>
                    <br/>(按Ctrl+鼠标进行多选)
                </div>
                <div class="wacFormItemRight">
                   <select name="group_list[]" multiple="multiple" id="<?php echo $invokeParams['contextInfo']['moduleName'] ?>_sf_guard_user_group_list" style="width: 195px; height: 300px" class="ui-widget-content ui-corner-all">
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
   <input name="btnSubmit" id="<?php echo $invokeParams['contextInfo']['moduleName'] ?>_btnSubmit" class="ui-button ui-state-default ui-corner-all wacCursor" type="button" value="提交"/>
      &nbsp;&nbsp;
      <input name="btnClose" id="<?php echo $invokeParams['contextInfo']['moduleName'] ?>_btnClose" class="ui-button ui-state-default ui-corner-all wacCursor" type="button" value="关闭"/>
    </div>

    <input type="hidden" name="id" id="<?php echo $invokeParams['contextInfo']['moduleName'] ?>_id" value="0">
</form>
<!-- form, end-->

<?php
echo "<script type=\"text/javascript\" src=\"{$invokeParams['contextInfo']['jsModulePath']}".WacComponentList::$moduleForm.".js\">\n";
echo "</script>\n";
echo "</div>";
?>