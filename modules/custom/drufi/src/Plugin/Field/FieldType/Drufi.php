<?php

namespace Drupal\drufi\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Field\FieldStorageDefinitionInterface as StorageDefinition;

/**
 * Plugin implementation of the 'drufi' field type.
 *
 * @FieldType(
 *   id = "Drufi",
 *   label = @Translation("Drufi"),
 *   description = @Translation("Stores an drufi."),
 *   category = @Translation("Custom"),
 *   default_widget = "DrufiWidget",
 *   default_formatter = "DrufiFormatter"
 * )
 */
class Drufi extends FieldItemBase {

  /**
   * Field type properties definition.
   * 
   * Inside this method we defines all the fields (properties) that our 
   * custom field type will have.
   * 
   * Here there is a list of allowed property types: https://goo.gl/sIBBgO
   */
  public static function propertyDefinitions(StorageDefinition $storage) {

    $properties = [];

    $properties['name'] = DataDefinition::create('string')
      ->setLabel(t('Name'));

    $properties['history'] = DataDefinition::create('string')
      ->setLabel(t('History'));
      
    $properties['node_id'] = DataDefinition::create('string')
      ->setLabel(t('Node id'));        
      
    return $properties;
  }

  /**
   * Field type schema definition.
   * 
   * Inside this method we defines the database schema used to store data for 
   * our field type.
   * 
   * Here there is a list of allowed column types: https://goo.gl/YY3G7s
   */
  public static function schema(StorageDefinition $storage) {

    $columns = [];
    $columns['name'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['history'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['node_id'] = [
      'type' =>'int',
      'length' => 10,
    ];    
   
    return [
      'columns' => $columns,
      'indexes' => [],
    ];
  }

  /**
   * Define when the field type is empty. 
   * 
   * This method is important and used internally by Drupal. Take a moment
   * to define when the field fype must be considered empty.
   */
  public function isEmpty() {

    $isEmpty = 
      empty($this->get('name')->getValue()) &&
      empty($this->get('history')->getValue());

    return $isEmpty;
  }

} // class