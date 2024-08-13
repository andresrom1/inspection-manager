	import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    base: '/',
    	server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost'
        }
	},
	plugins: [
        vue({
            template: {
                compilerOptions: {
                    isCustomElement: (tag) => ['dc:format','dc:type','cc:license','dc.title','cc:Agent','dc:publisher','cc:Work','dc:title','cc:permits','cc:License','rdf:RDF'].includes(tag),
                }
            }
        }),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/basic.css',
                'resources/css/dropzone.css',
            ],
            refresh: true,
        }),
    ],
});
