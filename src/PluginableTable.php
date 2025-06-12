<?php

namespace Snr\SimpleTable;

/**
 * Является абстрактным. Может быть использован
 *  в качестве базового класса для плагинов (типов) ТАБЛИЦ
 */
abstract class PluginableTable extends Table implements PluginableTableInterface {

  use PluginableInstanceTrait;

}
