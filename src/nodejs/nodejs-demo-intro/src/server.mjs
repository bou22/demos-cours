/** Importation des modules de couches intermédiaires: middleware */
import express from "express";
import { getRandom } from "./modules/random.mjs";
import path from "path";

// Constants
const PORT = 3000;
const HOST = '0.0.0.0';

/**
 * Le frameword express comme serveur web.
 */
const app = express();

/** Routage de l'url racine. Les documents dans le répertoire sont rendus en réponse. */
app.get('/', (req, res) => {
  app.use(express.static('public'));
});

/** Routage de l'url info. Retourne une valeur aléatoire. */
app.get('/info', (req, res) => {
  let v = getRandom();
  res.send('Le résultat: ' + v);
});

/** Routage de l'url /echo. Le serveur récupère le paramètre get. */
app.get('/echo', (req, res) => {
  let v = req.param('info');
  res.send('Le résultat: ' + v);
});

/** Démarrage du serveur */
app.listen(PORT, HOST);
console.log(`Running on http://${HOST}:${PORT}`);