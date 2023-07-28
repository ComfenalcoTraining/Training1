import mongoose from "mongoose";

mongoose
	.connect("mongodb://localhost/test", {})
	.then((db) => console.log("database is connected"))
	.catch((err) => console.log(err));
