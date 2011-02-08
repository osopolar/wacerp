<table width="100%" cellspacing="0" cellpadding="0" class="wacTable" >
    <tbody>
        <?php
        $fieldTitleCol = "<td class=\"wacTableTitle\" style=\"width:200px;font-weight:bold;\">%s</td>\n";
        $fieldCol = "<td class=\"wacTableField\" style=\"padding:2px;\">%s</td>\n";

        if (isset($resultSet["items"]) && count($resultSet["items"]) > 0) {
            foreach ($resultSet["items"] as $item) {
                foreach ($resultSet["metaInfo"]["displayCols"] as $displayCol) {
                    echo "<tr>\n";
                    printf($fieldTitleCol, $displayCol["label"]);
                    printf($fieldCol, $item[$displayCol["name"]]);
                    echo "</tr>\n";
                }
            }
        }
        ?>
    </tbody>
</table>
