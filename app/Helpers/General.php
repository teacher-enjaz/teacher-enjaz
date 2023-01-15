<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

define('PAGINATION',9);
/**
 * @return mixed
 */
function getDefaultLanguage()
{
    //get the Default Language
    return Config::get('app.locale');
}

/**
 * get all object with childs in create blade
 * @param $objects
 * @param $counter
 * @param $char
 */
function subRecursion($objects, $counter, $char){

    foreach($objects as $object)
    {
            $space = "";
            $style= "";
            $temp=$counter;
            while($temp>0){
                $space.="&nbsp&nbsp&nbsp";
                $style.= $char;
                $temp--;
            }
            if(isset($object->id) && $object->status == true)
            {
                if($object->child->count()>0)
                {
                    if(app()->getLocale() == 'ar')
                    {
                        echo '<option value="' . $object->id . '" style="font-weight:bold; "> ' . $space . $style .
                            $object->name_ar . '</option>';
                        subRecursion($object->child, $counter + 1, $char);
                    }
                    else
                    {
                        echo '<option value="' . $object->id . '" style="font-weight:bold; "> ' . $space . $style .
                            $object->name_en . '</option>';
                        subRecursion($object->child, $counter + 1, $char);
                    }
                }
                else
                {
                    if(app()->getLocale() == 'ar')
                    {
                        echo '<option value="' . $object->id . '"> ' . $space . $style .
                            $object->name_ar . '</option>';
                    }
                    else
                    {
                        echo '<option value="' . $object->id . '"> ' . $space . $style .
                            $object->name_en . '</option>';
                    }
                }
            }
           /* if (isset($object->child)) {
                subRecursion($object->child, $counter + 1, $char);
            }*/
    }
}

/**
 * get all object with child in edit blade
 * @param $objects
 * @param $counter
 * @param $char
 * @param $object
 */
function subRecursionForEdit($objects, $counter, $char,$object)
{
    foreach ($objects as $obj)
    {
        $space = "";
        $style = "";
        $temp = $counter;
        $selected='selected';
        while ($temp > 0) {
            $space .= "&nbsp&nbsp&nbsp";
            $style .= $char;
            $temp--;
        }

        if(isset($obj->id) && $obj->status ==true)
        {
            if(isset($obj->child))
            {
                if(app()->getLocale() == 'ar')
                {
                    echo '<option value="'.$obj->id.'"'.($obj->id==$object->id? $selected:"").' style="font-weight:bold;"
                    id="grade'.$obj->id.'" data-parent="'.$obj->parent_id.'"> ' . $space . $style .
                        $obj->name_ar . '</option>';
                    subRecursionForEdit($obj->child, $counter + 1, $char,$object);
                }
                else
                {
                    echo '<option value="'.$obj->id.'"'.($obj->id==$object->id? $selected:"").' style="font-weight:bold;"
                    id="grade'.$obj->id.'" data-parent="'.$obj->parent_id.'"> ' . $space . $style .
                        $obj->name_en . '</option>';
                    subRecursionForEdit($obj->child, $counter + 1, $char,$object);
                }
            }
            else
            {
                if(app()->getLocale() == 'ar')
                {
                    echo '<option value="'.$obj->id.'"'.($obj->id==$object->id? $selected:"").'
                    id="grade'.$obj->id.'" data-parent="'.$obj->parent_id.'"> ' . $space . $style .
                        $obj->name_ar . '</option>';
                }
                else
                {
                    echo '<option value="'.$obj->id.'"'.($obj->id==$object->id? $selected:"").'
                    id="grade'.$obj->id.'" data-parent="'.$obj->parent_id.'"> ' . $space . $style .
                        $obj->name_en . '</option>';
                }
            }
        }
    }
}

/**
 * get all object with childs and make parent disabled in create blade
 * @param $objects
 * @param $counter
 * @param $char
 */
