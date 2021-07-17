<template>
  <div class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24">
    <div class="text-center">
      <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
        <div>
          <span class="block xl:inline">
            <slot name="title"></slot>
          </span>
        </div>
        <div class="mt-5">
          <span class="block text-green-600 xl:inline">
            <slot name="number"></slot>
          </span>
        </div>
      </h1>
      <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
        <slot name="subtitle"></slot>
      </p>
      <div class="mt-3 max-w-md mx-auto md:mt-10 md:max-w-3xl inline-flex items-center text-white bg-white rounded-full p-1 pr-2 sm:text-base lg:text-sm xl:text-base">
        <span class="px-3 py-0.5 text-white text-xs font-semibold leading-5 uppercase tracking-wide bg-blue-500 rounded-full">
          <slot name="lastUpdateRibbon"></slot>
        </span>
        <span class="ml-4 text-sm text-gray-500">
          <slot name="lastUpdateNumber"></slot>
        </span>
        <CalendarIcon
          class="ml-2.5 w-5 h-5 text-gray-500"
          aria-hidden="true"
        />
      </div>
      <div>
        <p class="mt-1 max-w-md mx-auto text-xs text-gray-500 sm:text-xs md:mt-1 md:text-xs md:max-w-3xl">
          <slot name="updateFrequency"></slot>
        </p>
      </div>
    </div>
    <div class="flex justify-center justify-items-center mt-5">
      <div>
        <span class="text-xs text-gray-500">
          <slot name="dataSource"></slot>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
import { CalendarIcon } from "@heroicons/vue/solid";

export default {
  components: {
    CalendarIcon,
  },
};
</script>
