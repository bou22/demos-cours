<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="style-formulaire-simple.css" rel="stylesheet">
        <title>Démo des principaux éléments de formulaire HTML</title>
    </head>
    <body>
        <form method="get">
            <fieldset><!-- Les fielset regroupent visuellement des éléments d'un même formulaire -->
                <legend>Champs textes de saisies d'information</legend>
                <ul>
                    <li><label for="t1">Une information à inscrire: </label>
                        <input type="text" id="t1" name="t1" autofocus="true">
                    </li>
                    <li><label for="t2">Deuxième champ: </label>
                        <input type="text" id="t2" name="t2">
                    </li>
                    <li><label for="t3">N'oubliez pas de compléter cette information : </label>
                        <input type="text" id="t3" name="t3">
                    </li>
                    <li><!-- Ce champs de saisi de texte propose des choix, mais permet l'inscription libre d'information. -->
                        <label for="t16">Une liste avec suggestion: </label>
                        <input type="text" id="t16" name="t16" list="suggestion">
                        <input type="hidden" name="cache" value="le champ n'est pas visible, mais appartient tout de même au formulaire">
                        <datalist id="suggestion">
                            <label for="suggestion">Faites votre choix</label>
                            <select id="suggestion" name="suggestion">
                                <option>Ceci</option>
                                <option>Non pas ça</option>
                                <option>Plutôt ceci</option>
                            </select>
                        </datalist>
                    </li>                    <li><input type="submit" value="Ok">
                        <input type="reset" value="Effacer">
                        <button name="boutonDeRien">Bouton de rien</button>
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="t5">Votre courriel:
                            <input type="email" id="t5" name="t5">
                        </label>
                    </li>
                    <li>
                        <label for="t6">Le mot de passe :
                            <input type="password" id="t6" name="t6">
                        </label>
                    </li>
                    <li>
                        <label for="t7">Téléphone :
                            <input type="tel" id="t7" name="t7">
                        </label>
                    </li>
                    <li>
                        <label for="t7">Recherche : <input type="search" id="t8" name="t8">
                        </label>
                    </li>
                    <li>
                        <label for="t7">*Écrivez du texte : 
                            <textarea cols="10" rows="5" required="true"></textarea>
                        </label>
                    </li>
                </ul>
            </fieldset>
            <fieldset>
                <legend>Champs de formulaire avec informations pré-établies</legend>
                <ul>
                    <li>
                        <label for="t7">Choisir parmi cette liste :
                            <select>
                                <optgroup label="Fruits">
                                    <option>Banane</option>
                                    <option selected>Cerise</option>
                                    <option>Citron</option>
                                </optgroup>
                                <optgroup label="Choix autres">
                                    <option value="1">Valeur 1</option>
                                    <option value="2">Valeur 2</option>
                                    <option value="3">Valeur 3</option>
                                </optgroup>
                            </select>
                        </label>
                    </li>
                    <li>
                        <label class="checkbox" for="t11">Mon 1e choix: </label>
                        <input type="checkbox" value="c1" id="t11" name="t11">

                        <label class="checkbox" for="t12">Mon 2e choix: </label>
                        <input type="checkbox" value="c1" id="t12" name="t12">

                        <label class="checkbox" for="t13">Mon 3e choix: </label>
                        <input type="checkbox" value="c1" id="t13" name="t13">
                    </li>
                    <li>
                        <label class="checkbox" for="t14">Ce choix: </label>
                        <input type="radio" id="t14" name="monBoutionRadio">

                        <label class="checkbox" for="t15">Ou ce choix: </label>
                        <input type="radio" id="t15" name="monBoutionRadio">
                    </li>
                </ul>
            </fieldset>
        </form>
    </body>
</html>
