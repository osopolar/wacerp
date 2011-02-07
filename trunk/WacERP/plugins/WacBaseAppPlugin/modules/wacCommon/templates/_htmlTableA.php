<table width="100%" cellspacing="0" cellpadding="0" class="wacTable" >
    <tbody>
        <?php
//        print_r($resultSet);
        $displayCols = array();

        $titleCol = "<td class=\"wacTableTitle\">%s</td>\n";
        if (isset($resultSet["metaInfo"]["displayCols"]) && count($resultSet["metaInfo"]["displayCols"]) > 0) {
            echo "<tr>\n";
            foreach ($resultSet["metaInfo"]["displayCols"] as $col) {
                $displayCols[] = $col["name"];
                printf($titleCol, $col["label"]);
            }
            echo "</tr>\n";
        }

        $fieldCol = "<td class=\"wacTableField\">%s</td>\n";
        if (isset($resultSet["items"]) && count($resultSet["items"]) > 0) {
            foreach ($resultSet["items"] as $item) {
                echo "<tr>\n";
                foreach ($displayCols as $displayCol) {
                    printf($fieldCol, $item[$displayCol]);
                }
                echo "</tr>\n";
            }
        }
        ?>
    </tbody>
</table>
<table width="100%" cellspacing="0" cellpadding="0" class="wacTable" >
    <tbody>
        <tr>
            <td align="right">
                <?php echo __("Total") . $resultSet["totalRecords"] . __("Item(s)"); ?>
            </td>
        </tr>
    </tbody>
</table>