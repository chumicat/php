<?php

// Dev: Russell

function showCalTitle($month, $year)
{
    printf("     %2d月 %-4d       \n", $month, $year);
    printf("日 一 二 三 四 五 六 \n");
}
function showCalBody($month, $year, $today = null)
{
    //get first weekday number, which used to count and make new line
    $newLineCounter = date("w", mktime(0, 0, 0, $month, 1, $year));

    //deal first week space
    echo str_repeat("   ", $newLineCounter);

    //fill all date to the calender
    for ($day = 1; $day <= 31; ++$day, ++$newLineCounter) {
        if (checkdate($month, $day, $year)) {
            if ($day == $today) {
                printf("\033[7m%2d\033[0m ", $today);
            } else {
                printf("%2d ", $day);
            }
        } else {
            break;
        }
        if ($newLineCounter == 6) {
            $newLineCounter = -1;
            echo "\n";
        }
    }
    echo "\n\n";
}

// set timezone
date_default_timezone_set("Asia/Taipei");

// get parameter
switch (count($argv)) {
    case 1:
        $month = date("n");
        $today = date("d");
        $year = date("Y");
        break;
    case 3:
        $month = $argv[1];
        $today = null;
        $year = $argv[2];
        if (
            $month < 1
            or 12 < $month
            or $year < 1
            or 9999 < $year
        ) {
            echo "Wrong parameter!!\n";
            return;
        }
        break;
    default:
        return;
}

showCalTitle($month, $year);
showCalBody($month, $year, $today);
