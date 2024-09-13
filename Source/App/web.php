<?php

namespace Source\App;

class Web
{
    public function home($data)
    {
        echo"<h1>Home</h1>";
        var_dump($data);
    }

    public function contact($data)
    {
        echo"<h1>Contato</h1>";
        var_dump($data);
    }

    public function error($data)
    {
        echo"<h1>Erro {$data["errcode"]}</h1>";
        var_dump($data);
    }
}