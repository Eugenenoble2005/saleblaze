import LoadScript from "vue-plugin-load-script";

require('./bootstrap');
import { createApp, h } from 'vue'
import {createInertiaApp, Link} from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin,LoadScript)
            .component("Link",Link)
            .mount(el)
    },
})
//inertia progress
InertiaProgress.init({
    showSpinner:true,
    color:"#FFA500"
});
