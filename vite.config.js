import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/event-tracking.js',
                //  https://github.com/paulirish/lite-youtube-embed
                'node_modules/lite-youtube-embed/src/lite-yt-embed.js',
                'node_modules/lite-youtube-embed/src/lite-yt-embed.css',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        cors: true,
    },
});
