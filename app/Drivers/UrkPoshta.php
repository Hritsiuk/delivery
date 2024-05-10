<?php

namespace App\Drivers;

use App\Interfaces\DeliveryInterface;

class UrkPoshta implements DeliveryInterface
{
    const NAME = 'urk_poshta';

    public function send(string $sender, string $product)
    {
        return $this->getName() . ' sended ' . $product . ' to ' . $sender;
    }
    
    public function getName(): string
    {
        return self::NAME;
    }
}
