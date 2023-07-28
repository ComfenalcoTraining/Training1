import { NextFunction, Request, Response } from "express";
import jwt from "jsonwebtoken";

interface IPayload {
	_id: string;
	iat: number;
	exp: number;
}
export const TokenValidation = (
	req: Request,
	res: Response,
	next: NextFunction
) => {
	const token = req.header("auth-token");
	if (!token) {
		return res.status(401).json({ error: "acceso denegado" });
	}
	const payload = jwt.verify(
		token,
		process.env.TOKEN_SECRET || ""
	) as IPayload;

	//extending req properties (types.d.ts) and setting payload id user value
	req.userId = payload._id;

	console.log(payload);
	next();
};
