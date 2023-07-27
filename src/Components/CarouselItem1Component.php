<?php

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('carousel_item1')]
class CarouselItem1Component
{
    public string $carouselItemImage;
    public string $carouselItemImage2;
}
