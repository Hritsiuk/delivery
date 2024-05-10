<?php

namespace App\InterFaces;

interface DeliveryInterface
{
    public function send(string $sender, string $product);
}
