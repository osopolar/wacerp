<?php
$moduleName   = $invokeParams['moduleName'];
$formDialogId = WacModuleHelper::getFormDialogId($invokeParams['moduleName']);
$formId       = WacModuleHelper::getFormId($invokeParams['moduleName']);
echo "<div id=\"".$formDialogId."\" class=\"ui-widget\" style=\"display: none\" >\n\n";

echo "<script type=\"text/javascript\" src=\"/js/backend/{$invokeParams['moduleName']}/".WacComponentList::$moduleForm.".js\">";
echo "</script>";
?>
<!-- form, begin-->
<form name="<?php echo $formId;?>" id="<?php echo $formId;?>" method="post" class="wacFormA">
    <div class="wacFormFirstCol">
        <h3>
        <?php
        echo $invokeParams['caption'];
        ?>
        </h3>
        <div class="wacFormContentA">
            <div class="wacFormRow">
                <div class="wacFormItemLeft ">编码</div>
                <div class="wacFormItemRight">
                    <input name="name" id="<?php echo $moduleName ?>_name" type="text" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                </div>
                <div class="wacFormClear"></div>
            </div>
            <div class="wacFormRow">
                <div class="wacFormItemLeft">名称</div>
                <div class="wacFormItemRight">
                    <textarea name="description" id="<?php echo $moduleName; ?>_description" class="validate[required] ui-widget-content ui-corner-all" cols="35" rows="4"></textarea>
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
                    <label for="<?php echo $moduleName ?>_sf_guard_group_permissions_list">
                        权限列表
                    </label>
                    <br/>(按Ctrl+鼠标进行多选)
                </div>
                <div class="wacFormItemRight">
                   <select name="permission_list[]" multiple="multiple" id="<?php echo $moduleName ?>_sf_guard_group_permissions_list" style="width: 195px; height: 300px" class="ui-widget-content ui-corner-all">
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
   <input name="btnSubmit" id="<?php echo $moduleName ?>_btnSubmit" class="ui-button ui-state-default ui-corner-all wacCursor" type="button" value="提交"/>
      &nbsp;&nbsp;
      <input name="btnClose" id="<?php echo $moduleName ?>_btnClose" class="ui-button ui-state-default ui-corner-all wacCursor" type="button" value="关闭"/>
    </div>

    <input type="hidden" name="id" id="<?php echo $moduleName ?>_id" value="0">
</form>
<!-- form, end-->
<?php echo "</div>"; ?>