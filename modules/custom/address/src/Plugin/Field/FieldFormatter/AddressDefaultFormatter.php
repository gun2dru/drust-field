<?php

namespace Drupal\address\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Plugin implementation of the 'AddressDefaultFormatter' formatter.
 *
 * @FieldFormatter(
 *   id = "AddressDefaultFormatter",
 *   label = @Translation("Address"),
 *   field_types = {
 *     "Address"
 *   }
 * )
 */
class AddressDefaultFormatter extends FormatterBase {

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
        '#type' => 'search',
        '#title'=> 'Search:',
        ],
        [
        '#type' => 'markup',
        '#markup' => $item->street . ', City: ' . $item->city . ', Link: ' . $item->links
        ],
      ];
    }

    return $elements;
  }
  
} // class