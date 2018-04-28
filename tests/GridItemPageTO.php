<?php
/**
 * Created by PhpStorm.
 * User: gordon
 * Date: 28/4/2561
 * Time: 11:55 น.
 */

namespace WebOfTalent\GridRows\Tests;


use SilverStripe\Dev\TestOnly;
use SilverStripe\ORM\DataObject;

class GridRowItemPageTO extends \Page implements TestOnly
{
    private static $table_name = 'GridRowItemPageTO';
    private static $has_many = ['GridRowItems' => 'GridRowItemTO'];
}
