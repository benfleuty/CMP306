<?php
//  convert a record from database to XML
function convert_to_xml($query)
{
    $txt = '<article>';
    $txt = $txt . '<id>' . $query['id'] . '</id>';
    $txt = $txt . '<title>' . $query['title'] . '</title>';
    $txt = $txt . '<description>' . $query['description'] . '</description>';
    $txt = $txt . '<image>' . $query['image'] . '</image>';
    $txt = $txt . '<link>' . $query['link'] . '</link>';
    $txt = $txt . '</article>';
    return $txt;
}