import jwt from "jsonwebtoken"
import config from "../config"

const AuthMiddleware = (req, res, next) => {
	/*
	 * Check if authorization header is set
	 */
	if (req.headers && req.headers.authorization) {
		try {
			/*
			 * Try to decode & verify the JWT token
			 * The token contains user's id ( it can contain more informations )
			 * and this is saved in req.user object
			 */
			req.user = jwt.verify(req.headers.authorization, config.JWT_PUBLIC, {algorithm:  ["RS256"]});
			console.log("auth pass for user :", req.user.id.toString())
		} catch (err) {
			/*
			 * If the authorization header is corrupted, it throws exception
			 * So return 401 status code with JSON error message
			 */
			return res.status(401).json({
				error: {
					msg: "Failed to authenticate token!",
				},
			});
		}
	} else {
		/*
		 * If there is no autorization header, return 401 status code with JSON
		 * error message
		 */
		return res.status(401).json({
			error: {
				msg: "No token!",
			},
		});
	}
	next();
	return;
};

export { AuthMiddleware }
