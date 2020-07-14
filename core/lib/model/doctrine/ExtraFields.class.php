<?php
/**
*qdPM
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@qdPM.net so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade qdPM to newer
* versions in the future. If you wish to customize qdPM for your
* needs please refer to http://www.qdPM.net for more information.
*
* @copyright  Copyright (c) 2009  Sergey Kharchishin and Kym Romanets (http://www.qdpm.net)
* @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
?>
<?php

/**
 * ExtraFields
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ExtraFields extends BaseExtraFields
{
  public static function getTypesChoices()
  {
    $l = array();
    $l['text'] = t::__('Input Field');
    $l['number'] = t::__('Input Numeric Field');
    $l['url']  = t::__('Input URL Field');            
    $l['file'] = t::__('File');
    $l['textarea'] = t::__('Textarea');
    $l['textarea_wysiwyg'] = t::__('Textarea with WYSIWYG editor');
    $l['date_dropdown'] = t::__('Date');
    $l['date'] = t::__('Date with calendar picker');    
    $l['date_time'] = t::__('Date with calendar and time picker');
    $l['date_range'] = t::__('Date range with calendar picker');                
    
    return $l;
  }
  
  public static function getTypeNameByKey($k)
  {
    $t = ExtraFields::getTypesChoices();
    
    if(isset($t[$k]))
    {
      return $t[$k]; 
    }
    else
    {
      return '';
    }
  }

  public static function getFieldsByType($type)
  {
    $q = Doctrine_Core::getTable('ExtraFields')->createQuery();
    $q->addWhere('bind_type=?',$type);
    $q->orderBy('sort_order,name');

    $l = array();
    foreach($q->execute() as $v)
    {
      $l[$v->getId()]=$v->getName();
    }
    
    return $l;
  }
  

  
}
