<?php
/*
 * notes:
 *   this tpl master main module and submodule grids
 *
 * if clone as another one, below tags need to be replace to ur target module tag
 *
 *
 */

$moduleName  = $invokeParams['contextInfo']['moduleName'];

//print_r($contextInfo);
?>
<table width="100%" cellspacing="0" cellpadding="0" >
    <tbody>
    <tr>
        <td align="left" id="<?php echo $moduleName;?>_content">
        </td>
    </tr>
    </tbody>
</table>