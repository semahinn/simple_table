<?php

namespace Snr\SimpleTable;

/**
 * Является абстрактным. Может быть использован
 *  в качестве базового класса для реализации ТАБЛИЦ разных типов
 */
abstract class Table implements TableInterface {

  /**
   * Двумерный массив ячеек, к каждой из которых
   * можно обратиться с помощью идентфикатора строки и столбца
   * Например: $this->values[$row_id][$column_id]
   *
   * @var array
   */
  protected $values;

  /**
   * Массив определений столбцов,
   * ключами которого являются строки (это и есть идентификаторы столбцов)
   *
   * @var array
   */
  protected $columnDefinitions;

  /**
   * @param array $column_definitions
   * @param array $values
   */
  public function __construct(array $column_definitions, array $values) {
    $this->columnDefinitions = $column_definitions;
    $this->values = $values;
  }

  /**
   * {@inheritdoc}
   */
  public function value(string $row_id, string $column_id, array $options = []) {
    if (!isset($this->columnDefinitions[$column_id]))
      throw new \InvalidArgumentException("Столбца \"$column_id\" не существует");
    if (!isset($this->values[$row_id][$column_id]))
      throw new \InvalidArgumentException("Строки \"$row_id\" не существует");
    return $this->values[$row_id][$column_id]->value();
  }

  /**
   * {@inheritdoc}
   */
  public function getCells() {
    return $this->values;
  }

  /**
   * {@inheritdoc}
   */
  public function getColumnDefinitions() {
    return $this->columnDefinitions;
  }

  /**
   * {@inheritdoc}
   */
  public function toArray() {
    $values = [];
    foreach ($this->values as $row_id => $row) {
      foreach ($row as $column_id => $cell) {
        $values[$row_id][$column_id] = $cell->toArray();
      }
    }

    return [
      'columns' => $this->columnDefinitions,
      'values' => $values,
    ];
  }

}
