<?php

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('navbar_button')]
class NavbarButtonComponent
{
    public string $buttonTitle;
}
