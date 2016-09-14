<?php

namespace Drupal\drufi\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Plugin implementation of the 'DrufiFormatter' formatter.
 *
 * @FieldFormatter(
 *   id = "DrufiFormatter",
 *   label = @Translation("Drufi"),
 *   field_types = {
 *     "Drufi"
 *   }
 * )
 */
class DrufiFormatter extends FormatterBase {

  /**
   * Define how the field type is showed.
   * 
   * Inside this method we can customize how the field is displayed inside 
   * pages.
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {

    
    $elements = [];
    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        [
        '#type' => 'markup',
        '#markup' => $item->name . ', History: ' . $item->history . ', Link: ' . $item->node_id
        ],
      ];
    }

    return $elements;
  }
  
} // class