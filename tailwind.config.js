module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
    screens: {
      'sm': '599px',
      // => @media (min-width: 599px) { ... }

      'md': '1023px',
      // => @media (min-width: 1023px) { ... }

      'lg': '1920px',
      // => @media (min-width: 1920px) { ... }
    },
    // spacing: {
    //   sm: '16px',
    //   md: '24px',
    //   lg: '24px',
    // }
  },
  plugins: [],
}
