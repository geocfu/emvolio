<template>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <h3 class="text-xl leading-6 font-medium text-gray-900 mt-10">
      <slot name="information"></slot>
    </h3>
    <dl class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow divide-y divide-gray-200 md:grid-cols-3 md:divide-y-0 md:divide-x mb-5">
      <div
        v-for="item in stats"
        :key="item.name"
        class="px-4 py-5 sm:p-6"
      >
        <dt class="text-base font-normal text-gray-900">
          {{ item.name }}
        </dt>
        <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
          <div class="flex items-baseline text-2xl font-semibold text-blue-600">
            {{ item.stat }}
            <span class="ml-2 text-sm font-medium text-gray-500">
              από {{ item.previousStat }}
            </span>
          </div>

          <div :class="[
              item.changeType === 'increase'
                ? 'bg-green-100 text-green-800'
                : 'bg-red-100 text-red-800',
              'inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium md:mt-2 lg:mt-0',
            ]">
            <ArrowSmUpIcon
              v-if="item.changeType === 'increase'"
              class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500"
              aria-hidden="true"
            />
            <ArrowSmDownIcon
              v-else
              class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-red-500"
              aria-hidden="true"
            />
            <span class="sr-only">
              {{ item.changeType === "increase" ? "Increased" : "Decreased" }}
              by
            </span>
            {{ item.change }}
          </div>
        </dd>
      </div>
    </dl>
  </div>
</template>

<script>
import { ArrowSmDownIcon, ArrowSmUpIcon } from "@heroicons/vue/solid";

export default {
  components: {
    ArrowSmDownIcon,
    ArrowSmUpIcon,
  },

  props: {
    stats: {
      type: Array,
      required: true,
    },
  },
};
</script>
