<?php

namespace Chuva\Php\WebScrapping\Util;

class HTMLUtils {
    
    public static function findElementsByAttributeAndValue($attribute, $value, $tagList){
        $elementsFound = [];
        if($attribute == 'class') {
            foreach ($tagList as $tag) {
                $arrayClass = explode(' ', $tag->getAttribute($attribute));
                foreach ($arrayClass as $class => $classValue) {
                    if($classValue == $value){
                        array_push($elementsFound, $tag);
                    }
                }
            }
        } else {
            foreach ($tagList as $tag) {
                $tagAttributeValue = $tag->getAttribute($attribute);
                if($tagAttributeValue == $value){
                    array_push($elementsFound, $tag);
                }
            }
        }
        return $elementFound;
    }

    public static function findElementByAttributeAndValue($attribute, $value, $tagList){
        $elementFound = '';
        if($attribute == 'class') {
            foreach ($tagList as $tag) {
                $arrayClass = explode(' ', $tag->getAttribute($attribute));
                foreach ($arrayClass as $class => $classValue) {
                    if($classValue == $value){
                        $elementFound = $tag;
                        break;
                    }
                }
            }
        } else {
            foreach ($tagList as $tag) {
                $tagAttributeValue = $tag->getAttribute($attribute);
                if($tagAttributeValue == $value){
                    $elementFound = $tag;
                    break;
                }
            }
        }
        return $elementFound;
    }

    public static function findElementByClass($dom, $className){
        $xPath = new DOMXpath($dom);
        $elementFound = $xPath->query("//*[@class='$className']");
        return $elementFound;
    }
}