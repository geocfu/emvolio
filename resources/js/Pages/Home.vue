<template>
  <app-layout>
    <template #header>
      <header-section>
        <template #title>
          Aριθμός εμβολιασμένων πολιτών κατά του
          <span class="text-red-600 sm:inline md:block lg:inline"
            >COVID-19</span
          >
        </template>
        <template #number>{{
          totalDose1Vaccinations.toLocaleString("el-GR")
        }}</template>
        <template #subtitle>
          Συνολικός αριθμός εμβολιασμένων πολιτών με τουλάχιστον 1 δόση του
          εμβολίου, στην Ελλαδα.
        </template>
        <template #lastUpdateRibbon> Τελευταια Ενημερωση </template>
        <template #lastUpdateNumber>
          {{ new Date(lattestUpdateDatetime).toLocaleDateString("el-GR") }}
        </template>
        <template #dataSource>
          Πηγή: <a href="https://data.gov.gr" target="blank">data.gov.gr</a>
        </template>
      </header-section>
    </template>

    <main-stats>
      <template #title>
        Η πορεία του εμβολιασμού
        <span class="block lg:inline"> με μια ματιά </span>
      </template>
      <template #subtitle>
        Ποσοστά εμβολιασμών για την 1η και την 2η δόση του εμβολίου
      </template>

      <template #leftTitle>Συνολικό ποσοστό εμβολιασμών</template>
      <template #leftPercentage> {{ totalVaccinationsPercentage }} % </template>

      <template #middleTitle>Ποσοστό εμβολιασμών με την 1η δόση</template>
      <template #middlePercentage>
        {{ totalDose1VaccinationsPercentage }} %
      </template>

      <template #rightTitle>Ποσοστό εμβολιασμών με την 2η δόση</template>
      <template #rightPercentage>
        {{ totalDose2VaccinationsPercentage }} %</template
      >
    </main-stats>

    <simple-stats :stats="simpleStats"></simple-stats>

    <stats :stats="stats">
      <template #information>
        Στατιστικά δεδομένα για
        {{ new Date(lattestUpdateDatetime).toLocaleDateString("el-GR") }} σε
        σχέση με
        {{
          new Date(oneDayBeforelattestUpdateDatetime).toLocaleDateString(
            "el-GR"
          )
        }}
      </template>
    </stats>

    <districts-table :districts="districts">
      <template #information>
        Πρόοδος εμβολιασμού ανά Περιφερειακή Ενότητα
      </template>
    </districts-table>

    <section-title>
      <template #title> Χορηγοί </template>
      <template #subtitle>
        H κάλυψη των εξόδων της εφαρμογής, καλύπτεται αποκλειστικά, από τους
        παρακάτω χορηγούς.
      </template>
    </section-title>

    <sponsors :sponsors="sponsors"> </sponsors>

    <project-information>
      <template #title> Έργο Ανοιχτού Λογισμικού </template>
      <template #subtitle>
        Η παρούσα εφαρμογή, αποτελεί έργο ανοιχτού λογισμικού και ο κώδικάς της
        διανέμεται ελεύθερα στο Github. Σκοπός της εφαρμογής, δεν είναι η
        συλλογή εσόδων, αλλά, η ενημέρωση των πολιτών για την πορεία του
        εμβολιασμού κατά της λοίμωξης COVID-19, στην Ελλάδα.
      </template>
    </project-information>
  </app-layout>
</template>

<script>
import { computed } from "vue";

