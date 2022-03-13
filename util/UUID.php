<?php

class UUID {
    /**
     * Generates version 1: MAC address
     */
    public static function v1() {
        return sprintf('%08x-%04x-%04x-%04x-%04x%08x',
               mt_rand(0, 0xffffffff),
               mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
               mt_rand(0, 0xffff), mt_rand(0, 0xffffffff)
        );
    }

    public static function v4() {
        return sprintf('%08x-%04x-%04x-%04x-%04x%08x',
           mt_rand(0, 0xffffffff),
           mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
           mt_rand(0, 0xffff), mt_rand(0, 0xffffffff)
         );
     }
         

}

?>