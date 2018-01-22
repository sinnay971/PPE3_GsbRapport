<div data-role="page" id="pageConnexion">
    <?php
        include_once "entetepage.html";
    ?>
    <div data-role="content" id="divconnexion">
        <?php
            include "logo.html";
        ?>
        <div class="ui-field-contain">
            <label for ="login">Login</label>
            <input type="text" name="login" id="login" value=""/>
            <label for ="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" value=""/>
        </div>
        <div id="message"></div>
        <p>
            <a data-role="button" id="btnconnexion" data-inline="true" > Connexion </a>
        </p>
    </div><!-- Content -->
</div><!-- Page -->
    