<template>
  <Authenticated>
    <Head title="Assessments" />
    <InternsNav />

    <section class="w-full lg:w-10/12 lg:items-center lg:mx-auto space-y-10">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-10">
        <div class="flex justify-between items-center my-4">
          <!-- Assement -->
          <div>
            <h1 class="text-veryDarkBlue text-3xl font-bold">{{ intern.name }}</h1>
          </div>
          <!-- Create button -->
          <div>
            <Link
              :href="route('assessments.create')"
              class="create-btn hidden lg:block"
              >Add Assessment</Link
            >
          </div>
        </div>

        <div
          class="
            flex flex-col
            lg:flex-row
            justify-between
            items-center
            space-x-0
            lg:space-x-5
            space-y-5
            lg:space-y-0
          "
        >
          <div
            v-for="(assessment, index) in assessments.data"
            :key="index"
            class="rounded-xl bg-white w-full lg:w-1/4 p-5"
          >
            <p class="text-gray-400 text-xs font-bold">{{ assessment.type }}</p>
            <p class="text-veryDarkBlue font-bold text-lg">
              <Link :href="route('assessments.show', assessment)">{{
                assessment.name
              }}</Link>
            </p>
            <p class="text-veryDarkBlue text-3xl">{{ assessment.count }}</p>
          </div>
        </div>

        <div class="bg-white rounded-xl w-full">
          <div class="w-full mt-6 flex flex-col space-y-6">
            <table class="items-center w-full bg-transparent border-collapse">
              <thead>
                <tr>
                  <th class="dashboard-th text-left">Title</th>
                  <th class="dashboard-th">Weight Percentage</th>
                  <th class="dashboard-th text-left">Assement Type</th>
                  <th class="dashboard-th text-left">Created On</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  class="border-b border-gray-200"
                >
                  <th class="text-td text-left">
                    <div class="flex items-center space-x-2">
                      <div class="rounded-full bg-gray-800"></div>
                      <span class="font-normal"
                        >{{ intern.name }}</span
                      >
                    </div>
                  </th>
                   <td class="text-td text-center">
                    <div>
                      {{ intern.name }}%
                    </div>
                  </td>
                  <td class="text-td">
                    <div>{{ intern.name }}</div>
                  </td>
                  <td class="text-td">{{ intern.name }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </Authenticated>
</template>

<script setup>
import Authenticated from "@/Layouts/Authenticated.vue";
import InternsNav from "@/Components/InternsNav.vue";
import EditTableRow from "@/Components/EditTableRow.vue";
import DeleteTableRow from "@/Components/DeleteTableRow.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";

const props = defineProps({
  assessments: Object,
  intern: Object,
});
</script>