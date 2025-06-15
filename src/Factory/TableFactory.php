<?php

namespace Snr\SimpleTable\Factory;

use Snr\Plugin\Factory\DefaultFactory;
use Snr\Plugin\Factory\FactoryInterface;
use Snr\SimpleTable\Manager\CellPluginManagerInterface;
use Snr\SimpleTable\TableInterface;

/**
 * Прототипы методов @see TableFactoryInterface::createInstance() и
 * @see FactoryInterface::createInstance() полностью совпадают
 */
class TableFactory extends DefaultFactory implements TableFactoryInterface {

  /**
   * {@inheritdoc}
   */
  public function createInstance($plugin_id, array $configuration = []) {
    $plugin_definition = $this->discovery->getDefinition($plugin_id);
    $plugin_class = static::getPluginClass($plugin_id, $plugin_definition, $this->interface);

    $cell_plugin_class = $plugin_definition['cell_plugin_class'] ?? null;
    /**
     * @var $cell_plugin_manager CellPluginManagerInterface
     */
    $cell_plugin_manager = $cell_plugin_class::getPluginManager();

    $values = [];
    $column_definitions = [];
    // В простейшем случае это всегда массив, каждый элемент
    // которого как минимум должен иметь ключ 'id'
    if (!empty($configuration['columns']) && is_array($configuration['columns'])) {
      foreach ($configuration['columns'] as $value) {
        if (isset($value['id']) && is_string($value['id'])) {
          $id = $value['id'];
          $column_definitions[$id] = [];
          unset($value['id']);
          foreach ($value as $k => $v) {
            $column_definitions[$id][$k] = $v;
          }
        }
        else throw new \InvalidArgumentException("");
      }
    }

    if (!empty($configuration['values']) && is_array($configuration['values'])) {
      foreach ($configuration['values'] as $row_id => $row) {
        if (is_array($row)) {
          foreach ($row as $column_id => $item) {
            $item += [
              'row_id' => $row_id,
              'column_id' => $column_id,
            ];
            $values[$row_id][$column_id] =
              $cell_plugin_manager->createInstance(static::getTypeFromData($item) ?? 'abstract_rule', $item);
          }
        }
      }
    }

    $this->preCreate($plugin_class, $plugin_definition, $configuration);
    $instance = new $plugin_class($column_definitions, $values);
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

  }

  /**
   * @param TableInterface $table
   *
   * @return void
   */
  protected function postCreate(TableInterface $table) {

  }

  /**
   * Пытается найти значения тип этого правила
   * в параметрах для создания экземпляра
   *
   * @param array $data
   *  Параметры для создания экземпляра
   *
   * @return string|null
   */
  protected static function getTypeFromData(array $data) {
    return (empty($data['type']) || !is_string($data['type'])) ? null : $data['type'];
  }

}
