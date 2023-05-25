<?php

use Morilog\Jalali\Jalalian;

if (!function_exists("debug_mode")) {
    function debug_mode()
    {
        return config('app.debug');
    }
}
if (!function_exists("convert2english")) {
    function convert2english($string)
    {
        if (!$string){
            return;
        }
        $newNumbers = range(0, 9);
        // 1. Persian HTML decimal
        $persianDecimal = [
            '&#1776;',
            '&#1777;',
            '&#1778;',
            '&#1779;',
            '&#1780;',
            '&#1781;',
            '&#1782;',
            '&#1783;',
            '&#1784;',
            '&#1785;',
        ];
        // 2. Arabic HTML decimal
        $arabicDecimal = [
            '&#1632;',
            '&#1633;',
            '&#1634;',
            '&#1635;',
            '&#1636;',
            '&#1637;',
            '&#1638;',
            '&#1639;',
            '&#1640;',
            '&#1641;',
        ];
        // 3. Arabic Numeric
        $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        // 4. Persian Numeric
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $separator = array('-','_','.',',',':',';');
        $string      = str_replace($persianDecimal, $newNumbers, $string);
        $string      = str_replace($arabicDecimal, $newNumbers, $string);
        $string      = str_replace($arabic, $newNumbers, $string);
        $string = str_replace($separator,"/",$string);
        $persianDate = str_replace($persian, $newNumbers, $string);
        return Jalalian::fromFormat('Y/m/d', $persianDate)->toCarbon();

    }
}

