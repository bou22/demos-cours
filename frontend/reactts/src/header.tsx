import React, { Component } from "react"

class Head extends Component {
	constructor(props: {}) {
		super(props)
		this.state = {}

	}

	public render(): JSX.Element {
		return <h1>Hello from React, Typescript and Webpack</h1>;
	}
}

export default Head;
