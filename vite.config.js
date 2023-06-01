import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/app.js",
                "resources/css/app.css",
                "resources/css/product.css",
                'resources/css/filament.css',
            ],
            refresh: true,
        }),
    ],
});
