<?php

namespace App\Enumerators;

//final class ComparatorEnum {
//  private function __construct() {}
//  ...    
//}
final class ComparatorEnum {

    private function __construct() {}

    public static $operators = [
        'lt' => '<',
        'le' => "<=",
        'gt' => ">",
        'ge' => ">=",
        'e' => "=",
        'ne' => "<>",
        'has' => "REGEXP",
        'hasNot' => "NOT REGEXP"
    ];

}
