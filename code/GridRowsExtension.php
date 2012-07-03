<?php

class GridRowsExtension extends Extension {

  /*
  If you are laying out using some form of grid, e.g. HTML table (ugh) or bootstraps span classes it is useful
  to have the DataSet split by row.  This is what this method does.

  To execute this code from a template, do something like the following:

  <% control SplitSetIntoGridRows(Children|4) %>
  YOur template here
  <% end_control %>

  */
  public function SplitSetIntoGridRows($itemsAndNumberOfCols) {
    $splits = explode('|',$itemsAndNumberOfCols);
    $itemsMethods = $splits[0];
    $numberOfCols = (int)$splits[1];
    $itemsInGrid = $this->owner->$itemsMethods();
    $position = 1;
    $columns = new DataObjectSet();
    $result = new DataObjectSet();
    foreach ($itemsInGrid as $key => $item) {
      $columns->push($item);
      $position = $position + 1;
      if ($position > $numberOfCols) {
        $position = 1;
        $row = new DataObjectSet();
        $row->Columns = $columns;
        $result->push($row);
        $columns = new DataObjectSet();
      }
    }

    if ($columns->Count() > 0) {
      $row = new DataObjectSet();
      $row->Columns = $columns;
      $result->push($row);
    }

    // FIXME add padding?

    return $result;
    //$result = new DataObjectSet();

  }



}
?>
