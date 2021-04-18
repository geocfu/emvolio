<template>
  <app-layout>
    <main-header>
      <template #title>
        Aριθμός εμβολιασμένων πολιτών κατά τoυ
        <span class="block text-red-600 inline">SARS-cov-19</span>
      </template>
      <template #number>{{ totalVaccinations.toLocaleString() }}</template>
      <template #subtitle>
        *Συνολικός αριθμός εμβολιασμένων πολιτών με τουλάχιστον 1 δόση του
        εμβολίου, αυτη την στιγμή, στην Ελλαδα
      </template>
      <template #updateDate>
        H τελευταία ενημέρωση πραγματοποιήθηκε στις
        {{ lastUpdate }}
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
    <districts-table :districts="districts"></districts-table>
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
    districts: {
      type: Array,
      required: true,
    },
    totalVaccinations: {
      type: Number,
      required: true,
    },
    totalDose1Vaccinations: {
      type: Number,
      required: true,
    },
    totalDose2Vaccinations: {
      type: Number,
      required: true,
    },
    lastUpdate: {
      type: Object,
      required: true,
    },
  },
  setup(props) {
    const lastUpdate = new Date(props.lastUpdate.updated_at).toLocaleDateString(
      "el-GR"
    );

    return {
      lastUpdate,
    };
  },
};
</script>