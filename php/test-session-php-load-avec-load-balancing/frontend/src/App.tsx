import React, { useState } from "react";

export const App = () => {
    const [sessionData, setSessionData] = useState("");
    const [input, setInput] = useState();

    const saveData = async () => {
        await fetch(`http://localhost:5003/api/setSession.php?sessionData=${input}`, {
            method: "GET",
            mode: 'cors',
        }).catch(e => console.error(e))
    }

    const getData = async () => {
        await fetch("http://localhost:5003/api/test.php", {
            method: "GET",
            mode: 'cors',
        }).then(res => {
            return res.json()
        }).then(data => {
            setSessionData(JSON.stringify(data))
        }).catch(e => console.error(e))
    }

    return (
        <>
            <input value={input} onInput={(e: any) => setInput(e.target.value)} placeholder="enter session data" />
            <button onClick={saveData}>save session data</button>
            <button onClick={getData}>get session data</button>
            <div>{sessionData}</div>
        </>
    )
}
