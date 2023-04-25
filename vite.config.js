import { defineConfig, loadEnv } from "vite";
import react from "@vitejs/plugin-react";
import laravel from "laravel-vite-plugin";
import fs from "fs";

export default defineConfig(({ command, mode }) => {
    const env = loadEnv(mode, process.cwd(), "");

    return {
        plugins: [
            react(),
            laravel({
                input: ["resources/css/app.css", "resources/js/app.js"],
                refresh: true,
            }),
        ],
        define: {
            APP_ENV: {
                APP_URL: env.APP_URL,
            },
        },
        // server: {
        //     host: env.SERVER_HOST,
        //     port: 5173,
        //     https: {
        //         key: fs.readFileSync(env.SERVER_HTTPS_KEY),
        //         cert: fs.readFileSync(env.SERVER_HTTPS_CERT),
        //     },
        // },
    };
});
