<?php

class GridRowsExtension extends DataExtension {

  /*
  If you are laying out using some form of grid, e.g. HTML table (ugh) or bootstraps span classes it is useful
  to have the DataList split by row.  Here the DataList is generated from a method accessible to the current cotnroller

  See README.md for a worked example

  */
  public function SplitDataListIntoGridRows($itemsInGridMethod,$numberOfCols) {
    $itemsInGrid = $this->owner->$itemsInGridMethod();
    return $this->createGrid($itemsInGrid,$numberOfCols);
  }

  /*
  If you are laying out using some form of grid, e.g. HTML table (ugh) or bootstraps span classes it is useful
  to have the DataList split by row.  This is what this method does.

  See README.md for a worked example

  */
  public function SplitClassNameDataListIntoGridRows($className,$numberOfCols,$limit,$sort='LastEdited DESC') {
    $clazz = Injector::inst()->create($className);
    $itemsInGrid = $clazz->get()->limit($limit)->sort($sort);
    return $this->createGrid($itemsInGrid,$numberOfCols);
  }


  /*
  The actual method that splits the DataList into an ArrayList of rows that contain an ArrayList of Columns
  */
  private function createGrid($itemsInGrid,$numberOfCols) {
    $position = 1;
    $columns = new ArrayList();
    $result = new ArrayList();
    foreach ($itemsInGrid as $key => $item) {
      $columns->push($item);
      if (($position) >= $numberOfCols) {
        $position = 1;
        $row = new ArrayList();
        $row->Columns = $columns;
        $result->push($row);
        $columns = new ArrayList();
      } else {
        $position = $position + 1;
      }
    }

    if ($columns->Count() > 0) {
      $row = new ArrayList();
      $row->Columns = $columns;
      $result->push($row);
    }

    return $result;
  }



}
