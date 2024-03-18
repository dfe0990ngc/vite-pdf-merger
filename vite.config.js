import { defineConfig } from 'vite'
import laravel, { refreshPaths } from 'laravel-vite-plugin';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
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
