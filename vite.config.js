import { defineConfig } from 'vite'
// import vue from '@vitejs/plugin-vue'
import laravel from 'laravel-vite-plugin';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    // vue(),
    laravel({
        input: [
            'resources/css/app.css',
            'resources/css/dropzone.css',
            'resources/js/app.js',
            'resources/js/home.js',
            'resources/js/contact_us.js',
        ],
        refresh: true,
    }),
  ],
})
