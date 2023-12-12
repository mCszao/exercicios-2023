<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;
use Chuva\Php\WebScrapping\Util\HTMLUtils;

/**
 * Does the scrapping of a webpage.
 */
class Scrapper {

  /**
   * Loads paper information from the HTML and returns the array with the data.
   */
  public function scrap(\DOMDocument $dom): array {
    $archorTagList = $dom->getElementsByTagName("a");

    $cardList = HTMLUtils::findElementsByAttributeAndValue('class','paper-card', $archorTagList);
    $paperBuilderList = [];
    foreach ($cardList as $key => $value) {
      //get title
      $title = HTMLUtils::findElementByAttributeAndValue('class', 'paper-title', $value->childNodes)->nodeValue;

      //get type
      $type = HTMLUtils::findElementByClass($doc,'tags mr-sm')->item($key)->textContent;
      //get ID
      $id = HTMLUtils::findElementByAttributeAndValue('class', 'volume-info', $value->getElementsByTagName('div'))->textContent;

      $paper = new Paper($id, $title, $type);
      //get all authors
      $authorsDiv = HTMLUtils::findElementByAttributeAndValue('class', 'authors', $value->childNodes);
      foreach($authorsDiv->childNodes as $authorSpan){
        $institute = '';
        if($authorSpan instanceof DOMElement){
          $institute = $authorSpan->getAttribute('title');
          $authorName = $authorSpan->textContent;
          $paper->addAuthor(new Person($authorName, $institute));
        }
      }

      array_push($paperBuilderList, $paper);

    }
    return $paperBuilderList;
  }

}
