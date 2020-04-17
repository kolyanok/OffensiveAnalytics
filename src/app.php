<?php

/**
 * A small program for demonstrating the work the OffensiveAnalytics class
 * php version 7.1.23
 *
 * @category OffensiveAnalytics
 * @package  OffensiveAnalytics
 * @author   kolyanok <nikolayokunkov@gmail.com>
 * @license  WTFPL - http://www.wtfpl.net/txt/copying/
 * @link     https://kolynaok.ru/matan
 */

require_once "OffensiveAnalytics.php";

$oa = new OffensiveAnalytics();
echo "Enter lines of text: ";
while (false !== ($line = fgets(STDIN))) {
    $off = $oa->getOffensive($line);
    echo "Пизда и производные (".count($off[0]).")";
    if (count($off[0])) {
        echo ": \n";
        foreach ($off[0] as $mat) {
            echo $mat."\n";
        }
    } else {
        echo "\n";
    }
    echo "Хуй и производные (".count($off[1]).")";
    if (count($off[1])) {
        echo ": \n";
        foreach ($off[1] as $mat) {
            echo $mat."\n";
        }
    } else {
        echo "\n";
    }
    echo "Ебать и производные (".count($off[2]).")";
    if (count($off[2])) {
        echo ": \n";
        foreach ($off[2] as $mat) {
            echo $mat."\n";
        }
    } else {
        echo "\n";
    }
    echo "Блядь и производные (".count($off[3]).")";
    if (count($off[3])) {
        echo ": \n";
        foreach ($off[3] as $mat) {
            echo $mat."\n";
        }
    } else {
        echo "\n";
    }
}
