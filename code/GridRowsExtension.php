<?php

class GridRowsExtension extends DataExtension {

  /*
  If you are laying out using some form of grid, e.g. HTML table (ugh) or bootstraps span classes it is useful
  to have the DataSet split by row.  This is what this method does.

  To execute this code from a template, do something like the following:

  <% control SplitSetIntoGridRows(Children|4) %>
  YOur template here
  <% end_control %>

  */
  public function SplitDataListIntoGridRows($itemsInGridMethod,$numberOfCols) {
    $itemsInGrid = $this->owner->$itemsInGridMethod();
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
