import {fileURLToPath, URL} from 'url'
const path = require('path')
import {defineConfig} from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [vue()],
    build: {
        outDir: "public",
        emptyOutDir: false,
        cssCodeSplit: false,
        rollupOptions: {
            output: {
                entryFileNames: `assets/[name].js`,
                chunkFileNames: `assets/[name].js`,
                assetFileNames: `assets/[name].[ext]`
            }
        }
    },
    resolve: {
        alias: {
            '@': fileURLToPath(new URL('./vue_src', import.meta.url))
        }
    }
})
