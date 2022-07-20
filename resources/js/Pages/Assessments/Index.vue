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
                  <th class="dashboard-th text-left">Description</th>
                  <th class="dashboard-th text-left">Assement Type</th>
                  <th class="dashboard-th text-left">Created On</th>
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
                      <span class="font-normal"
                        >{{ evaluation.name }}</span
                      >
                    </div>
                  </th>
                  <td class="text-td">
                    <div>
                      {{ evaluation.description }}
                    </div>
                  </td>
                  <td class="text-td">
                    <div>{{ evaluation.type }}</div>
                  </td>
                  <td class="text-td">{{ evaluation.createdAt }}</td>
                  <td class="text-td">
                    <div
                      class="flex space-x-1 justify-center hover:cursor-pointer"
                    >
                      <div class="bg-gray-500 rounded-full w-1 h-1"></div>
                      <div class="bg-gray-500 rounded-full w-1 h-1"></div>
                      <div class="bg-gray-500 rounded-full w-1 h-1"></div>
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
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
  assessments: Object,
  evaluations: Object,
});
</script>