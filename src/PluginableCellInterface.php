<?php

namespace Snr\SimpleTable;

use Snr\Plugin\Plugin\PluginableInstanceInterface;

/**
 * Описывает ЯЧЕЙКУ таблицы
 * Каждая ячейка относится к одному из типу (плагину) ячеек
 */
interface PluginableCellInterface extends CellInterface, PluginableInstanceInterface {

}
