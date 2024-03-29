/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}", "./**/*.{html,js,php}"],
  theme: {
    
    extend: {
      fontFamily: {
        'abang' : ['Abang', 'Arial'],
      },
      colors: {
        "vertFonce" : "#687E5A",
        "vertClair" : "#94B381",
        "marronFonce" : "#7E6C5E",
        "marronClair" : "#B3A193",
      }
    },
    variants: {
      etends: {
        backgroundColor: ['active'],
      },
    },
  },
  plugins: [],
}

