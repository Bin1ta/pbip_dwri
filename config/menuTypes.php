<?php
if(config('default.subDivision'))
{
    return [
        'category',
        'officeDetail',
        'subDivision',
        'forestCategory'
    ];
}
else
{
    return [
        'category',
        'officeDetail',

    ];
}
