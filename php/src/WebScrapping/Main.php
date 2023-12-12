<?php

namespace Chuva\Php\WebScrapping;

use OpenSpout\Common\Entity\Row;

/**
 * Runner for the Webscrapping exercice.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void {
    $dom = new \DOMDocument('1.0', 'utf-8');
    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

    $data = (new Scrapper())->scrap($dom);

    // Write your logic to save the output file bellow.
    $filename = 'PaperList.xlsx';
    $writer = new \OpenSpout\Writer\XLSX\Writer();
    $writer->openToBrowser($fileName);
    $header = ['ID', 'Title', 'Type', 'Author 1', 'Author 1 Instituition','Author 2', 'Author 2 Instituition','Author 3', 'Author 3 Instituition','Author 4', 'Author 4 Instituition', 'Author 5', 'Author 5 Instituition','Author 6', 'Author 6 Instituition','Author 7', 'Author 
    7 Instituition','Author 8', 'Author 8 Instituition', 'Author 9', 'Author 9 Instituition'];
    $rowFromHeader = Row::fromValues($header);
    $writer->addRow($rowFromHeader);

    foreach ($data as $paper) {
      $arrayValues = $papel->getArrayValues();
      $rowFromValue = Row::fromValues($arrayValues);
      $writer->addRow($rowFromValue);
    }

    $writer->close();
  }

}
