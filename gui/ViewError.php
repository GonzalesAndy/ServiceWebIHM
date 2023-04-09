<?php

namespace gui;

include_once "View.php";
// Interface graphique de la page d'erreur
class ViewError extends View
{
    public function __construct($layout, $error, $redirect)
    {
        parent::__construct($layout);
        $this->content = '<p>' . $error . '</p>';
        header( "refresh:5;url=/" );
    }
}