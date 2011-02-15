<?php
$formDialogId = WacModuleHelper::getFormDialogId($invokeParams["contextInfo"]["moduleName"]);
$formId       = WacModuleHelper::getFormId($invokeParams["contextInfo"]["moduleName"]);
echo "<div id=\"".$formDialogId."\" title=\"".WacModule::getCaption($invokeParams["contextInfo"]["moduleName"])."\" class=\"ui-widget\" style=\"display: none\" >\n\n";
?>
<!-- form, begin-->
<form name="<?php echo $formId;?>" id="<?php echo $formId;?>" method="post" class="wacFormA">
    <div class="wacFormFirstCol">
        <div class="wacFormContentA">
            <div class="wacFormRow">
                <div class="wacFormItemLeft "><?php echo __("Coding");?></div>
                <div class="wacFormItemRight">
                    <input name="name" id="<?php echo $invokeParams["contextInfo"]["moduleName"] ?>_name" type="text" class="validate[required,custom[noSpecialCaracters]] wacFormText DataTD ui-widget-content ui-corner-all" />
                </div>
                <div class="wacFormClear"></div>
            </div>
            <div class="wacFormRow">
                <div class="wacFormItemLeft"><?php echo __("Name");?></div>
                <div class="wacFormItemRight">
                    <textarea name="description" id="<?php echo $invokeParams["contextInfo"]["moduleName"]; ?>_description" class="validate[required] ui-widget-content ui-corner-all" cols="35" rows="4"></textarea>
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
                    <label for="<?php echo $invokeParams["contextInfo"]["moduleName"] ?>_sf_guard_group_permissions_list">
                        <?php echo __("Permission List");?>
                    </label>
                    <br/>(<?php echo __("Press Ctrl to mutiple select items");?>)
                </div>
                <div class="wacFormItemRight">
                   <select name="permission_list[]" multiple="multiple" id="<?php echo $invokeParams["contextInfo"]["moduleName"] ?>_sf_guard_group_permissions_list" style="width: 195px; height: 300px" class="ui-widget-content ui-corner-all">
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
   <input name="btnSubmit" id="<?php echo $invokeParams["contextInfo"]["moduleName"] ?>_btnSubmit" class="ui-button ui-state-default ui-corner-all wacCursor" type="button" value="<?php echo __("Submit");?>"/>
      &nbsp;&nbsp;
      <input name="btnClose" id="<?php echo $invokeParams["contextInfo"]["moduleName"] ?>_btnClose" class="ui-button ui-state-default ui-corner-all wacCursor" type="button" value="<?php echo __("Close");?>"/>
    </div>

    <input type="hidden" name="id" id="<?php echo $invokeParams["contextInfo"]["moduleName"] ?>_id" value="0">
</form>
<!-- form, end-->
<?php
echo "</div>";
echo "<script type=\"text/javascript\" src=\"".$contextInfo["wacComponentJs"].".js\"></script>\n";


?>