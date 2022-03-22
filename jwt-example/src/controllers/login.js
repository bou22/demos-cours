import jwt from "jsonwebtoken"
import config from "../config"
import express from 'express'

const LoginController = express.Router();

LoginController.post("/login", (req, res) => {
	/*
	 * Check if the username and password is correct
	 */
	if (req.body.username === 'admin' && req.body.password === 'admin') {
		res.json({
			id: 1,
			username: 'admin',
			jwt: jwt.sign({
				id: 1,
				rank: "admin",
			}, config.JWT_SECRET, { expiresIn: 60 * 60 })
		});
	}
	else if (req.body.username === 'user' && req.body.password === 'user') {
		res.json({
			id: 2,
			username: 'user',
			jwt: jwt.sign({
				id: 2,
				rank: "user",
			}, config.JWT_SECRET, { expiresIn: 60 * 60 })
		});
	} else {
		/*
		 * If the username or password was wrong, return 401 ( Unauthorized )
		 * status code and JSON error message
		 */
		res.status(401).json({
			error: {
				message: 'Wrong username or password!'
			}
		});
	}
})

export { LoginController }
