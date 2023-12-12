<?php

namespace Chuva\Php\WebScrapping\Entity;

/**
 * The Paper class represents the row of the parsed data.
 */
class Paper {

  /**
   * Paper Id.
   *
   * @var int
   */
  public $id;

  /**
   * Paper Title.
   *
   * @var string
   */
  public $title;

  /**
   * The paper type (e.g. Poster, Nobel Prize, etc).
   *
   * @var string
   */
  public $type;

  /**
   * Paper authors.
   *
   * @var \Chuva\Php\WebScrapping\Entity\Person[]
   */
  public $authors;

  /**
   * Builder.
   */
  public function __construct($id, $title, $type) {
    $this->id = $id;
    $this->title = $title;
    $this->type = $type;
  }

  public function addAuthor($author){
    array_push($this->authors, $author);
  }

  public function getArrayValues(){
    $arrayValues = [$this->id, $this->title, $this->type];
    foreach($this->authors as $author){
        array_push($row, $author->getName());
        array_push($row, $author->getInstitute());
    }
    return $arrayValues;
}

}
