<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteData extends Model
{
    public static function getMetaData($name){
        $buf = mb_convert_encoding(file_get_contents(
            base_path('resources/csv') . DIRECTORY_SEPARATOR . 'title.csv'), 'utf-8', 'utf-8');
                    //base_path('resources/csv') . DIRECTORY_SEPARATOR . 'title.csv'), 'utf-8', 'sjis-win');

        $lines = explode("\n", $buf);
        //array_pop($lines);//末尾
        array_shift($lines);//先頭を除く

        foreach($lines as $line){

            $arrLine = explode("\t", $line);
            //if(strpos($line, $name) !== false){
            if($arrLine[0] == $name){
                return $arrLine;
            }
        }
    }
}
