<template>
  <Authenticated>

    <Head title="Dashboard" />
    <ActivityLogNav />

    <!-- Main Content -->
    <div class="flex flex-col w-8/12 items-center mx-auto">
      <div class="flex w-full space-x-6">
        <div class="rounded-xl w-full mt-5 space-y-6">
          <div class="w-full mt-2 flex flex-col space-y-6 bg-white pb-5 rounded-xl">
            <!-- Dark Blue Banner -->
            <div class="
                                                                                                relative
                                                                                                flex
                                                                                                justify-between
                                                                                                w-11/12
                                                                                                mx-auto
                                                                                                mt-5
                                                                                                bg-darkBlue
                                                                                                rounded-lg
                                                                                              ">
              <!-- Assessment Progress Text -->
              <div class="flex flex-col h-[300px] justify-center ml-10">
                <div>
                  <h1 class="text-4xl font-bold text-white">
                    Your internship activity log 😉
                  </h1>
                </div>
                <div class="mt-3">
                  <h1 class="text-sm text-gray-200">
                    You are allocated to do your internship at FDH Bank in
                    Blantyre
                  </h1>
                </div>
                <div class="mt-10 flex space-x-10">
                  <div class="flex">
                    <div class="
                                                                                                        bg-[#fbc345]
                                                                                                        border border-gray-300
                                                                                                        rounded-full
                                                                                                        w-12
                                                                                                        h-12
                                                                                                        flex
                                                                                                        justify-center
                                                                                                        items-center
                                                                                                        mr-3
                                                                                                      ">
                      <svg xmlns="http://www.w3.org/2000/svg" class="menu-icon text-white group-hover:text-darkBlue"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path
                          d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                      </svg>
                    </div>

                    <div class="flex flex-col text-white">
                      <h5 class="font-bold text-lg">Activities</h5>
                      <span class="-mt-1 text-sm">5</span>
                    </div>
                  </div>

                  <div class="flex">
                    <div class="
                                                                                                        bg-[#ef6f59]
                                                                                                        border border-gray-300
                                                                                                        rounded-full
                                                                                                        w-12
                                                                                                        h-12
                                                                                                        flex
                                                                                                        justify-center
                                                                                                        items-center
                                                                                                        mr-3
                                                                                                      ">
                      <svg xmlns="http://www.w3.org/2000/svg" class="menu-icon text-white group-hover:text-darkBlue"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path
                          d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                      </svg>
                    </div>

                    <div class="flex flex-col text-white">
                      <h5 class="font-bold text-lg">Industrial Supervisor</h5>
                      <span class="-mt-1 text-sm">John Mwale</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Doc img -->
              <div class="flex flex-col h-[220px] p-10">
                <img src="/images/05-removebg-preview.png" class="w-80" alt="doc image" />
              </div>
            </div>

            <div></div>
          </div>


          <div class="w-full">
            <div class="w-full mt-1 flex flex-col space-y-6">
              <div class="px-10">
                <div class="flex items-center w-full" v-bind:class="{ 'justify-center': !showForm }">
                  <div v-if="showForm">
                    <div class="max-w-2xl mx-auto">
                      <h2 class="text-lg font-bold mb-4">Weekly Report Form</h2>
                      <form class="w-full" @submit.prevent="submit" method="post">
                        <div class="mb-4 w-full">
                          <label class="block text-gray-700 font-bold mb-2" for="week-number">
                            Week Number
                          </label>
                          <input class="form-input w-full" type="number" id="week-number" name="week-number"
                            v-model="form.week_number" placeholder="Enter week number">
                          <div v-if="errors.week_number" class="text-sm text-red-500">
                            {{ errors.week_number }}
                          </div>
                        </div>
                        <div class="mb-4 md:flex md:justify-between">
                          <div class="mb-4 md:mr-2">
                            <label class="block text-gray-700 font-bold mb-2" for="from-date">
                              From (Date)
                            </label>
                            <input class="form-input w-full" type="date" id="from-date" name="from-date"
                              v-model="form.from_date" placeholder="Select date">
                            <div v-if="errors.from_date" class="text-sm text-red-500">
                              {{ errors.from_date }}
                            </div>
                          </div>
                          <div class="mb-4 md:mr-2">
                            <label class="block text-gray-700 font-bold mb-2" for="to-date">
                              To (Date)
                            </label>
                            <input class="form-input w-full" type="date" id="to-date" name="to-date"
                              v-model="form.to_date" placeholder="Select date">
                            <div v-if="errors.to_date" class="text-sm text-red-500">
                              {{ errors.to_date }}
                            </div>
                          </div>

                        </div>
                        <div class="mb-4 md:flex md:justify-between">
                          <div class="mb-4 md:mr-2">
                            <label class="block text-gray-700 font-bold mb-2" for="days-present">
                              Number of Days Present
                            </label>
                            <input class="form-input w-full" type="number" id="days-present" name="days-present"
                              v-model="form.days_present" placeholder="Enter number of days present">
                            <div v-if="errors.days_present" class="text-sm text-red-500">
                              {{ errors.days_present }}
                            </div>
                          </div>

                          <div class="mb-4 md:ml-2">
                            <label class="block text-gray-700 font-bold mb-2" for="days-absent">
                              Number of Days Absent
                            </label>
                            <input class="form-input w-full" type="number" id="days-absent" name="days-absent"
                              v-model="form.days_absent" placeholder="Enter number of days absent">
                            <div v-if="errors.days_absent" class="text-sm text-red-500">
                              {{ errors.days_absent }}
                            </div>
                          </div>
                        </div>

                        <div class="mb-4">
                          <label class="block text-gray-700 font-bold mb-2" for="summary">
                            Summary of activities for the week
                          </label>
                          <textarea class="form-input w-full" id="summary" name="summary" v-model="form.summary"
                            placeholder="Enter summary"></textarea>
                          <div v-if="errors.summary" class="text-sm text-red-500">
                            {{ errors.summary }}
                          </div>
                        </div>
                        <button class="bg-darkBlue hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                          type="submit">Submit</button>
                      </form>
                    </div>

                  </div>

                  <div v-else
                    class="w-[500px] h-[300px] bg-white shadow-2xl rounded-3xl flex flex-col justify-center items-center space-y-5">
                    <div>
                      <div v-if="!activities.data">
                        <div
                          class="w-[500px] h-[300px] bg-white shadow-2xl rounded-3xl flex flex-col justify-center items-center space-y-5">
                          <div>
                            <img src="/images/6909-removebg-preview.png" alt="icon" class="w-[200px]" />
                          </div>
                          <button type="button" id="upload-btn"
                            class="bg-darkBlue text-white px-6 py-4 rounded-full text-lg font-bold flex space-x-2"
                            @click="showForm = true">
                            <img src="/images/circle-plus-fill.png" class="w-6 h-6" alt="icon" />
                            <span>Add new activities</span>
                          </button>
                        </div>
                      </div>
                      <div v-else>
                        <table>
                          <thead>
                            <tr>
                              <th>Activity Name</th>
                              <th>Description</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="activity in activities.data" :key="activity.id">
                              <td>{{ activity.name }}</td>
                              <td>{{ activity.description }}</td>
                              <td>{{ activity.date }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Authenticated>
</template>
    
<script setup>
import Authenticated from "@/Layouts/Authenticated.vue";
import ActivityLogNav from "@/Components/Students/ActivityLogNav.vue";
import { Head, Link, usePage } from "@inertiajs/inertia-vue3";
import { ref } from 'vue';
import { useForm } from "@inertiajs/inertia-vue3";


const authUser = usePage().props.value.auth.user;

defineProps({
  errors: Object,
  activities: Object,
});

const showForm = ref(false)

let form = useForm({
  week_number: "",
  from_date: "",
  to_date: "",
  days_present: "",
  days_absent: "",
  summary: "",
});


let submit = () => {
  if (form.post(route("activity_log.store"))) {
    showForm.value = false;
  };
};

</script>