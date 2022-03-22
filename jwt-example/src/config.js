import fs from "fs"

export default {
	PORT: 9000,
	JWT_PUBLIC: fs.readFileSync("./public.key", "utf8"),
	JWT_PRIVATE: fs.readFileSync("./private.key", "utf8"),
};
