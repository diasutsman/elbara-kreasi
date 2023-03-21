import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/app.js",
                "resources/js/categories.js",
                "resources/js/portfolios.js",
                "resources/js/products.js",
                "resources/css/app.css",
            ],
            refresh: true,
        }),
    ],
});
