<?php
/**
 * Description of WacComponentList
 *    control table type
 *
 * @author ben
 */
class WacComponentList
{
    //// embed all widget
    public static $all                        = "all";

    //// embed widget, flexibly to change the embed components
    public static $embedWidget                = "embedWidget";

    //// toolbar for the module
    public static $moduleToolBar              = "moduleToolBar";

    //// handle name/code/memo simple table
    public static $masterControlTableA        = "masterControlTableA";

    //// handle name/code/memo simple table
    public static $baseSingleControlTableA    = "baseSingleControlTableA";

    //// handle name/code/memo base inline "crud" table
    public static $baseInlineTableA           = "baseInlineTableA";

    //// module listing
    public static $moduleListingA             = "moduleListingA";

    //// module list
    public static $moduleList                 = "moduleList";

    //// module form
    public static $moduleForm                 = "moduleForm";

    //// buttons bar for the module
    public static $moduleButtonBar            = "moduleButtonBar";

    //// module inline list
    public static $moduleIndexInlineWidget    = "moduleIndexInlineWidget";

    //// module list
    public static $moduleIndexListWidget      = "moduleIndexListWidget";

    /*
     * to judge if embedWidge should be include or not
     * @$embedWidget - current widget
     * @ownsWidgets - mix, array widget names  or string "all"
     */
    public static function ownsWidget($embedWidget, $ownsWidgets){
        if(is_array($ownsWidgets)){
            return in_array($embedWidget, $ownsWidgets);
        }
        else{
            return ($ownsWidgets == self::$all);
        }
    }

}
