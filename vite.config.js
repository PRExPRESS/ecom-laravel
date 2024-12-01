import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    build: {
        outDir: 'public/build',
        manifest: true,  
        rollupOptions: {
            input: {
                app: path.resolve(__dirname, 'resources/js/app.js'),
                css: path.resolve(__dirname, 'resources/css/app.css'),
                
            },
        },
    },
    server: {
        proxy: {
            '/app': 'http://localhost',
        },
        hmr: {
            // Specify the host if running Vite on a different domain
            host: 'localhost',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                
            ],
            refresh: [
                'resources/routes/**',
                'routes/**',
                'resources/views/**',
            ],
        }),
    ],
});
