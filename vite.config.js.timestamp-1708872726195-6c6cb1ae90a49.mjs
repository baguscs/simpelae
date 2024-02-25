// vite.config.js
import { defineConfig } from "file:///F:/Laravel/simpelae/node_modules/vite/dist/node/index.js";
import laravel from "file:///F:/Laravel/simpelae/node_modules/laravel-vite-plugin/dist/index.mjs";
import vue from "file:///F:/Laravel/simpelae/node_modules/@vitejs/plugin-vue/dist/index.mjs";
var vite_config_default = defineConfig({
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
        "resources/js/app.js"
      ],
      ssr: "resources/js/ssr.js",
      refresh: true
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false
        }
      }
    })
  ],
  ssr: {
    noExternal: ["vue", "@protonemedia/laravel-splade"]
  }
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJGOlxcXFxMYXJhdmVsXFxcXHNpbXBlbGFlXCI7Y29uc3QgX192aXRlX2luamVjdGVkX29yaWdpbmFsX2ZpbGVuYW1lID0gXCJGOlxcXFxMYXJhdmVsXFxcXHNpbXBlbGFlXFxcXHZpdGUuY29uZmlnLmpzXCI7Y29uc3QgX192aXRlX2luamVjdGVkX29yaWdpbmFsX2ltcG9ydF9tZXRhX3VybCA9IFwiZmlsZTovLy9GOi9MYXJhdmVsL3NpbXBlbGFlL3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSBcInZpdGVcIjtcbmltcG9ydCBsYXJhdmVsIGZyb20gXCJsYXJhdmVsLXZpdGUtcGx1Z2luXCI7XG5pbXBvcnQgdnVlIGZyb20gXCJAdml0ZWpzL3BsdWdpbi12dWVcIjtcblxuZXhwb3J0IGRlZmF1bHQgZGVmaW5lQ29uZmlnKHtcbiAgICBwbHVnaW5zOiBbXG4gICAgICAgIGxhcmF2ZWwoe1xuICAgICAgICAgICAgaW5wdXQ6IFtcbiAgICAgICAgICAgICAgICBcInJlc291cmNlcy9hc3NldHMvdmVuZG9yL2ZvbnRzL2JveGljb25zLmNzc1wiLFxuICAgICAgICAgICAgICAgIFwicmVzb3VyY2VzL2Fzc2V0cy92ZW5kb3IvY3NzL2NvcmUuY3NzXCIsXG4gICAgICAgICAgICAgICAgXCJyZXNvdXJjZXMvYXNzZXRzL3ZlbmRvci9jc3MvdGhlbWUtZGVmYXVsdC5jc3NcIixcbiAgICAgICAgICAgICAgICBcInJlc291cmNlcy9hc3NldHMvY3NzL2RlbW8uY3NzXCIsXG4gICAgICAgICAgICAgICAgXCJyZXNvdXJjZXMvYXNzZXRzL3ZlbmRvci9saWJzL3BlcmZlY3Qtc2Nyb2xsYmFyL3BlcmZlY3Qtc2Nyb2xsYmFyLmNzc1wiLFxuICAgICAgICAgICAgICAgIFwicmVzb3VyY2VzL2Fzc2V0cy92ZW5kb3IvbGlicy9hcGV4LWNoYXJ0cy9hcGV4LWNoYXJ0cy5jc3NcIixcbiAgICAgICAgICAgICAgICBcInJlc291cmNlcy9hc3NldHMvdmVuZG9yL2Nzcy9wYWdlcy9wYWdlLWF1dGguY3NzXCIsXG4gICAgICAgICAgICAgICAgXCJyZXNvdXJjZXMvYXNzZXRzL3ZlbmRvci9saWJzL2pxdWVyeS9qcXVlcnkuanNcIixcbiAgICAgICAgICAgICAgICBcInJlc291cmNlcy9hc3NldHMvdmVuZG9yL2xpYnMvcG9wcGVyL3BvcHBlci5qc1wiLFxuICAgICAgICAgICAgICAgIFwicmVzb3VyY2VzL2Fzc2V0cy92ZW5kb3IvanMvYm9vdHN0cmFwLmpzXCIsXG4gICAgICAgICAgICAgICAgXCJyZXNvdXJjZXMvYXNzZXRzL3ZlbmRvci9saWJzL3BlcmZlY3Qtc2Nyb2xsYmFyL3BlcmZlY3Qtc2Nyb2xsYmFyLmpzXCIsXG4gICAgICAgICAgICAgICAgXCJyZXNvdXJjZXMvYXNzZXRzL3ZlbmRvci9qcy9tZW51LmpzXCIsXG4gICAgICAgICAgICAgICAgXCJyZXNvdXJjZXMvYXNzZXRzL2pzL2Rhc2hib2FyZHMtYW5hbHl0aWNzLmpzXCIsXG4gICAgICAgICAgICAgICAgXCJyZXNvdXJjZXMvYXNzZXRzL2pzL21haW4uanNcIixcbiAgICAgICAgICAgICAgICBcInJlc291cmNlcy9hc3NldHMvdmVuZG9yL2xpYnMvYXBleC1jaGFydHMvYXBleGNoYXJ0cy5qc1wiLFxuICAgICAgICAgICAgICAgIFwicHVibGljL3N3LmpzXCIsXG4gICAgICAgICAgICAgICAgXCJyZXNvdXJjZXMvanMvYXBwLmpzXCIsXG4gICAgICAgICAgICBdLFxuICAgICAgICAgICAgc3NyOiBcInJlc291cmNlcy9qcy9zc3IuanNcIixcbiAgICAgICAgICAgIHJlZnJlc2g6IHRydWUsXG4gICAgICAgIH0pLFxuICAgICAgICB2dWUoe1xuICAgICAgICAgICAgdGVtcGxhdGU6IHtcbiAgICAgICAgICAgICAgICB0cmFuc2Zvcm1Bc3NldFVybHM6IHtcbiAgICAgICAgICAgICAgICAgICAgYmFzZTogbnVsbCxcbiAgICAgICAgICAgICAgICAgICAgaW5jbHVkZUFic29sdXRlOiBmYWxzZSxcbiAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgfSxcbiAgICAgICAgfSksXG4gICAgXSxcbiAgICBzc3I6IHtcbiAgICAgICAgbm9FeHRlcm5hbDogW1widnVlXCIsIFwiQHByb3RvbmVtZWRpYS9sYXJhdmVsLXNwbGFkZVwiXSxcbiAgICB9LFxufSk7XG4iXSwKICAibWFwcGluZ3MiOiAiO0FBQWlQLFNBQVMsb0JBQW9CO0FBQzlRLE9BQU8sYUFBYTtBQUNwQixPQUFPLFNBQVM7QUFFaEIsSUFBTyxzQkFBUSxhQUFhO0FBQUEsRUFDeEIsU0FBUztBQUFBLElBQ0wsUUFBUTtBQUFBLE1BQ0osT0FBTztBQUFBLFFBQ0g7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsTUFDSjtBQUFBLE1BQ0EsS0FBSztBQUFBLE1BQ0wsU0FBUztBQUFBLElBQ2IsQ0FBQztBQUFBLElBQ0QsSUFBSTtBQUFBLE1BQ0EsVUFBVTtBQUFBLFFBQ04sb0JBQW9CO0FBQUEsVUFDaEIsTUFBTTtBQUFBLFVBQ04saUJBQWlCO0FBQUEsUUFDckI7QUFBQSxNQUNKO0FBQUEsSUFDSixDQUFDO0FBQUEsRUFDTDtBQUFBLEVBQ0EsS0FBSztBQUFBLElBQ0QsWUFBWSxDQUFDLE9BQU8sOEJBQThCO0FBQUEsRUFDdEQ7QUFDSixDQUFDOyIsCiAgIm5hbWVzIjogW10KfQo=
