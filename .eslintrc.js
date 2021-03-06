module.exports = {
  root: true,
  env: {
    node: true,
  },
  extends: [
    'plugin:vue/essential',
    '@vue/airbnb',
  ],
  rules: {
    'no-console': process.env.NODE_ENV === 'production' ? 'error' : 'off',
    'no-debugger': process.env.NODE_ENV === 'production' ? 'error' : 'off',
    'max-len': 'off', // disables line length check
    'indent': 'off',
    'no-console': 'off',
    'skipBlankLines': true,
    'ignoreComments': true,
  },
  parserOptions: {
    parser: 'babel-eslint',
  },
};