function subRecursionForObject($objects, $counter, $char){
    foreach($objects as $object){
        $space = "";
        $style= "";
        $temp=$counter;
        while($temp>0){
            $space.="&nbsp&nbsp&nbsp";
            $style.= $char;
            $temp--;
        }
        if(isset($object->id) && $object->status == true)
        {
            if($object->child->count()>0)
            {
                if(app()->getLocale() == 'ar')
                {
                    echo '<option id="grade'.$object->id.'" value="' . $object->id . '" style="font-weight:bold;" data-parent="'.$object->parent_id.'" disabled> ' . $space . $style .
                        $object->name_ar . '</option>';
                    subRecursionForObject($object->child, $counter + 1, $char);
                }
                else
                {
                    echo '<option id="grade'.$object->id.'" value="' . $object->id . '" style="font-weight:bold;" data-parent="'.$object->parent_id.'" disabled> ' . $space . $style .
                        $object->name_en . '</option>';
                    subRecursionForObject($object->child, $counter + 1, $char);
                }
            }
            else
            {
                if(app()->getLocale() == 'ar')
                {
                    echo '<option value="' . $object->id . '" data-parent="'.$object->parent_id.'" id="grade'.$object->id.'"> ' . $space . $style .
                        $object->name_ar . '</option>';
                }
                else
                {
                    echo '<option value="' . $object->id . '" data-parent="'.$object->parent_id.'" id="grade'.$object->id.'"> ' . $space . $style .
                        $object->name_en . '</option>';
                }
            }
        }
    }
}

/**
 * for fileMaterial
 * @param $objects
 * @param $counter
 * @param $char
 * @param $object
 */
function subRecursionForObject1($objects, $counter, $char,$class1,$classs){
    foreach($objects as $obj){
        $space = "";
        $style= "";
        $temp=$counter;
        while($temp>0){
            $space.="&nbsp&nbsp&nbsp";
            $style.= $char;
            $temp--;
        }
        if(isset($obj->id) && $obj->status == true)
        {
            if($obj->childs->count()>0)
            {
                echo '<option value=" '. $obj->id . '"'
                    .(($classs->id == $obj->id)? "selected":"").
                    'class="text-dark font-weight-bold" disabled>'
                    . $space . $style .
                    $obj->name . '</option>';
                subRecursionForObject1($obj->childs, $counter + 1, $char, $class1,$classs);
            }
            else
            {
                echo '<option value="'.$obj->id.'"'
                    .(($classs->id == $obj->id)? "selected":"").'> ' . $space . $style .
                    $obj->name . '</option>';
            }
        }
    }
}
/**
 * get all object with childs and make parent disabled in edit blade
 * @param $objects
 * @param $counter
 * @param $char
 * @param $selectedObject
 */
//for select 2
function subRecursionForGradeEdit($objects, $counter, $char, $selectedObject){

    foreach($objects as $object)
    {
        $space = "";
        $style = "";
        $temp = $counter;
        $selected = 'selected';
        while ($temp > 0) {
            $space .= "&nbsp&nbsp&nbsp";
            $style .= $char;
            $temp--;
        }
        if (isset($object->id) && $object->status == true)
        {
            if ($object->child->count() > 0)
            {
                if(app()->getLocale() == 'ar')
                {
                    echo '<option value=" '. $object->id . '"'
                        .(in_array($object->id, $selectedObject)? $selected:"").
                        'disabled>'
                        . $space . $style .
                        $object->name_ar . '</option>';
                    subRecursionForGradeEdit($object->child, $counter + 1, $char, $selectedObject);
                }
                else
                {
                    echo '<option value=" '. $object->id . '"'
                        .(in_array($object->id, $selectedObject)? $selected:"").
                        'disabled>'
                        . $space . $style .
                        $object->name_en . '</option>';
                    subRecursionForGradeEdit($object->child, $counter + 1, $char, $selectedObject);
                }
            }
            else
            {
                if(app()->getLocale() == 'ar')
                {
                    echo '<option value="' . $object->id . '"'
                        . (in_array($object->id, $selectedObject) ? $selected : "") . '>' . $space . $style .
                        $object->name_ar . '</option>';
                }
                else
                {
                    echo '<option value="' . $object->id . '"'
                        . (in_array($object->id, $selectedObject) ? $selected : "") . '>' . $space . $style .
                        $object->name_en . '</option>';
                }
            }
        }
    }
}

