import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import { readdirSync } from "fs";
import { join } from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                // "resources/js/app.js",
                ...readdirSync("resources/js", {
                    recursive: true,
                    withFileTypes: true,
                })
                    .filter((file) => file.isFile())
                    .map((file) => join(file.parentPath, file.name)),
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
