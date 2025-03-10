import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import { readdirSync } from "fs";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                ...readdirSync("resources/js/pages").map(
                    (file) => `resources/js/pages/${file}`
                ),
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
