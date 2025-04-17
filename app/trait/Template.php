<?php

namespace App\Trait;

use Slim\Views\Twig;

trait Template
{
    public function getTwig()
    {
        try {
            # Criamos o twig e passamos por parametro, o diretorio padrão das views
            $twig = Twig::create(DIR_VIEWS);
            # Adicionamor uma variavel global ao twig, que pode ser acessada em qualquer view
            $twig->getEnvironment()->addGlobal('nome_variavel', 'valor_variavel');
            return $twig;
        } catch (\Exception $e) {
            # Caso ocorra algum erro, retornamos uma mensagem de erro
            throw new \Exception('Restrição: ' . $e->getMessage(),1);
        }
    }
    public function setView($name)
    {
        return $name . EXT_VIEWS;
    }
}
