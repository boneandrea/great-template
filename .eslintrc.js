module.exports = {
    root: true,
    extends: ['eslint:recommended'],

    rules: {
        eqeqeq: ['error', 'always'],
        'no-console': ['error', { allow: ['debug'] }],
    },
    parserOptions: {
        ecmaVersion: 'latest',
    },
    env: {
        browser: true,
        es2021: true,
        node: true,
    },
}
