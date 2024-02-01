import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/scss/main.scss",
                "resources/js/app.js",
                "resources/js/company/status.js",
                "resources/js/custom.js",
            ],
            refresh: true,
        }),
    ],
});
