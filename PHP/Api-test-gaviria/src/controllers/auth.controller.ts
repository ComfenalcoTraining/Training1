import { Request, Response } from "express";
import User, { IUser } from "../models/User";
import jwt from "jsonwebtoken";

export const signup = async (req: Request, res: Response) => {
	//Saving new user
	const user: IUser = new User({
		username: req.body.username,
		email: req.body.email,
		password: req.body.password,
	});
	user.password = await user.encryptPassword(user.password);
	const savedUser = await user.save();

	//creating token
	const token: string = jwt.sign(
		{ _id: savedUser._id },
		process.env.TOKEN_SECRET || ""
	);
	res.header("auth-token", token).json(savedUser);
};

export const signin = async (req: Request, res: Response) => {
	const user = await User.findOne({ email: req.body.email });
	if (!user) {
		return res.status(400).json({ error: "el usuario no existe" });
	}

	const correctPassword: boolean = await user.validatePassword(
		req.body.password
	);

	if (!correctPassword) {
		return res.status(400).json({ error: "Password incorrecto" });
	}

	//Creating Token
	const token: string = jwt.sign(
		{ _id: user._id },
		process.env.TOKEN_SECRET || "",
		{
			expiresIn: 60 * 60 * 24,
		}
	);

	res.header("auth-token", token).json(user);
};

export const profile = async (req: Request, res: Response) => {
	const user = await User.findById(req.userId, { password: 0 });

	if (!user) {
		res.status(404).json({ error: "Usuario no encontrado" });
	}
	res.json(user);
};
