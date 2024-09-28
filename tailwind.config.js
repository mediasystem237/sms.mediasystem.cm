module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'brand-blue': {
          DEFAULT: '#065a93',
          '50': '#f0f7fc',
          '100': '#e0eff8',
          '200': '#b9dcf0',
          '300': '#7dbce1',
          '400': '#3c9bd0',
          '500': '#1c7fb6',
          '600': '#065a93',
          '700': '#074e7e',
          '800': '#094267',
          '900': '#0b3957',
        },
        'brand-red': {
          DEFAULT: '#a00c0d',
          '50': '#fef2f2',
          '100': '#fde3e3',
          '200': '#fccccc',
          '300': '#f9a7a7',
          '400': '#f37374',
          '500': '#ea4344',
          '600': '#dc2627',
          '700': '#a00c0d',
          '800': '#8b1211',
          '900': '#771816',
        },
      },
    },
  },
  plugins: [],
}