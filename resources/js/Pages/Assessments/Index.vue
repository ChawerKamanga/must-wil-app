<template>
  <Authenticated>
    <Head title="Assessments" />
    <AssessmentsNav />

    <section class="w-full lg:w-10/12 lg:items-center lg:mx-auto space-y-10">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-10">
        <div class="flex justify-between items-center my-4">
          <!-- Assement -->
          <div>
            <h1 class="text-veryDarkBlue text-3xl font-bold">Assements</h1>
          </div>
          <!-- Create button -->
          <div>
            <Link
              :href="route('evaluations.create')"
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
                  <th class="dashboard-th text-left">Due On</th>
                  <th class="dashboard-th">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  class="border-b border-gray-200"
                  v-for="evaluation in evaluations.data"
                  :key="evaluation.slug"
                >
                  <th class="text-td text-left">
                    <div class="flex items-center space-x-2">
                      <div class="rounded-full bg-gray-800"></div>
                      <Link
                        :href="route('evaluations.show', evaluation)"
                        class="font-normal"
                        >{{ evaluation.name }}</Link
                      >
                    </div>
                  </th>
                  <td class="text-td text-center">
                    <div>{{ evaluation.weight }}%</div>
                  </td>
                  <td class="text-td">
                    <div>{{ evaluation.type }}</div>
                  </td>
                  <td class="text-td">{{ evaluation.dueDate }}</td>
                  <td class="text-td">
                    <div
                      class="flex space-x-5 justify-center hover:cursor-pointer"
                    >
                      <a :href="evaluation.file_url" class="space-x-2 flex" v-if="evaluation.file_url">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          fill="currentColor"
                          class="w-4 h-4 text-veryDarkBlue"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M12 2.25a.75.75 0 01.75.75v11.69l3.22-3.22a.75.75 0 111.06 1.06l-4.5 4.5a.75.75 0 01-1.06 0l-4.5-4.5a.75.75 0 111.06-1.06l3.22 3.22V3a.75.75 0 01.75-.75zm-9 13.5a.75.75 0 01.75.75v2.25a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5V16.5a.75.75 0 011.5 0v2.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V16.5a.75.75 0 01.75-.75z"
                            clip-rule="evenodd"
                          />
                        </svg>
                       <span class="text-veryDarkBlue"> Download</span>
                      </a>
                      <EditTableRow
                        :href="route('evaluations.edit', evaluation.slug)"
                      />
                      <DeleteTableRow @click="destroy(evaluation)" />
                    </div>
                  </td>
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
import AssessmentsNav from "@/Components/AssessmentsNav.vue";
import EditTableRow from "@/Components/EditTableRow.vue";
import DeleteTableRow from "@/Components/DeleteTableRow.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";

const props = defineProps({
  assessments: Object,
  evaluations: Object,
});
</script>