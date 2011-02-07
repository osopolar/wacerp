<table width="100%" cellspacing="0" cellpadding="0" class="wacTable" >
    <tbody>
        <?php
        $fieldTitleCol = "<td class=\"wacTableTitle\">%s</td>\n";
        $fieldCol = "<td class=\"wacTableField\">%s</td>\n";

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
