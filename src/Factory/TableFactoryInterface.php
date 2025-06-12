<?php

namespace Snr\SimpleTable\Factory;

use Snr\SimpleTable\TableInterface;

/**
 * Создает экземпляры (@see TableInterface) на основе массива входных данных
 */
interface TableFactoryInterface {

  /**
   * @param string $plugin_id
   *  Идентификатор типа (плагина)
   *
   * @param array $configuration
   *  Инициализационные данные таблицы
   *
   * @code
   *  ['columns' => [
   *    ['id' => 'column_1',
   *     'label' => 'Столбец 1'],
   *    ...
   *    ['id' => 'column_5',
   *     'label' => 'Столбец 5']
   *   ],
   *   'values' => [
   *     '1' => [
   *       'column_1' => '1',
   *       ...
   *       'column_5' => '5'
   *     ],
   *     '2' => [
   *       ....
   *     ]
   *   ]
   * ]
   * @endcode
   *
   * @return TableInterface
   */
  public function createInstance(string $plugin_id, array $configuration);

}
