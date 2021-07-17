<template>

  <Head>
    <title>
      {{ title }}
    </title>

    <meta
      head-key="description"
      name="description"
      :content="description"
    />

    <!-- OpenGraph metadata -->
    <meta
      head-key="og:url"
      property="og:url"
      :content="`${baseUrl}\\${ogUrl}`"
    />
    <meta
      head-key="og:title"
      property="og:title"
      :content="ogTitle"
    />
    <meta
      head-key="og:description"
      property="og:description"
      :content="ogDescription"
    />
    <meta
      head-key="og:image"
      property="og:image"
      :content="ogImage"
    />
    <meta
      head-key="og:type"
      property="og:type"
      content="website"
    />
    <meta
      head-key="og:locale"
      property="og:type"
      :content="ogLocale"
    />
    <!-- /OpenGraph metadata -->

    <!-- Twitter metadata -->
    <meta
      head-key="twitter:card"
      name="twitter:card"
      :content="twitterCard"
    />
    <meta
      head-key="twitter:site"
      name="twitter:site"
      content="@geocfu"
    />
    <meta
      head-key="twitter:creator"
      name="twitter:creator"
      content="@geocfu"
    />
    <!-- /Twitter metadata -->
  </Head>

</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Head,
  },

  props: {
    title: {
      type: String,
      required: true,
    },
    description: {
      type: String,
      default:
        "emvolio.org is a simple website for displaying the current vaccination status in Greece, against COVID-19. The data that the website is using are coming from the official source for Greece, which is the Greek Ministry of Health.",
    },
    ogUrl: {
      type: String,
      default: "",
    },
    ogTitle: {
      type: String,
      default: "emvolio.org - Greek COVID-19 Vaccination Tracker",
    },
    ogDescription: {
      type: String,
      default:
        "emvolio.org is a simple website for displaying the current vaccination status in Greece, against COVID-19. The data that the website is using are coming from the official source for Greece, which is the Greek Ministry of Health.",
    },
    ogImage: {
      type: String,
      default: "",
    },
    ogLocale: {
      type: String,
      default: "el_GR",
    },
    twitterCard: {
      type: String,
      default: "summary",
    },
  },

  setup(props) {
    const baseUrl = process.env.MIX_APP_URL;
    const ogImage = props.ogImage ?? `${baseUrl}/images/logo.png`;

    return {
      baseUrl,
      ogImage,
    };
  },
};
</script>
