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
    error_log("SSIGR T1");
    $splits = explode('|',$itemsAndNumberOfCols);
    $itemsMethods = $splits[0];
    $numberOfCols = (int)$splits[1];
    $itemsInGrid = $this->owner->$itemsMethods();
    $position = 1;
    $columns = new DataObjectSet();
    $result = new DataObjectSet();
    foreach ($itemsInGrid as $key => $item) {
      $columns->push($item);
      error_log("Comparing position $position > number of cols $numberOfCols");
      if (($position) >= $numberOfCols) {
        error_log("NEW ROW");
        $position = 1;
        $row = new DataObjectSet();
        $row->Columns = $columns;
        $result->push($row);
        $columns = new DataObjectSet();
      } else {
        $position = $position + 1;
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