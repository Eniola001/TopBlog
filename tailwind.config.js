/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        // darkgray: "#414141"
      },
      fontFamily: {
        "gupter": ["Gupter", "sans-serif"],
        "raleway": ["Raleway", "sans-serif"],
        "crimson": ["Crimson Text", "sans-serif"],
        "roboto": ["Roboto", "sans-serif"],
      },
      fontSize: {
        "xmd": "1.025rem", // 18x
        "xxl": "1.625rem", // 26px
        "2xxl": "2rem" // 32px
      },
      width: {
        '30%': '30%',
        '45%': '45%', // Custom width class
        '70%': '70%', // Custom width class
        '75%': '75%', // Custom width class
        '80%': '80%', // Custom width class
        '90%': '90%', // Custom width class
        '75': '18.75rem', // 300px
      },
      height: {
        '50': '50%',
        '75': '18.75rem', // 300px
        '80': '20rem', // 320px
        '150': '42.5rem', // 680px
        '175': '45rem' // 720px
      },
    },
  },
  plugins: [],
}