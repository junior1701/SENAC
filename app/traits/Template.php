<?php

namespace app\traits;

use Slim\Views\Twig;

trait Template
{
    public function getTwig()
    {
        $twig = Twig::create(DIR_VIEW);
        return $twig;
    }
    public function setView($name)
    {
        return $name . EXT_VIEWS;
    }
}
