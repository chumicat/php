<?php

/**
 * Handle any type and fomat to show on console
 * 
 * Usage:
 *     $obj = new DateTimeHelper;
 *     echo $obj->printRFC2822Date('2020-10-10 09:10:00');
 */
class DateTimeHelper
{
    /**
     * Convert each type to DateTime type
     * 
     * Handle anything to DateTime type
     * It can be string, int, array or anything you want!
     * (Only string supported CURRENTLY)
     * 
     * @parma mixed $anything Any type that we want to convert to DateTime type
     * @return DateTime Convert result
     */
    public function dateTimeFromAnything($anything)
    {
        $type = gettype($anything);
        switch ($type) {
            case 'string':
                return new DateTime($anything);
        }
        throw new \InvalidArgumentException(
            "Failed Converting param of type '{$type}' to DateTime object"
        );
    }

    /**
     * Print dateTime on console with ISO8601 format
     * 
     * Format example: 2005-08-15T15:52:01+0000
     * 
     * @parma mixed $date Any type that we want to convert to the format
     * @return null
     */
    public function printISO8601Date($date)
    {
        echo $this->dateTimeFromAnything($date)->format('c');
    }

    /**
     * Print dateTime on console with RFC2822 format
     * 
     * Format example: Mon, 15 Aug 2005 15:52:01 +0000
     * 
     * @parma mixed $date Any type that we want to convert to the format
     * @return null
     */
    public function printRFC2822Date($date)
    {
        echo $this->dateTimeFromAnything($date)->format('r');
    }
}
$obj = new DateTimeHelper;
echo $obj->printRFC2822Date('2020-10-10 09:10:00');
