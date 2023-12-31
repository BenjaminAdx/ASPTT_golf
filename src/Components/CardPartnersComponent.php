<?php

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('card_partners')]
class CardPartnersComponent
{
    public string $cardTitle;
    public string $cardLink;
    public string $cardImage;
    public string $cardAlt;
}
