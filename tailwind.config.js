/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
        backgroundImage: {
            'header-footer': 'linear-gradient(90deg, #6A0B0B, #A51111,#D01616)',
            'page': 'linear-gradient(180deg, #FFFFFF, #EB9C9C);'
        },
        keyframes: {
            'wobble': {
                '0%': { 'transform':'scaleY(0%)' },
                '80%': { 'transform':'scaleY(110%)' },
                '100%': { 'transform':'scaleY(100%)' }
            }
        }
    },
  },
  plugins: [],
}

