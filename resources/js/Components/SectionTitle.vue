<template>
  <div class="bg-white">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
      <div class="text-center">
        <p
          class="mt-1 text-3xl font-extrabold text-gray-900 sm:text-3xl sm:tracking-tight lg:text-4xl"
        >
          <slot name="title"></slot>
        </p>
        <p class="max-w-3xl mt-5 mx-auto text-xl text-gray-500">
          <slot name="subtitle"></slot>
        </p>
      </div>
    </div>
  </div>
</template>