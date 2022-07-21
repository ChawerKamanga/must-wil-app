<template>
  <Authenticated>
    <Head title="Evaluation" />
    <AssessmentsNav />

    <section class="w-full lg:w-10/12 lg:items-center lg:mx-auto space-y-10">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-10">
        <div class="flex justify-between items-center my-4">
          <!-- Assement -->
          <div>
            <h1 class="text-veryDarkBlue text-3xl font-bold">{{ evaluation.name }}</h1>
          </div>
          <!-- Create button -->
          <div>
            <Link
              :href="route('assessments.create')"
              class="create-btn hidden lg:block"
              >Add Question</Link
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
        <div class="bg-white rounded-xl w-full">
          <div class="w-full mt-6 flex flex-col space-y-6">
            <table class="items-center w-full bg-transparent border-collapse">
              <thead>
                <tr>
                  <th class="dashboard-th text-left">Question</th>
                  <th class="dashboard-th">Maximum Marks</th>
                  <th class="dashboard-th text-left">Created On</th>
                  <th class="dashboard-th">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  class="border-b border-gray-200"
                  v-for="question in questions.data"
                  :key="question.slug"
                >
                  <th class="text-td text-left">
                    <div>
                      {{ question.question }}%
                    </div>
                  </th>
                   <td class="text-td text-center">
                    <div>
                      {{ question.marks }}%
                    </div>
                  </td>
                  <td class="text-td">{{ question.createdAt }}</td>
                  <td class="text-td">
                    <div
                      class="
                        flex
                        space-x-5
                        justify-center
                        hover:cursor-pointer
                      "
                    >
                      <EditTableRow :href="route('questions.edit', question.slug)" />
                      <DeleteTableRow @click="destroy(question)" />
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
  evaluation: Object,
  questions: Object,
});
</script>