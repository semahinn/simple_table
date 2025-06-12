<?php

namespace Snr\SimpleTable;

use Snr\Plugin\Plugin\PluginableInstanceInterface;

/**
 * Описывает ТАБЛИЦУ
 * Каждая таблица относится к одному из типу (плагину) таблиц
 */
interface PluginableTableInterface extends TableInterface, PluginableInstanceInterface {

}
