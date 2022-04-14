<?php

namespace Arsoft\Module;

class config
{

  public static function getParrentModules()
  {
    // tentukan parrent module yang ada di project arsoft sekarang
    return [
        "Auth",
        "Master",
        "Hrd",
        "Pembelian",
        "Inventory",
        "Penjualan",
        "Keuangan"
    ];
  }

  public static function getModulStructure()
  {
    // tentukan parrent module yang ada di project arsoft sekarang
    return [
        "Controllers",
        "Middleware",
        "Models",
        "Providers",
        "Resources",
        "Routes",
        "Views"
    ];
  }
}

?>