import AppLayout from "./Layouts/AppLayout.vue";
import HeaderSection from "../Components/HeaderSection.vue";
import MainStats from "../Components/MainStats.vue";
import Stats from "../Components/Stats.vue";
import SectionTitle from "../Components/SectionTitle.vue";
import DistrictsTable from "../Components/DistrictsTable.vue";
import Sponsors from "../Components/Sponsors.vue";
import ProjectInformation from "../Components/ProjectInformation.vue";
import SimpleStats from "../Components/SimpleStats.vue";

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
    SimpleStats,
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
    lattestTotalDose1DailyVaccinations: {
      type: Number,
      required: true,
    },
    oneDayBeforeLattestTotalDose1DailyVaccinations: {
      type: Number,
      required: true,
    },
    lattestTotalDose2DailyVaccinations: {
      type: Number,
      required: true,
    },
    oneDayBeforeLattestTotalDose2DailyVaccinations: {
      type: Number,
      required: true,
    },
    lattestUpdateDatetime: {
      type: String,
      required: true,
    },
    oneDayBeforelattestUpdateDatetime: {
      type: String,
      required: true,
    },
  },

  setup(props) {
    const totalVaccinationsPercentage = computed(() =>
      ((props.totalVaccinations / GREEK_POPULATION) * 100)
        .toFixed(2)
        .toLocaleString("el-GR")
    );

    const totalDose1VaccinationsPercentage = computed(() =>
      ((props.totalDose1Vaccinations / GREEK_POPULATION) * 100)
        .toFixed(2)
        .toLocaleString("el-GR")
    );

    const totalDose2VaccinationsPercentage = computed(() =>
      ((props.totalDose2Vaccinations / GREEK_POPULATION) * 100)
        .toFixed(2)
        .toLocaleString("el-GR")
    );

    const dailyTotalVaccinationsChangePercentage = computed(() =>
      props.oneDayBeforeLattestTotalDailyVaccinations !== 0
        ? (
            ((props.lattestTotalDailyVaccinations -
              props.oneDayBeforeLattestTotalDailyVaccinations) /
              props.oneDayBeforeLattestTotalDailyVaccinations) *
            100
          )
            .toFixed(2)
            .toLocaleString("el-GR")
        : "Ραγδαία Μεταβολή"
    );

    const dailyTotalDose1VaccinationsChangePercentage = computed(() =>
      props.oneDayBeforeLattestTotalDose1DailyVaccinations !== 0
        ? (
            ((props.lattestTotalDose1DailyVaccinations -
              props.oneDayBeforeLattestTotalDose1DailyVaccinations) /
              props.oneDayBeforeLattestTotalDose1DailyVaccinations) *
            100
          )
            .toFixed(2)
            .toLocaleString("el-GR")
        : "Ραγδαία Μεταβολή"
    );

    const dailyTotalDose2VaccinationsChangePercentage = computed(() =>
      props.oneDayBeforeLattestTotalDose2DailyVaccinations !== 0
        ? (
            ((props.lattestTotalDose2DailyVaccinations -
              props.oneDayBeforeLattestTotalDose2DailyVaccinations) /
              props.oneDayBeforeLattestTotalDose2DailyVaccinations) *
            100
          )
            .toFixed(2)
            .toLocaleString("el-GR")
        : "Ραγδαία Μεταβολή"
    );

    const simpleStats = [
      {
        name: "Αριθμός εμβολιασμών με την 1η & 2η δόση",
        stat: props.totalVaccinations.toLocaleString("el-GR"),
      },
      {
        name: "Αριθμός εμβολιασμών με την 1η δόση",
        stat: props.totalDose1Vaccinations.toLocaleString("el-GR"),
      },
      {
        name: "Αριθμός εμβολιασμών με την 2η δόση",
        stat: props.totalDose2Vaccinations.toLocaleString("el-GR"),
      },
    ];

    const stats = [
      {
        name: `Εμβολιασμοί 1ης & 2ης δόσης`,
        stat: props.lattestTotalDailyVaccinations.toLocaleString("el-GR"),
        previousStat: props.oneDayBeforeLattestTotalDailyVaccinations.toLocaleString(
          "el-GR"
        ),
        change: `${dailyTotalVaccinationsChangePercentage.value} %`,
        changeType: `${
          props.lattestTotalDailyVaccinations >
          props.oneDayBeforeLattestTotalDailyVaccinations
            ? "increase"
            : "decreace"
        }`,
      },
      {
        name: "Εμβολιασμοί 1ης δόσης",
        stat: props.lattestTotalDose1DailyVaccinations.toLocaleString("el-GR"),
        previousStat: props.oneDayBeforeLattestTotalDose1DailyVaccinations.toLocaleString(
          "el-GR"
        ),
        change: `${dailyTotalDose1VaccinationsChangePercentage.value} %`,
        changeType: `${
          props.lattestTotalDose1DailyVaccinations >
          props.oneDayBeforeLattestTotalDose1DailyVaccinations
            ? "increase"
            : "decreace"
        }`,
      },
      {
        name: "Εμβολιασμοί 2ης δόσης",
        stat: props.lattestTotalDose2DailyVaccinations.toLocaleString("el-GR"),
        previousStat: props.oneDayBeforeLattestTotalDose2DailyVaccinations.toLocaleString(
          "el-GR"
        ),
        change: `${dailyTotalDose2VaccinationsChangePercentage.value} %`,
        changeType: `${
          props.lattestTotalDose2DailyVaccinations >
          props.oneDayBeforeLattestTotalDose2DailyVaccinations
            ? "increase"
            : "decreace"
        }`,
      },
    ];

    const sponsors = [
      {
        name: "Pantherify.com",
        image: "../../images/panterify-logo.png",
        link: "https://pantherify.com/",
      },
      {
        name: "BiHELab",
        image: "../../images/bihelab-logo.png",
        link: " http://bihelab.di.ionio.gr/",
      },
    ];

    return {
      totalVaccinationsPercentage,
      totalDose1VaccinationsPercentage,
      totalDose2VaccinationsPercentage,
      stats,
      simpleStats,
      sponsors,
    };
  },
};
</script>
