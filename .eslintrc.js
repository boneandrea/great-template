module.exports = {
    root: true,
    extends: ['eslint:recommended'],

    rules: {
        eqeqeq: ['error', 'always'],
        'no-console': ['error', { allow: ['debug'] }],
        'padding-line-between-statements': ['error', { blankLine: 'always', prev: '*', next: 'return' }],
        'prefer-const': ['error'],
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
