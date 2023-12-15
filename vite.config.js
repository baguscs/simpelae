import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/assets/vendor/fonts/boxicons.css",
                "resources/assets/vendor/css/core.css",
                "resources/assets/vendor/css/theme-default.css",
                "resources/assets/css/demo.css",
                "resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css",
                "resources/assets/vendor/libs/apex-charts/apex-charts.css",
                "resources/assets/vendor/css/pages/page-auth.css",
                "resources/assets/vendor/libs/jquery/jquery.js",
                "resources/assets/vendor/libs/popper/popper.js",
                "resources/assets/vendor/js/bootstrap.js",
                "resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js",
                "resources/assets/vendor/js/menu.js",
                "resources/assets/js/dashboards-analytics.js",
                "resources/assets/js/main.js",
                "resources/assets/vendor/libs/apex-charts/apexcharts.js",
                "public/sw.js",
                "resources/js/app.js",
            ],
            ssr: "resources/js/ssr.js",
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    ssr: {
        noExternal: ["vue", "@protonemedia/laravel-splade"],
    },
});
