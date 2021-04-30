<template>
  <app-layout>
    <template #header>
      <header-section>
        <template #title>
          Aριθμός εμβολιασμένων πολιτών κατά της
          <span class="text-red-600 inline">COVID-19</span>
        </template>
        <template #number>{{ totalVaccinations.toLocaleString() }}</template>
        <template #subtitle>
          Συνολικός αριθμός εμβολιασμένων πολιτών με τουλάχιστον 1 δόση του
          εμβολίου, μέχρι αυτη την στιγμή, στην Ελλαδα.
        </template>
        <template #lastUpdateRibbon> Τελευταία Ενημέρωση </template>
        <template #lastUpdateNumber>
          {{ new Date(lattestUpdateDatetime).toLocaleDateString("el-GR") }}
        </template>
      </header-section>
    </template>

    <main-stats>
      <template #title>
        Η πορεία του εμβολιασμού,
        <span class="block lg:inline"> με μια ματιά. </span>
      </template>
      <template #subtitle>
        Δείτε τα ποσοστά εμβολιασμένων πολιτών για όλες τις δόσεις του εμβολίου
      </template>
      <template #leftTitle>Εμβολιασμένοι πολίτες με την 1η δόση</template>
      <template #leftPercentage>
        {{ totalDose1VaccinationsPercentage }} %
      </template>
      <template #middleTitle>Εμβολιασμένοι πολίτες με την 2η δόση</template>
      <template #middlePercentage>
        {{ totalDose2VaccinationsPercentage }} %
      </template>
      <!-- <template #rightTitle>test2</template>
      <template #rightPercentage></template> -->
    </main-stats>
    <!-- <stats></stats>-->
    <stats :stats="stats"></stats>

    <!-- <section-title>
      <template #section> Section </template>
      <template #title> Take control of your team. </template>
      <template #subtitle>
        Start building for free, then add a site plan to go live. Account plans
        unlock additional features.
      </template>
    </section-title> -->

    <!-- <districts-table :districts="districts"></districts-table> -->

    <!-- <sponsors></sponsors>

    <project-information></project-information> -->
  </app-layout>
</template>

<script>
import { ref } from "vue";

import AppLayout from "./Layouts/AppLayout.vue";
import HeaderSection from "../Components/HeaderSection.vue";
import MainStats from "../Components/MainStats.vue";
import Stats from "../Components/Stats.vue";
import SectionTitle from "../Components/SectionTitle.vue";
import DistrictsTable from "../Components/DistrictsTable.vue";
import Sponsors from "../Components/Sponsors.vue";
import ProjectInformation from "../Components/ProjectInformation.vue";

const GREEK_POPULATION = 10720000;

export default {
  components: {
    AppLayout,
    HeaderSection,
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
    lattestTotalDailyVaccinations: {
      type: Number,
      required: true,
    },
    oneDayBeforeLattestTotalDailyVaccinations: {
      type: Number,
      required: true,
    },
    lattestUpdateDatetime: {
      type: String,
      required: true,
    },
  },

  setup(props) {
    const lastUpdated = new Date(
      props.lattestUpdateDatetime.slice(0, -9)
    ).toLocaleDateString("el-GR");

    const totalDose1VaccinationsPercentage = (
      (props.totalDose1Vaccinations / GREEK_POPULATION) *
      100
    ).toFixed(2);

    const totalDose2VaccinationsPercentage = (
      (props.totalDose2Vaccinations / GREEK_POPULATION) *
      100
    ).toFixed(2);

    const dailyVaccinationsChangePercentage = (
      ((props.lattestTotalDailyVaccinations -
        props.oneDayBeforeLattestTotalDailyVaccinations) /
        props.oneDayBeforeLattestTotalDailyVaccinations) *
      100
    ).toFixed(2);

    const stats = [
      {
        name: `Εμβολιασμοί την ${lastUpdated}`,
        stat: `${props.lattestTotalDailyVaccinations}`,
        previousStat: `${props.oneDayBeforeLattestTotalDailyVaccinations}`,
        change: `${dailyVaccinationsChangePercentage} %`,
        changeType: `${
          props.lattestTotalDailyVaccinations <
          props.oneDayBeforeLattestTotalDailyVaccinations
            ? "increase"
            : "decreace"
        }`,
      },
      {
        name: ``,
        stat: "58.16%",
        previousStat: "56.14%",
        change: "2.02%",
        changeType: "increase",
      },
      {
        name: "Avg. Click Rate",
        stat: "24.57%",
        previousStat: "28.62%",
        change: "4.05%",
        changeType: "decrease",
      },
    ];

    return {
      // lastUpdated,
      totalDose1VaccinationsPercentage,
      totalDose2VaccinationsPercentage,
      stats,
    };
  },
};
</script>