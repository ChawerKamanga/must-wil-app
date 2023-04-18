<template>
  <Authenticated>

    <Head title="Assessments" />
    <InternsNav />

    <section class="w-full lg:w-10/12 lg:items-center lg:mx-auto space-y-10">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-10">
        <div class="flex justify-between items-center my-4">
          <!-- Assement -->
          <div>
            <h1 class="text-veryDarkBlue text-3xl font-bold">
              {{ intern.name }}
            </h1>
          </div>
          <!-- Create button -->
          <div>
            <button @click="submit(intern.id)" class="create-btn hidden lg:block">Submit Results</button>
          </div>
        </div>

        <div v-if="$page.props.flash.message" class="bg-darkBlue text-white py-2 px-8 rounded-md font-bold">
          <Alert class="w-[800px] ">
            {{ $page.props.flash.message }}
          </Alert>
        </div>

        <div class="flex flex-col lg:flex-row justify-between items-center space-x-0 lg:space-x-5 space-y-5 lg:space-y-0">
          <div class="rounded-xl bg-white w-full lg:w-1/2 p-5">
            <p class="text-gray-400 text-xs font-bold">Questionnaire</p>
            <p class="text-veryDarkBlue font-bold text-lg">
              <Link :href="google">Intern Presantation Assed by Academic Supervisors</Link>
            </p>
            <p class="text-veryDarkBlue text-2xl">
              {{ presentation_score }}%
            </p>
          </div>

          <div class="rounded-xl bg-white w-full lg:w-1/2 p-5">
            <p class="text-gray-400 text-xs font-bold">Questionnaire</p>
            <p class="text-veryDarkBlue font-bold text-lg">
              <Link :href="google">Evaluation by Industrial Supervisor</Link>
            </p>
            <p class="text-veryDarkBlue text-2xl">
              {{ industrial_supervisor_score }}%
            </p>
          </div>

          <div class="rounded-xl bg-white w-full lg:w-1/2 p-5">
            <p class="text-gray-400 text-xs font-bold">Document</p>
            <p class="text-veryDarkBlue font-bold text-lg">
              <Link :href="google">Final Report by the Intern</Link>
            </p>
            <p class="text-veryDarkBlue text-2xl">
              <input type="text" class="w-12 focus:ring-0 border-t-0 border-l-0  border-r-0 border-b-2 border-darkBlue"
                v-model="form.report_score" />
              / 100
            </p>
          </div>

          <div class="rounded-xl bg-white w-full lg:w-1/2 p-5">
            <p class="text-gray-400 text-xs font-bold">Activities</p>
            <p class="text-veryDarkBlue font-bold text-lg">
              <Link :href="route('interns.activities', intern)">Activity Log</Link>
            </p>
            <p class="text-veryDarkBlue text-2xl">
              <input type="text" class="w-12 focus:ring-0 border-t-0 border-l-0  border-r-0 border-b-2 border-darkBlue"
                v-model="form.activity_log_score" />
              /100
            </p>
          </div>


        </div>

        <div class="bg-white rounded-xl w-full">
          <div class="w-full mt-6 flex flex-col space-y-6">
            <table class="items-center w-full bg-transparent border-collapse">
              <thead>
                <tr>
                  <th class="dashboard-th text-left">Name</th>
                  <th class="dashboard-th text-left">Final Score</th>
                  <th class="dashboard-th text-left">Activity Log</th>
                  <th class="dashboard-th text-left">Report</th>
                  <th class="dashboard-th text-left">Assessed On</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b border-gray-200">
                  <th class="text-td text-left">
                    <div class="flex items-center space-x-2">
                      <span class="font-normal">{{ intern.name }}</span>
                    </div>
                  </th>
                  <td class="text-td">
                    <div>{{ calculateAverage() }}</div>
                  </td>

                  <td class="text-td">
                    <Link :href="route('interns.activities', intern)" class="underline">See Activity Report</Link>
                  </td>
                  <td class="text-td">
                    <div class="flex space-x-5 hover:cursor-pointer">
                      <a :href="intern.report_url" class="space-x-2 flex" v-if="intern.report_url">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                          class="w-4 h-4 text-veryDarkBlue">
                          <path fill-rule="evenodd"
                            d="M12 2.25a.75.75 0 01.75.75v11.69l3.22-3.22a.75.75 0 111.06 1.06l-4.5 4.5a.75.75 0 01-1.06 0l-4.5-4.5a.75.75 0 111.06-1.06l3.22 3.22V3a.75.75 0 01.75-.75zm-9 13.5a.75.75 0 01.75.75v2.25a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5V16.5a.75.75 0 011.5 0v2.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V16.5a.75.75 0 01.75-.75z"
                            clip-rule="evenodd" />
                        </svg>
                        <span class="text-veryDarkBlue">Download</span>
                      </a>
                    </div>
                  </td>
                  <td class="text-td">{{ transformDateTime(intern.created_at) }}</td>
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
import { Link, Head, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  evaluations: Object,
  intern: Object,
  user_evaluation: Array,
  presentation_score: Number,
  industrial_supervisor_score: Number,
  report_score: Number,
  activity_score: Number
});

let report_score = props.report_score;
let activity_score = props.activity_score;
let industrial_supervisor_score = props.industrial_supervisor_score;
let presentation_score = props.presentation_score;

let form = useForm({
  report_score: report_score,
  activity_log_score: activity_score,
});

const calculateAverage = () => {
  const average = (+report_score + +activity_score + +industrial_supervisor_score + +presentation_score) / 4;
  return Math.round(average);
}

let submit = (id) => {
  form.post(route("activity_score.store", id));
};

let transformDateTime = (dateTimeString) => {
  const months = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];

  const dateTime = new Date(dateTimeString);
  const day = dateTime.getDate();
  const month = months[dateTime.getMonth()];
  const year = dateTime.getFullYear();
  const time = dateTime.toLocaleTimeString('en-US', { hour12: false });

  return `${day} ${month}, ${year} at ${time}`;
}

</script>
