import React, { Component } from "react"
import Head from "./header";

class App extends Component {
	constructor(props: {}) {
		super(props)
		this.state = {}

	}

	public render(): JSX.Element {
		return <Head/>;
	}
}

export default App;
