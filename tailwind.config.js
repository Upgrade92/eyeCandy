/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      w: {
        '64': '16rem',
        '80': '20rem',
    },
    colors: {
        eyecandy: '#2dd4bf',
    },
    fontSize: {
        xs: '0.6rem',
    },
    spinner: (theme) => ({
      default: {
        color: '#dae1e7', // color you want to make the spinner
        size: '1em', // size of the spinner (used for both width and height)
        border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
        speed: '500ms', // the speed at which the spinner should rotate
      }, 
    }),
  },
  variants: {},
  plugins: [
    require('tailwindcss-spinner')(),
  ],
  }
}
