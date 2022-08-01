<?php

namespace Drupal\custom_country_timeloaction\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\custom_country_timeloaction\CustomTimeService;
/**
 * Provides a 'Country Location' Block.
 *
 * @Block(
 *   id = "location_block",
 *   admin_label = @Translation("Country and Location block"),
 *   category = @Translation("World Time"),
 * )
 */
class GetuserLocation extends BlockBase implements ContainerFactoryPluginInterface{
  
  protected $customdatetime;
  
  /**
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param \Drupal\custom_country_timeloaction\CustomTimeService $customtimeservice
   */
   
  public function __construct(array $configuration, $plugin_id, $plugin_definition, CustomTimeService $customtimeservice) {
    $this->customdatetime = $customtimeservice;
  }
  
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('custom_country_timeloaction.custom_services')
    );
  }
  
  /**
   * {@inheritdoc}
   */
  public function build() {
    $site_config = \Drupal::config('country.adminsettings');
    /**
    * Injecting Drupal\custom_country_timeloaction\CustomTimeService service Dependency
    */
    $current_time = $this->customdatetime->getCustomDate($site_config->get('country_select'));
    return array(
      '#theme' => 'country_datetime',
      '#country' => $site_config->get('country'),
      '#city' => $site_config->get('city'),
      '#time' => $current_time
    );
  }
  /**
  * {@inheritdoc}
  */
  public function getCacheMaxAge() {
    return 0;
  }

}