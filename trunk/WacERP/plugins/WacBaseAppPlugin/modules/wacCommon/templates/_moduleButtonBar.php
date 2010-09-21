<script type="text/javascript">
    $(function(){
       wacInitUIBtn();
    });
</script>

<div class="wacFormRow">
    <div class="wacFormItemLeft">
<?php
      $inputStr="";
      $inputStr.="<input name=\"code\" id=\"{$invokeParams['moduleName']}{$invokeParams['attachName']}_search_code\" class=\"ui-corner-all wacInputboxSearch1\" type=\"text\" size=\"15\" value=\"查找单号\" ";
      $inputStr.="onkeydown=\"javascript: if(this.value=='查找单号'){this.value='';} else{wacTriggerSearch(event, '".WacModuleHelper::getListId($invokeParams['moduleName'], $invokeParams['attachName'])."', 'code');}\"/>\n";
      echo $inputStr;

      if($invokeParams['attachName']!=ucfirst(StaticWacFormStatus::$audited))
      {
          echo WacModuleHelper::generateAddFormBtn($invokeParams['moduleName'],$invokeParams['attachName']);
      }
//           echo "<input id=\"".WacModuleHelper::getFormDialogId($invokeParams['moduleName'])."btnAdd\" onclick=\"javascript:$('#".WacModuleHelper::getFormDialogId($invokeParams['moduleName'])."').dialog('open');\" class=\"fm-button ui-state-default ui-corner-all fm-button-icon-left\" name=\"btnAdd\" value=\"添加\" type=\"button\" class=\"ui-corner-all\" />";
//           echo "<input onclick=\"javascript:initProductionOrderFormDialog();\" class=\"fm-button ui-state-default ui-corner-all fm-button-icon-left\" name=\"btnAdd\" id=\"btnAdd\" value=\"添加\" type=\"button\" class=\"ui-corner-all\" />";

      echo "<script type=\"text/javascript\">";
      echo "$(\"#{$invokeParams['moduleName']}{$invokeParams['attachName']}_search_code\").focus()";
      echo "</script>";
?>

    </div>
    <div class="wacFormClear"></div>
</div>
<hr class="wacFormRuler" style="width:98%;"/>