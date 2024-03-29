/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}", "./**/*.{html,js,php}"],
  theme: {
    
    extend: {
      fontFamily: {
        'abang' : ['abang', 'sans-serif'],
      },
      colors: {
        "vertFonce" : "#687E5A",
        "vertClair" : "#94B381",
        "vertFondTexte" : "#D4DFCD",
        "marronFonce" : "#7E6C5E",
        "marronClair" : "#B3A193",
      },
      borderRadius: {
        'perso': '3rem',
      },
    },
    variants: {
      etends: {
        backgroundColor: ['active'],
      },
    },
  },
  plugins: [],
}

