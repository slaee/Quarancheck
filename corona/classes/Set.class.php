<?php

class Set{
    public static function reAdd($id, $token, $name, $number, $group_id){
        if ($token == "" || $name == "" || $number == "" || $group_id == ""){
			Messages::error("Error to add in sched calendar");
			return;
        }

        Db::insert("resources", array("id", "name", "number","token", "group_id"), array($id, $name, $number, $token, $group_id));
    }
}

?>