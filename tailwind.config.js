/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.php', './includes/*.php', './js/*.js'],
  theme: {
    extend: {
      colors: {
        'zagreb-blue': '#0066CC',
        'e5': '#e50000',
        '0a0a0a': '#0a0a0a',
        '141414': '#141414',
      },
      fontFamily: {
        sans: ['"Nunito Sans"', 'sans-serif'],
        display: ['Oswald', 'sans-serif'],
      },
    },
  },
};
