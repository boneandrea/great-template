'use strict'

/* eslint-disable */
const q = (s, root) => {
    if (root) {
        return root.querySelector(s)
    }
    return document.querySelector(s)
}
const qa = (s, root) => {
    if (root) {
        return root.querySelectorAll(s)
    }
    return document.querySelectorAll(s)
}

const qaa = (s, root) => {
    return [...qa(s, root)]
}

/* eslint-enable */
q('h1 span').addEventListener('click', () => {
    alert('helo')
})
