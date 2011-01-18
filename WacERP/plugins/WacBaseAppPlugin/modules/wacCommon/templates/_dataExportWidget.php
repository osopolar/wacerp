<div id="wacDataExportWidget" style="display: none;">
    <form name="wacDataExportForm" id="wacDataExportForm" method="post" class="wacFormA">
    <table>
        <?php echo $form ?>
        <tr>
            <td>
                <input type="submit" />
            </td>
        </tr>
    </table>
    </form>
</div>
<?php
//print_r($contextInfo);
//load main js after html elements are loaded finish
echo "<script type=\"text/javascript\" src=\"".$contextInfo["wacComponentJs"].".js\"></script>\n";
?>