import express from "express"
import bodyParser from 'body-parser'
import http from "http"
import config from "./config"

import { AuthMiddleware } from "./middlewares/auth"

import { DataController } from "./controllers/data"
import { LoginController } from "./controllers/login"

let app = express();

// Add body parser to parse request body on each request
app.use(bodyParser.json());
// Add auth middleware on every /api route to ensure everyone is authenticated
app.use('/api', AuthMiddleware);
app.use('/api', DataController);
/*
 * Add the '/login' route handler
 */
app.use('/', LoginController);

http.createServer(app).listen(config.PORT,()=>{
	console.log("Server running on port", config.PORT)
})
