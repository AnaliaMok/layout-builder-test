<?php

namespace Drupal\custom_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;

/**
 * Provides a 'SimpleImageBlock' block.
 *
 * @Block(
 *  id = "simple_image_block",
 *  admin_label = @Translation("Simple image block"),
 *  category = @Translation("Simple Blocks")
 * )
 */
class SimpleImageBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();

    $form['image_caption'] = [
      '#type' => 'html',
      '#title' => $this->t('Image Caption'),
      '#description' => $this->t('Optional caption text describing the given image'),
      '#default_value' => isset($config['image_caption']) ?  $config['image_caption'] : '',
      '#weight' => '0',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $this->configuration['image_caption'] = $form_state->getValue('image_caption');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#theme'] = 'simple_image_block';
    $build['#content'][] = $this->configuration['image_caption'];

    return $build;
  }

}
