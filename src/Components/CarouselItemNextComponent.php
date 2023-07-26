<?php

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('carousel_item_next')]
class CarouselItemNextComponent
{
    public string $carouselItemTitle;
    public string $carouselItemImage;
    public string $carouselItemImage2;
}
