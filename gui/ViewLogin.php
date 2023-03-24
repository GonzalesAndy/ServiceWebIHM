<?php
namespace gui;

include_once "View.php";

class ViewLogin extends View
{
    public function __construct($layout)
    {
        parent::__construct($layout);

        $this->title = 'Exemple Annonces Basic PHP: Connexion';
        
        $this->content = '
        <main>
            <div class="login-container">
            <h2>Connexion</h2>
            <form method="post" action="/">
                <label for="login">Votre identifiant</label>
                <input type="text" id="login" name="login" required>
                <label for="password">Mot de passe</label>
                <input type="password" name=password id="password" required>
                <button id=loginButton gtype="submit">Se connecter</button>
            </form>
            <div class="register">
                <p>Nouveau client ?</p>
                <a href="#">Créer un compte</a>
            </div>
        </div>
        </main>
            ';
    }
}