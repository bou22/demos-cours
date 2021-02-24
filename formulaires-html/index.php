<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Balise communes sur des formulaires</title>
    </head>
    <body>
        <form>
            <input type="color">
            <label for="onFruit">Quel est votre fruit préféré ?</label>
            <input type="text" id="onFruit" list="maSuggestion" />
            <datalist id="maSuggestion">
              <option>Pomme</option>
              <option>Banane</option>
              <option>Mûre</option>
              <option>Airelles</option>
              <option>Citron</option>
              <option>Litchi</option>
              <option>Pêche</option>
              <option>Poire</option>
            </datalist>
        </form>
    </body>
</html>
