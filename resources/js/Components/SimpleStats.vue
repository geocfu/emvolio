<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h3 class="text-xl leading-6 font-medium text-gray-900">
      Συνολικά στατιστικά δεδομένα
    </h3>
    <dl
      class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow divide-y divide-gray-200 md:grid-cols-3 md:divide-y-0 md:divide-x"
    >
      <div v-for="item in stats" :key="item.name" class="px-4 py-5 sm:p-6">
        <dt class="text-base font-normal text-gray-900">
          {{ item.name }}
        </dt>
        <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
          <div class="flex items-baseline text-2xl font-semibold text-blue-600">
            {{ item.stat }}
          </div>
        </dd>
      </div>
    </dl>
  </div>
  <div></div>
</template>

<script>
export default {
  props: {
    stats: {
      type: Array,
      required: true,
    },
  },
};
</script>
