import express from 'express'

const DataController = express.Router();

DataController.post("/data", (req, res) => {
	console.log("data for user :", req.user.id.toString())
	if (req.user.rank === 'admin') {
		res.json([
			{
				message: "Admin message 1"
			},
			{
				message: "Admin message 2"
			},
			{
				message: "Admin message 3"
			}
		]);
	}
	else if (req.user.rank === 'user') {
		res.json([
			{
				message: "User message 1"
			},
			{
				message: "User message 2"
			},
			{
				message: "User message 3"
			}
		]);
	} else {
		res.status(401).json({
			error: {
				message: "You don't have the permission to be here"
			}
		});
	}
})

export { DataController }
