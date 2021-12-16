<?php
//  convert a record from database to XML
function convert_to_xml($query)
{
    $txt = '<employee>';
    $txt = $txt . '<id>' . $query['id'] . '</id>';
    $txt = $txt . '<employee_name>' . $query['employee_name'] . '</employee_name>';
    $txt = $txt . '<employee_age>' . $query['employee_age'] . '</employee_age>';
    $txt = $txt . '<employee_salary>' . $query['employee_salary'] . '</employee_salary>';
    $txt = $txt . '</employee>';
    return $txt;
}