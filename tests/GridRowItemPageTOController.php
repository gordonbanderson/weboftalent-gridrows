<?php
/**
 * Created by PhpStorm.
 * User: gordon
 * Date: 28/4/2561
 * Time: 11:58 น.
 */

namespace WebOfTalent\GridRows\Tests;


use SilverStripe\Dev\TestOnly;

class GridRowItemPageTOController extends \PageController implements TestOnly
{
    /*
  This is a test method on the *controller*
   */
    public function GridItems()
    {
        return $this->model->GridRowItems();
    }
}
