<div class="container" id="container">
        <div class="form-container register-container">
            <form action="">
                <h1> S'inscrire. </h1>
                <div class="incol 1">
                <input type="text" placeholder="Nom">
                <input type="text" placeholder="Prenom">
                </div>
                <div class="incol 2">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Mot de passe">
                <input type="tel" placeholder="Téléphone">
                <input type="text" placeholder="Etablissment ">
                </div>
                <button> s'insrcrire </button>
            </form>
        </div>

        <div class="form-container login-container">
            <form method="post" action="./login.php">
                <h1> Se connecter. </h1>
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Mot de passe">
                <div class="pass-link">
                    <a href=""> Mot de passe oublié ? </a>
                </div>
                <button name="submit">connexion</button>
            </form>
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