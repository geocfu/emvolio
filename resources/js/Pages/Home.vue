<template>
  <app-layout>
    <main-header>
      <template #title>
        Συνολικός αριθμός εμβολιασμένων πολιτών κατά τoυ covid-19 έως σήμερα
        στην Ελλάδα
      </template>
      <template #number>770.207</template>
      <template #subtitle>
        Συνολικός αριθμός εμβολιασμένων πολιτών και με τις 2 δόσεις του εμβολίου
      </template>
    </main-header>
    <main-stats></main-stats>
    <stats></stats>
    <stats></stats>
    <section-title>
      <template #section> Section </template>
      <template #title> Take control of your team. </template>
      <template #subtitle>
        Start building for free, then add a site plan to go live. Account plans
        unlock additional features.
      </template>
    </section-title>
    <districts-table></districts-table>
    <sponsors></sponsors>
    <project-information></project-information>
  </app-layout>
</template>

<script>
import AppLayout from "./Layouts/AppLayout.vue";
import MainHeader from "../Components/MainHeader.vue";
import MainStats from "../Components/MainStats.vue";
import Stats from "../Components/Stats.vue";
import SectionTitle from "../Components/SectionTitle.vue";
import DistrictsTable from "../Components/DistrictsTable.vue";
import Sponsors from "../Components/Sponsors.vue";
import ProjectInformation from "../Components/ProjectInformation.vue";

export default {
  components: {
    AppLayout,
    MainHeader,
    MainStats,
    Stats,
    SectionTitle,
    DistrictsTable,
    Sponsors,
    ProjectInformation,
  },

  props: {
    vaccinatedPopulation: {
      type: String,
      // required: true
    },
  },
  setup() {},
};
</script>