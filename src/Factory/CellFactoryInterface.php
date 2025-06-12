<?php

namespace Snr\SimpleTable\Factory;

use Snr\SimpleTable\CellInterface;

/**
 * Создает экземпляры (@see CellInterface) на основе массива входных данных
 */
interface CellFactoryInterface {

  /**
   * Возвращает экземпляр @see CellInterface
   *
   * @param string $plugin_id
   *  Идентификатор типа (плагина)
   *
   * @param array $data
   *  Массив параметров для создания экземпляра, имеет следующие ключи:
   *  'row_id' - идентификатор строки ячейки
   *  'column_id' - идентификатор столбца ячейки
   *
   * @return CellInterface
   */
  public function createInstance(string $plugin_id, array $data);

}
