<?php

namespace WebOfTalent\GridRows\Tests;

use PageController;
use SilverStripe\Dev\FunctionalTest;
use SilverStripe\ORM\DataObject;
use SilverStripe\Dev\TestOnly;

class GridRowsExtensionTest extends FunctionalTest
{
    protected static $fixture_file = 'GridRowsExtensionTest.yml';

    protected $extraDataObjects = array(
        'GridRowItemTO'
    );

    public function setUp()
    {
        $this->requiredExtensions = array(
            'GridRowItemTO' => array('GridRowsExtension')
        );

        parent::setUp();
    }


    public function testSplitDataListMethodDoesNotExist()
    {
        $message = 'Method not found.  A grid cannot be formed from the method'
                 . ' GridRowItemsTHISMETHODDOESNOTEXIST';
        $this->setExpectedException('InvalidArgumentException', $message);

        $page = $this->objFromFixture('GridRowItemPageTO', 'page001');
        $page->doPublish();
        $controller = new GridRowItemPageTO_Controller();
        $controller->setDataModel($page);

        for ($columns=1; $columns < 15; $columns++) {
            $grid = $controller->SplitDataListIntoGridRows(
                'GridRowItemsTHISMETHODDOESNOTEXIST', // method from model
                $columns
            );
            $this->checkGrid($grid, $columns, 10);
        }
    }

    public function testSplitDataListFromModelIntoGridRows()
    {
        $page = $this->objFromFixture('GridRowItemPageTO', 'page001');
        $page->doPublish();
        $controller = new GridRowItemPageTO_Controller();
        $controller->setDataModel($page);

        for ($columns=1; $columns < 15; $columns++) {
            $grid = $controller->SplitDataListIntoGridRows(
                'GridRowItems', // method from model
                $columns
            );
            $this->checkGrid($grid, $columns, 10);
        }
    }

    public function testSplitDataListFromControllerIntoGridRows()
    {
        $page = $this->objFromFixture('GridRowItemPageTO', 'page001');
        $page->doPublish();
        $controller = new GridRowItemPageTO_Controller();
        $controller->setDataModel($page);
        for ($columns=1; $columns < 15; $columns++) {
            $grid = $controller->SplitDataListIntoGridRows(
                'GridItems', // method from controller
                $columns
            );
            $this->checkGrid($grid, $columns, 10);
        }
    }

    /*
    Check multiple number of columns with amounts from 1 to just over the
    total number of grid items, namely 12
     */
    public function testSplitClassNameDataListIntoGridRows()
    {
        $page = $this->objFromFixture('GridRowItemPageTO', 'page001');
        $page->doPublish();
        $controller = new PageController();
        $controller->setDataModel($page);
        for ($columns=1; $columns < 15; $columns++) {
            for ($i=1; $i < 15; $i++) {
                $grid = $controller->SplitClassNameDataListIntoGridRows(
                    'GridRowItemTO',
                    $columns,
                    $i,
                    $sort = 'LastEdited DESC'
                );
                $amount = $i > 12 ? 12: $i;
                $this->checkGrid($grid, $columns, $amount);
            }
        }
    }


    private function checkGrid($grid, $maxWidth, $amount)
    {
        $items = 0;
        $rows = 0;
        $widths = array();
        foreach ($grid->getIterator() as $row) {
            $rows++;
            $width = 0;
            foreach ($row->Columns->getIterator() as $column) {
                $items++;
                $width++;
            }
            array_push($widths, $width);
        }

        // last value will be <= max width
        $lastVal = array_pop($widths);
        $this->assertLessThanOrEqual($maxWidth, $lastVal);

        // All but the last row should equal the expected width, $maxWidth
        foreach ($widths as $width) {
            $this->assertEquals($maxWidth, $width);
        }
        $this->assertEquals($amount, $items);
    }
}


class GridRowItemTO extends DataObject implements TestOnly
{
    private static $db = array('Name' => 'Varchar');

    private static $has_one = array('GridRowItemPage' => 'GridRowItemPageTO');
}

class GridRowItemPageTO extends \Page implements TestOnly
{
    private static $tablename = 'GridRowItemPageTO';

    private static $has_many = array('GridRowItems' => 'GridRowItemTO');
}

class GridRowItemPageTO_Controller extends PageController implements TestOnly
{

    /*
    This is a test method on the *controller*
     */
    public function GridItems()
    {
        return $this->model->GridRowItems();
    }
}
