const container = document.getElementById("container");

fetch("/api/posts")
	.then((req) => {
		return req.json();
	})
	.then((data) => {
		if (data.error) {
			throw new Error(data.msg);
		}

		for (const post of data.data) {
			let p = document.createElement("div");

			p.innerHTML = `
				<h2>${post.title}</h2>
				<p>${post.text}</p>
			`;

			p.className = "post";

			container.append(p);
		}
	})
	.catch((err) => {
		console.error(err);
	});
