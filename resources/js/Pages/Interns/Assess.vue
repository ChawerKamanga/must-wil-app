<template>
  <Authenticated>
    <Head title="Evaluation" />
    <InternsNav />

    <section class="w-full lg:w-10/12 lg:items-center lg:mx-auto space-y-10">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-10">
        <div class="flex justify-between items-center my-4">
          <!-- Assement -->
          <div>
            <h1 class="text-veryDarkBlue text-3xl font-bold">
              {{ evaluation.name }}
            </h1>
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

        <div>
            <h1 class="text-veryDarkBlue text-lg font-bold">Intern: {{ intern.name }}</h1>
        </div>

         <div
          class="
            dashboard-grid
          "
        >
          <div
            v-for="(question, index) in questions.data"
                    :key="index"
            class="rounded-xl bg-white w-full p-5"
          >
            <p class="text-gray-400 text-xs font-bold">Question #{{ index+1 }}</p>
            <p class="text-veryDarkBlue font-bold text-lg">
              <span>{{
                question.question 
              }}</span>
            </p>
            <p class="text-veryDarkBlue text-3xl">{{ question.marks }}</p>
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
  evaluation: Object,
  questions: Object,
  intern: String,
});
</script>