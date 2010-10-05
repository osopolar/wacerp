<div class="wacFormRow">
    <div class="wacFormItemLeft">
<?php
      $inputStr="";
      $inputStr.="<input name=\"code\" id=\"{$invokeParams['contextInfo']['moduleName']}{$invokeParams['attachInfo']['name']}_search_code\" class=\"ui-corner-all wacInputboxSearch1\" type=\"text\" size=\"15\" value=\"查找单号\" ";
      $inputStr.="onkeydown=\"javascript: if(this.value=='查找单号'){this.value='';} else{wacTriggerSearch(event, '".WacModuleHelper::getListId($invokeParams['contextInfo']['moduleName'], $invokeParams['attachInfo']['name'])."', 'code');}\"/>\n";
      echo $inputStr;

      if($invokeParams['attachInfo']['name']!=ucfirst(WacEntityStatus::$audited))
      {
          echo WacModuleHelper::generateAddFormBtn($invokeParams['contextInfo']['moduleName'],$invokeParams['attachInfo']['name']);
      }

      echo "<script type=\"text/javascript\">";
      echo "$(\"#{$invokeParams['contextInfo']['moduleName']}{$invokeParams['attachInfo']['name']}_search_code\").focus()";
      echo "</script>";
?>

    </div>
    <div class="wacFormClear"></div>
</div>
<hr class="wacFormRuler" style="width:98%;"/>

<script type="text/javascript">
    $(function(){
        $(document).wacPage().initUIBtn();
    });
</script>