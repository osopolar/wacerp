<table width="100%" cellspacing="0" cellpadding="0" class="wacTable" >
    <tbody>
        <?php
            $titleCol = "<td class=\"wacTableTitle\">%s</td>\n";
            if(isset($resultSet["colNames"]) && count($resultSet["colNames"])>0)
            {
                echo "<tr>\n";
                foreach($resultSet["colNames"] as $colName){
                        printf($titleCol, $colName);
                }
                echo "</tr>\n";
            }

            $fieldCol = "<td class=\"wacTableField\">%s</td>\n";
            if(isset($resultSet["items"]) && count($resultSet["items"])>0)
            {
                foreach($resultSet["items"] as $item){
                    echo "<tr>\n";
                    foreach($item as $field){
                        printf($fieldCol, $field);
                    }
                    echo "</tr>\n";
                }
            }
       ?>
    </tbody>
</table>