/** Importation des modules de couches intermédiaires: middleware */
import express, { urlencoded } from "express";
import { getRandom } from "./modules/random.mjs";
import path from "path";

// Constants
const PORT = 3000;
const HOST = '0.0.0.0';

/**
 * Le frameword express comme serveur web.
 */
const app = express()
app.use(express.urlencoded({ extended: false}))

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
  let v = req.query.info
  res.send('Le résultat: ' + v);
});

/** Routage de l'url /majuscule. Le serveur récupère le paramètre get. */
app.get('/majuscule/:mot1/:mot2', (req, res) => {
  let info1 = req.params.mot1
  let info2 = req.params.mot2
  let info3 = req.query.info
  res.send('En majuscule SVP: ' + info1.toUpperCase() + info2.toUpperCase() + info3);
});

/** Routage de l'url avec la méthode POST.  */
app.post('/post', (req, res) => {
  /**req.body est une structure de donnée prête à être utilisée. */
  let info = req.body 
  console.log(info)
  res.send('Le champ de la requête post : ' + info.genre);
});

/** Démarrage du serveur */
app.listen(PORT, HOST);
console.log(`Running on http://${HOST}:${PORT}`);