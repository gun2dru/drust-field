<?php

namespace Drupal\drufi\Plugin\Field\FieldWidget;

use Drupal;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'DrufitWidget' widget.
 *
 * @FieldWidget(
 *   id = "DrufiWidget",
 *   label = @Translation("Drufi select"),
 *   field_types = {
 *     "Drufi"
 *   }
 * )
 */
class DrufiWidget extends WidgetBase {

  public function formElement(
    FieldItemListInterface $items,
    $delta, 
    Array $element, 
    Array &$form, 
    FormStateInterface $formState
  ) {

    // Text

    $element['name'] = [
      '#type' => 'textfield',
      '#title' => t('Text'),

      '#default_value' => isset($items[$delta]->name) ? 
          $items[$delta]->name : null,

      '#empty_value' => '',
      '#placeholder' => t('Введите ваше имя сюда...'),
      '#size' => 5,
    ];

    // Description

    $element['history'] = [
      '#type' => 'textarea',
      '#title' => t('Description'),
      '#default_value' => isset($items[$delta]->history) ? 
          $items[$delta]->history : null,
      '#empty_value' => '',
      '#placeholder' => t('Ваша история...'),
      '#size' => 5,
    ];
    
    // link to entity
    $selection_handler_settings = $this->configuration['handler_settings'];
    $element['node_id'] = [
    '#type' => 'entity_autocomplete',
    '#target_type' => 'node',
    '#title' => t('Node id'),
    '#selection_settings' => ['target_bundles' => ['page']],
    ];
    
  return $element;
  
  }

} // class