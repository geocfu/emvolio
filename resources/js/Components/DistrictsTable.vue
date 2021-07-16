<template>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h3 class="text-xl leading-6 font-medium text-gray-900 mt-10 mb-5">
      <slot name="information"></slot>
    </h3>
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    scope="col"
                    class="px-6 py-3 text-base font-medium text-gray-500 text-left uppercase tracking-wider"
                  >
                    Περιφερειακη Ενοτητα
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-base font-medium text-gray-500 text-center uppercase tracking-wider"
                  >
                    Συνολο εμβολιασμων
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-base font-medium text-gray-500 text-center uppercase tracking-wider"
                  >
                    Συνολο 1ης δοσης
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-base font-medium text-gray-500 text-center uppercase tracking-wider"
                  >
                    Συνολο 2ης δοσης
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(district, index) in districts"
                  :key="index"
                  :class="index % 2 === 0 ? 'bg-white' : 'bg-gray-50'"
                >
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-left text-gray-900">
                    {{ district.area }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                    {{ district.total_vaccinations.toLocaleString("el-GR") }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                    {{ district.total_dose_1.toLocaleString("el-GR") }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                    {{ district.total_dose_2.toLocaleString("el-GR") }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    districts: {
      type: Array,
      required: true,
    },
  },
};
</script>
