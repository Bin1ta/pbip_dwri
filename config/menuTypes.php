<?php
if(config('default.subDivision'))
{
    return [
        'category',
        'officeDetail',
        'subDivision',
        'committeeCategory',
    ];
}
else
{
    return [
        'category',
        'officeDetail',

    ];
}
