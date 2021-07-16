require('./bootstrap');

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

createInertiaApp({
  title: title => title ? `${title} - emvolio.org` : `emvolio.org`,
  resolve: name => require(`./Pages/${name}`).default,
  setup({ el, app, props, plugin }) {
    createApp({ render: () => h(app, props) })
      .use(plugin)
      .mount(el)
  },
})

InertiaProgress.init({ color: '#10B981' })
