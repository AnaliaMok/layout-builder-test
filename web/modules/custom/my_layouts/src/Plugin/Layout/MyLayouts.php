<?php

namespace Drupal\my_layouts\Plugin\Layout;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Layout\LayoutDefault;
use Drupal\Core\Plugin\PluginFormInterface;

class MyLayouts extends LayoutDefault implements PluginFormInterface
{
    /**
     * {@inheritdoc}
     */
    public function defaultConfiguration()
    {
        return parent::defaultConfiguration() + [
            'extra_classes' => '',
            'section_size' => 'centered',
            'pad_blocks' => false,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function buildConfigurationForm(array $form, FormStateInterface $form_state)
    {
        $configuration = $this->getConfiguration();
        $form['extra_classes'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Extra classes'),
            '#default_value' => $configuration['extra_classes'],
        ];

        $form['section_size'] = [
            '#type' => 'select',
            '#title' => $this->t('Section Size'),
            '#default_value' => $configuration['section_size'],
            '#options' => [
                'centered' => $this->t('Centered'),
                'full' => $this->t('Full Width'),
            ],
        ];

        if ($this->pluginId !== "layout_onecol_100") {
            $form['pad_blocks'] = [
                '#type' => 'checkbox',
                '#title' => $this->t('Add Spacing Aroung Blocks?'),
                '#default_value' => $configuration['pad_blocks'],
                '#return_value' => true,
            ];
        }

        return $form;
    }

    /**
     * @inheritdoc
     */
    public function validateConfigurationForm(array &$form, FormStateInterface $form_state)
    {
        // any additional form validation that is required
    }

    /**
     * {@inheritdoc}
     */
    public function submitConfigurationForm(array &$form, FormStateInterface $form_state)
    {
        $this->configuration['extra_classes'] = $form_state->getValue('extra_classes');
        $this->configuration['section_size'] = $form_state->getValue('section_size');
        $this->configuration['pad_blocks'] = $form_state->getValue('pad_blocks') ?? $this->configuration['pad_blocks'];
    }
}
