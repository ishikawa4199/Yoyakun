/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/**/*.blade.php",
    



  ],
  theme: {
    extend: {
      backgroundImage: {
        'main': "url('img/main.jpg')",
    
      }

    },
  },
  plugins: [],

}


