<?php

namespace Snr\SimpleTable\Factory;

use Snr\Plugin\Factory\DefaultFactory;
use Snr\Plugin\Factory\FactoryInterface;
use Snr\SimpleTable\CellInterface;

/**
 * Прототипы методов @see CellFactoryInterface::createInstance() и
 * @see FactoryInterface::createInstance() полностью совпадают
 */
class CellFactory extends DefaultFactory implements CellFactoryInterface {

  /**
   * {@inheritdoc}
   */
  public function createInstance($plugin_id, array $configuration = []) {
    $plugin_definition = $this->discovery->getDefinition($plugin_id);
    $plugin_class = static::getPluginClass($plugin_id, $plugin_definition, $this->interface);
    $this->preCreate($plugin_class, $plugin_definition, $configuration);
    $instance = new $plugin_class($configuration['row_id'], $configuration['column_id']);
    $this->postCreate($instance);
    return $instance;
  }

  /**
   * @param string $plugin_class
   *  Класс для создания экземпляра
   *
   * @param array $plugin_definition
   *  Определение плагина
   *
   * @param array $configuration
   *  Параметры создания
   *
   * @return void
   */
  protected function preCreate(string $plugin_class, array $plugin_definition, array &$configuration = []) {
    if (empty($configuration['row_id']) || !is_string($configuration['row_id']))
      throw new \InvalidArgumentException("Параметр \"Идентификатор строки\" ('row_id') должен быть строкой");
    if (empty($configuration['column_id']) || !is_string($configuration['column_id']))
      throw new \InvalidArgumentException("Параметр \"Идентификатор столбца\" ('column_id') должен быть строкой");
  }

  /**
   * @param CellInterface $cell
   *
   * @return void
   */
  protected function postCreate(CellInterface $cell) {

  }

}
