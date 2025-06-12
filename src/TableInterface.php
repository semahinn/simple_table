<?php

namespace Snr\SimpleTable;

/**
 * Описывает таблицу с определённым количеством столбцов
 * Содержит метод для получения значения определённой
 *  ячейки таблицы @see TableInterface::value()
 */
interface TableInterface {

  /**
   * Возвращает значение ячейки
   *
   * @param string $row_id
   *  Идентифиактор строки
   *
   * @param string $column_id
   *  Идентификатор столбца
   *
   * @param array $options
   *
   * @return mixed
   *
   * @throws \InvalidArgumentException
   */
  public function value(string $row_id, string $column_id, array $options = []);

  /**
   * Возвращает все ячейки
   *
   * @return array
   */
  public function getCells();

  /**
   * @return array
   */
  public function getColumnDefinitions();

  /**
   * @return array
   */
  public function toArray();

}
