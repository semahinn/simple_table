<?php

namespace Snr\SimpleTable;

/**
 * Является абстрактным. Может быть использован
 *  в качестве базового класса для реализации ЯЧЕЕК разных типов
 */
abstract class Cell implements CellInterface {

  /**
   * Идентификатор строки, в которой находится эта ячейка
   *
   * @var string
   */
  protected $rowId;

  /**
   * Идентификатор столбца, в котором находится эта ячейка
   *
   * @var string
   */
  protected $columnId;

  /**
   * @param string $row_id
   * @param string $column_id
   */
  public function __construct(string $row_id, string $column_id) {
    $this->rowId = $row_id;
    $this->columnId = $column_id;
  }

  /**
   * @return string
   */
  public function getRowId() {
    return $this->rowId;
  }

  /**
   * @return string
   */
  public function getColumnId() {
    return $this->columnId;
  }

  /**
   * {@inheritdoc}
   */
  public abstract function value();
  
  /**
   * {@inheritdoc}
   */
  public function toArray() {
    return [
      'row_id' => $this->rowId,
      'column_id' => $this->columnId,
    ];
  }
  
}
