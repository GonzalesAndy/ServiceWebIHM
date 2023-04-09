<?php
namespace gui;

include_once "View.php";
// Interface graphique de la page de création de compte
class ViewCreate extends View
{
    public function __construct($layout)
    {
        parent::__construct($layout);

        $this->title = 'Exemple Annonces Basic PHP: Connexion';
        
        $this->content = '
        <main>
            <div class="login-container">
            <h2>Créer un compte</h2>
            <form method="get" action="/creation">
                <label for="mail">Votre adresse mail</label>
                <input type="email" id="mail" name="mail" required>
                <label for="login">Votre identifiant</label>
                <input type="text" id="login" name="login" required>
                <label for="password">Mot de passe</label>
                <input type="password" name=password id="password" required>
                <button id=loginButton gtype="submit">Créer un compte</button>
            </form>
            <div class="register">
                <p>Déjà client ?</p>
                <a href="/seConnecter">Se connecter</a>
            </div>
        </div>
        </main>
            ';
    }
}