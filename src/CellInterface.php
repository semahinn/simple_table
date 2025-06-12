<?php

namespace Snr\SimpleTable;

/**
 * Описывает ячейку таблицы
 * Основной способ взаимодействия - получить значение ячейки @see CellInterface::value()
 */
interface CellInterface {

  /**
   * Возвращает идентификатор строки
   *
   * @return string
   */
  public function getRowId();

  /**
   * Возвращает идентификатор столбца
   *
   * @return string
   */
  public function getColumnId();

  /**
   * Возвращает значение ячейки
   *
   * @return mixed
   */
  public function value();
  
  /**
   * @return array
   */
  public function toArray();

}
