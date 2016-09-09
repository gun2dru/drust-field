<?php

namespace Drupal\address\Plugin\Field\FieldWidget;

use Drupal;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'AddressDefaultWidget' widget.
 *
 * @FieldWidget(
 *   id = "AddressDefaultWidget",
 *   label = @Translation("Address select"),
 *   field_types = {
 *     "Address"
 *   }
 * )
 */
class AddressDefaultWidget extends WidgetBase {

  public function formElement(
    FieldItemListInterface $items,
    $delta, 
    Array $element, 
    Array &$form, 
    FormStateInterface $formState
  ) {

    // Text

    $element['street'] = [
      '#type' => 'textfield',
      '#title' => t('Text'),

      '#default_value' => isset($items[$delta]->street) ? 
          $items[$delta]->street : null,

      '#empty_value' => '',
      '#placeholder' => t('Введите ваш текст сюда...'),
      '#size' => 5,
    ];

    // Description

    $element['city'] = [
      '#type' => 'textfield',
      '#title' => t('Description'),
      '#default_value' => isset($items[$delta]->city) ? 
          $items[$delta]->city : null,
      '#empty_value' => '',
      '#placeholder' => t('Введите ваше описание сюда...'),
      '#size' => 5,
    ];
    
    // Links

    $element['links'] = [
      '#type' => 'textfield',
      '#title' => t('Links'),
      '#default_value' => isset($items[$delta]->links) ? 
          $items[$delta]->links : null,
      '#empty_value' => '',
      '#placeholder' => t('Вставьте ссылку сюда...'),
      '#size' => 5,
    ];

    
        // If cardinality is 1, ensure a label is output for the field by wrapping
    // it in a details element.
    if ($this->fieldDefinition->getFieldStorageDefinition()->getCardinality() == 1) {
      $element += [
        '#markup' => 'Fieldset:',
        '#type' => 'fieldset',
        '#attributes' => array('class' => array('container-inline')),
      ];
    }

    return $element;
  }

} // class