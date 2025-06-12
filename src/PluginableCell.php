<?php

namespace Snr\SimpleTable;

/**
 * Является абстрактным. Может быть использован
 *  в качестве базового класса для ЯЧЕЕК разных типов
 */
abstract class PluginableCell extends Cell implements PluginableCellInterface {

  use PluginableInstanceTrait;

}
