import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `
                    @import "~bootstrap/scss/bootstrap";
                    @import "~bootstrap-icons/font/bootstrap-icons.scss";
                    @import "resources/scss/_variables.scss";
                `
            }
        }
    },
    resolve: {
        alias: {
            '~bootstrap': path.resolve(new URL('./node_modules/bootstrap', import.meta.url).pathname),
            '~bootstrap-icons': path.resolve(new URL('./node_modules/bootstrap-icons', import.meta.url).pathname),
            'bootstrap-icons': path.resolve(new URL('./node_modules/bootstrap-icons', import.meta.url).pathname, 'font/fonts/bootstrap-icons.woff2?v=1.5.0'),
            'chart.js': path.resolve(new URL('./node_modules/chart.js', import.meta.url).pathname),
        }
    }
});
