<?php

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('card_home')]
class CardHomeComponent
{
    public string $cardTitle;
    public string $cardLink;
    public string $cardImage;
    public string $cardAlt;
}
