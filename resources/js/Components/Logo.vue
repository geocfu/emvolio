<template>
  <span class="sr-only">
    {{ appName }}
  </span>

  <img
    :class="[height, 'w-auto']"
    src="../../images/logo.png"
    alt=""
  />
</template>

<script>
export default {
  props: {
    height: {
      type: String,
      default: "h-16",
    },
  },

  setup() {
    const appName = process.env.MIX_APP_NAME;

    return {
      appName,
    };
  },
};
</script>
