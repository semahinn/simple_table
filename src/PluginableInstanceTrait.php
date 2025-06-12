<?php

namespace Snr\SimpleTable;

trait PluginableInstanceTrait {

  /**
   * @return array
   */
  protected function getPluginDefinition() {
    return static::getPluginManager()->getDefinitionByPluginClass(static::class);
  }
}
