<?php

namespace DevFighters\Symfony;

class Symfony {

   const KERNEL = 'app';

    public static function getKernel(){
        return $GLOBALS[self::KERNEL];
    }

}