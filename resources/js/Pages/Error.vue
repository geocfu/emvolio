<template>
  <SiteHead :title="title" />

  <ErrorSection
    :status="status"
    :title="title"
    :description="description"
  />
</template>

<script>
import { computed } from "vue";
import SiteHead from "../Components/SiteHead.vue";
import ErrorSection from "../Components/ErrorSection.vue";

export default {
  components: {
    SiteHead,
    ErrorSection,
  },

  props: {
    status: {
      type: Number,
      required: true,
    },
  },

  setup(props) {
    const title = computed(
      () =>
        ({
          503: "Η εφαρμογή δεν ειναι διαθέσιμη",
          500: "Ο διακομιστής αντιμετώπισε κάποιο πρόβλημα",
          404: "Η σελίδα δεν βρέθηκε",
          403: "Απαγορεύτηκε η πρόσβαση",
        }[props.status])
    );

    const description = computed(
      () =>
        ({
          503: "Λυπούμαστε, αυτή τη στιγμή πραγματοποιούμε αναβαθμίσεις στην εφαρμογή. Παρακαλούμε ελέγξτε ξανά σύντομα",
          500: "Λυπούμαστε, κάτι πήγε στραβά στο διακομιστή.",
          404: "Λυπούμαστε, δεν μπορέσαμε να βρούμε τη σελίδα που αναζητήσατε.",
          403: "Λυπούμαστε, απαγορεύεται η πρόσβαση σε αυτήν τη σελίδα.",
        }[props.status])
    );

    return {
      title,
      description,
    };
  },
};
</script>
