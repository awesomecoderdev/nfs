import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";

export default defineConfig({
    server: {
        host: "nfs.one",
        hmr: { host: "nfs.one" },
    },
    plugins: [
        laravel({
            input: ["resources/js/app.js"],
            refresh: true,
            valetTls: "nfs.one",
        }),
        react({ fastRefresh: false }),
    ],
    worker: {
        plugins: [react()],
    },
});
