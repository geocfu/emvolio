require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

const appName = process.env.MIX_APP_NAME;

createInertiaApp({
  title: title => title ? `${title} - ${appName}` : `${appName}`,
  resolve: name => require(`./Pages/${name}`).default,
  setup({ el, app, props, plugin }) {
    createApp({ render: () => h(app, props) })
      .use(plugin)
      .mount(el)
  },
});

InertiaProgress.init({ color: '#10B981' });
