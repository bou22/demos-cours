function setRandom(x) {
    return Math.random()* x
}

export function getRandom(){
    return `${Math.round(setRandom(100))}%`
}