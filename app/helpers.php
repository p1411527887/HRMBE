<?php
use Carbon\Carbon;
if (! function_exists('GetID')) {
    function GetID($value) //JIRAUSER10000
    {
        return (int)substr($value, 6);
    }
}


if (! function_exists('ConvertTimestampToDate')) {
    function ConvertTimestampToDate($timestamp) //JIRAUSER10000
    {
        $timestamp = new DateTime();
        return  Carbon::parse($timestamp)->format('Y-m-d h:m:i');
    }
}
