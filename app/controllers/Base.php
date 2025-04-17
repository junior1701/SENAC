<?php

namespace app\controllers;

use app\trait\Response;
use app\trait\Template;

abstract class Base
{
    use Template, Response;
}
