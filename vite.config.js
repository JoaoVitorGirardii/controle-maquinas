import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/cadastros.css',
                    'resources/css/login.css', 
                    'resources/css/padrao.css', 
                    'resources/css/navbar.css', 
                    'resources/css/home.css', 
                    'resources/css/consultas.css', 
                    'resources/css/servico.css', 
                    
                    'resources/js/contents.js',
                    'resources/js/consultas.js',
                   ],
            refresh: true,
        }),
    ],
});
