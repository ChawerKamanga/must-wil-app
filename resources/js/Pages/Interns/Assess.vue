<template>
  <Authenticated>
    <Head title="Evaluation" />
    <InternsNav />

    <section class="w-full lg:w-10/12 lg:items-center lg:mx-auto space-y-10">
      <form
        @submit.prevent="submit"
        class="container w-full mx-auto px-5 py-5 flex flex-col space-y-10"
      >
        <div class="flex justify-between items-center my-4">
          <!-- Assement -->
          <div>
            <h1 class="text-veryDarkBlue text-3xl font-bold">
              {{ evaluation.name }}
            </h1>
          </div>
          <!-- Create button -->
          <div>
            <button type="submit" class="create-btn hidden lg:block">
              Submit Assessment
            </button>
          </div>
        </div>

        <div>
          <h1 class="text-veryDarkBlue text-lg font-bold">
            Intern: {{ intern.name }}
          </h1>
        </div>

        <div class="dashboard-grid">
          <div
            v-for="(question, index) in questions.data"
            :key="index"
            class="rounded-xl bg-white w-full p-5"
          >
            <p class="text-gray-400 text-xs font-bold">
              Question #{{ index + 1 }}
            </p>
            <p class="text-veryDarkBlue font-bold text-lg">
              <span>{{ question.question }}</span>
            </p>
            <p class="text-veryDarkBlue text-3xl">
              <input
                type="text"
                class="assement-form"
              />
              /
              {{ question.marks }}
            </p>
          </div>
        </div>
      </form>
    </section>
  </Authenticated>
</template>

<script setup>
import Authenticated from "@/Layouts/Authenticated.vue";
import InternsNav from "@/Components/InternsNav.vue";
import EditTableRow from "@/Components/EditTableRow.vue";
import DeleteTableRow from "@/Components/DeleteTableRow.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  evaluation: Object,
  questions: Object,
  intern: String,
});

const form = useForm({
  question_id: null,
  score: null,
  intern_id: props.intern.id,
});

let submit = () => {
  form.post(route("response.store"));
};
</script>

<style>
.form-input:active {
  border: none;
  outline: none;
}
</style>