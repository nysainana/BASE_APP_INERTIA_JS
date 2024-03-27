import './bootstrap';
import '../css/app.css';
import './Icons/icons';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import Layout from "@/Layouts/Layout.vue";
import dayjs from 'dayjs';
import 'dayjs/locale/fr';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
dayjs.locale('fr');

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        let page = pages[`./Pages/${name}.vue`];
        page.default.layout = page.default.layout || Layout
        return page;
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el);
    },
    progress: {
        color: '#a11523'
    },
});