function subRecursionForSubjectEdit($objects, $counter, $char, $selectedObject){

    foreach($objects as $object)
    {
        $space = "";
        $style = "";
        $temp = $counter;
        $selected = 'selected';
        while ($temp > 0) {
            $space .= "&nbsp&nbsp&nbsp";
            $style .= $char;
            $temp--;
        }
        if (isset($object->id) && $object->status == true)
        {
            if ($object->child->count() > 0)
            {
                if(app()->getLocale() == 'ar')
                {
                    echo '<option value=" '. $object->id . '"'
                        .(in_array($object->id, $selectedObject)? $selected:"").
                        '>'
                        . $space . $style .
                        $object->name_ar . '</option>';
                    subRecursionForSubjectEdit($object->child, $counter + 1, $char, $selectedObject);
                }
                else
                {
                    echo '<option value=" '. $object->id . '"'
                        .(in_array($object->id, $selectedObject)? $selected:"").
                        '>'
                        . $space . $style .
                        $object->name_en . '</option>';
                    subRecursionForSubjectEdit($object->child, $counter + 1, $char, $selectedObject);
                }
            }
            else
            {
                if(app()->getLocale() == 'ar')
                {
                    echo '<option value="' . $object->id . '"'
                        . (in_array($object->id, $selectedObject) ? $selected : "") . '>' . $space . $style .
                        $object->name_ar . '</option>';
                }
                else
                {
                    echo '<option value="' . $object->id . '"'
                        . (in_array($object->id, $selectedObject) ? $selected : "") . '>' . $space . $style .
                        $object->name_en . '</option>';
                }
            }
        }
    }
}
/**
 * get all objects with children without disabling parent
 * @param $objects
 * @param $counter
 * @param $char
 * @param $selectedObject
 */

function subRecursionForEditObject($objects, $counter, $char,$selectedObject){
    foreach($objects as $object) {
        $space = "";
        $style = "";
        $temp = $counter;
        $selected = 'selected';
        while ($temp > 0) {
            $space .= "&nbsp&nbsp&nbsp";
            $style .= $char;
            $temp--;
        }
        if (isset($object->id) && $object->status == true)
        {
            if ($object->childs)
            {
                echo '<option value=" '. $object->id . '"'
                    .(in_array($object->id, $selectedObject)? $selected:"").
                    '>'
                    . $space . $style .
                    $object->name . '</option>';
                subRecursionForEditObject($object->childs, $counter + 1, $char, $selectedObject);
            }
            else
            {
                echo '<option value="'.$object->id.'"'
                    .(in_array($object->id, $selectedObject)? $selected:"").'>' . $space . $style .
                    $object->name . '</option>';
            }
        }
    }
}

function subRecursionForSemesterEdit($objects, $counter, $char,$selectedObject){
    foreach($objects as $object) {
        $space = "";
        $style = "";
        $temp = $counter;
        $selected = 'selected';
        while ($temp > 0) {
            $space .= "&nbsp&nbsp&nbsp";
            $style .= $char;
            $temp--;
        }
        if (isset($object->id))
        {
            if(app()->getLocale() == 'ar')
            {
                echo '<option value="'.$object->id.'"'
                    .(in_array($object->id, $selectedObject)? $selected:"").'>' . $space . $style .
                    $object->name_ar . '</option>';
            }
            else
            {
                echo '<option value="'.$object->id.'"'
                    .(in_array($object->id, $selectedObject)? $selected:"").'>' . $space . $style .
                    $object->name_en . '</option>';
            }


        }
    }
}

function getYoutubeID($url)
{
    if(strlen($url) > 11)
    {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
        {
            return $match[1];
        }
        else
            return false;
    }

    return $url;
}
function getBaseURL()
{
    $previousURL = url()->previous();
    //return parse_url($previousURL);
    $path = (string)parse_url($previousURL)['path'];
    $host = (string)parse_url($previousURL)['host'];
    $len =strlen($path)  ;

    $baseURL = trim($path,$path[$len-1]);
    return $baseURL;
}

function getBaseDriveUrl($url)
{
    $path = (string) $url;
    $len =strlen($path);
    $path = Str::substr($path,0,$len-16);
    $path = $path .'/preview';
    return $path;
}


