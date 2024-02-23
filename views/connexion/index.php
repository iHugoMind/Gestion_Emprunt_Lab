<div class="container" id="container">
        <div class="form-container register-container">
            <form action="/ConnexionController/handleRegistration">
                <h1> S'inscrire. </h1>
                <div class="incol 1">
                <input type="text" placeholder="Nom">
                <input type="text" placeholder="Prenom">
                </div>
                <div class="incol 2">
                <input type="email"  name = "email" placeholder="Email">
                <input type="password" name = "password"  placeholder="Mot de passe">
                <input type="tel" name = "tel" placeholder="Téléphone">
                <input type="text" name = "etablissement" placeholder="Etablissement ">
                </div>
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <button> s'insrcrire </button>
            </form>
            <?php if (isset($error)) : ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
        </div>

        <div class="form-container login-container">
            <form method="post" action="/ConnexionController/verifyConnection">
                <h1> Se connecter. </h1>
                <input type="email" name = "email" placeholder="Email">
                <input type="password" name = "password" placeholder="Mot de passe">
                <div class="pass-link">
                    <a href=""> Mot de passe oublié ? </a>
                </div>
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <button name="submit">connexion</button>
            </form>
            <?php if (isset($error)) : ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title"> Bonjour </h1>
                    <p>Si vous avez deja un compte,  connectez vous</p>
                    <button class="ghost" id="login">Connexion
                        <i class="lni lni-arrow-left login"></i>
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title"> Bonjour </h1>
                    <p>Si vous n'avez pas de compte, <br>enregistrez vous</p>
                     <button class="ghost" id="register">S'enregistrer
                        <i class="lni lni-arrow-right register"></i>
                     </button>
                </div>
            </div>
        </div>