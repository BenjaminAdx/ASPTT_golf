<?php

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('card_travel')]
class CardTravelComponent
{
    public string $cardTitle;
    public string $cardDuration;
    public string $cardContent;
    public string $cardImage;
    public string $cardAlt;
}
