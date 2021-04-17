<template>
  <div class="text-center">
    <h1
      class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl"
    >
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
    <p
      class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl"
    >
      <slot name="subtitle"></slot>
    </p>
  </div>
</template>

<script>
export default {
  // props: {
  //   title: {
  //     type: String,
  //     required: true,
  //   },
  //   number: {
  //     type: String,
  //     required: true,
  //   },
  //   subtitle: {
  //     type: String,
  //     required: true,
  //   },
  // },
};
</script>