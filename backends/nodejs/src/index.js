const http = require("http");

const lorem = `
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque iaculis lectus ullamcorper, hendrerit velit eu, posuere justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur porttitor vehicula ornare. Nunc eget magna nulla. Donec dignissim pulvinar hendrerit. Vestibulum et lorem dui. Vivamus ultrices porttitor purus, et blandit tortor accumsan non. Proin in consequat arcu, nec blandit ipsum. Nam lobortis congue mi, sed dictum leo. Sed facilisis ultricies pulvinar. Morbi nibh ante, iaculis in pharetra vitae, consectetur eget arcu. Duis non convallis arcu, eu dictum mauris.

Curabitur venenatis a sapien vel commodo. Suspendisse potenti. Fusce at luctus velit. Vivamus enim elit, vestibulum nec fermentum sollicitudin, feugiat et velit. Morbi lobortis lacus ut bibendum malesuada. Fusce a turpis maximus, euismod tellus vitae, lobortis turpis. Sed pharetra pellentesque quam ut maximus. Proin quis posuere tellus. Nam venenatis metus egestas placerat pharetra.

Curabitur rutrum eu dui nec congue. Suspendisse ante augue, facilisis at laoreet ac, mattis tristique lectus. Morbi eu quam erat. Sed suscipit at purus non commodo. Aenean non mi sit amet felis rutrum placerat. Morbi tortor purus, dapibus a erat vitae, dignissim pharetra metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer tempus porttitor lacus vel iaculis. Nam volutpat turpis eget sem congue sagittis. Sed mattis ipsum nibh, et lacinia nunc consectetur sit amet. Curabitur sit amet ligula eu mi semper malesuada non et magna. Nam vitae imperdiet enim, eget sollicitudin justo. Sed risus lacus, facilisis eu consequat non, tincidunt ut est.

Integer eu congue elit. Morbi nisl lorem, pharetra at augue sit amet, tempus ultricies augue. Nullam tincidunt, lacus at vulputate euismod, sem enim bibendum augue, in egestas neque orci non lorem. Pellentesque vel odio semper, efficitur dui eu, eleifend augue. Praesent pellentesque porttitor felis sit amet consequat. Maecenas fermentum neque ac tempus vestibulum. Sed commodo tempor neque ut facilisis. Phasellus sit amet pretium ipsum.

In est tortor, tempor sed finibus vel, sollicitudin ut ipsum. Ut id dui rhoncus, bibendum sem at, porttitor nisl. Duis facilisis viverra leo, ac ullamcorper neque ullamcorper at. Vivamus dignissim leo vel augue iaculis, quis consectetur turpis faucibus. Phasellus sed finibus magna. Proin consequat rhoncus placerat. Pellentesque eget lacus eget nibh sagittis euismod. Etiam ornare nunc a commodo vestibulum. Cras nec velit dolor. Nulla semper massa nec semper rhoncus. Sed euismod justo a magna porttitor, a posuere lacus accumsan. Morbi congue sem leo, vel sagittis lacus volutpat vel. Sed pretium mauris dolor, at scelerisque lorem placerat tincidunt. Morbi ut justo a augue laoreet vehicula. Nam feugiat felis metus, ac scelerisque diam pulvinar eu. Donec dictum consectetur est at luctus.
`

const posts = async (req, res) => {
	res.writeHead(200, { 'Content-Type': 'application/json' });
	res.end(
		JSON.stringify({
			error: false,
			data: [
				{
					id: 1,
					title: "Post 1",
					text: lorem
				},
				{
					id: 2,
					title: "Post 2",
					text: lorem
				},
				{
					id: 3,
					title: "Post 3",
					text: lorem
				},
				{
					id: 4,
					title: "Post 4",
					text: lorem
				},
			],
		}),
	);
};

const paths = [
	{
		path: "/posts",
		handler: posts,
	},
];

const requestListener = async (req, res) => {
	let handled = false;

	for (const p of paths) {
		if (req.url.includes(p.path)) {
			handled = true;
			res.writeHead(200);
			p.handler(req, res);
			break;
		}
	}

	if (!handled) {
		res.writeHead(404, { 'Content-Type': 'application/json' });
		res.end(
			JSON.stringify({
				error: true,
				msg: `The path ${req.url} doesn't exist!`,
			}),
		);
	}
};

const server = http.createServer(requestListener);
server.listen(4000);
