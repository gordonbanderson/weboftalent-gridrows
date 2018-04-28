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

class GridRowItemTO extends DataObject implements TestOnly
{
    private static $table_name = 'GridRowItemTO';
    private static $db = ['Name' => 'Varchar'];
    private static $has_one =['GridRowItemPage' => 'GridRowItemPageTO'];
}
