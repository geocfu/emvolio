<template>
  <div class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-2 gap-8">
        <!-- md:grid-cols-6 lg:grid-cols-5 -->
        <div
          class="col-span-1 flex justify-center"
          v-for="sponsor in sponsors"
          :key="sponsor.name"
        >
          <!-- md:col-span-2 lg:col-span-1 -->
          <a :href="sponsor.link" target="blank">
            <img class="h-32" :src="sponsor.image" :alt="sponsor.name" />
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    sponsors: {
      type: Array,
      required: true,
    },
  },
};
</script>