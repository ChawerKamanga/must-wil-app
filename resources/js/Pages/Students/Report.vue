<template>
  <Authenticated>

    <Head title="Dashboard" />
    <ReportNav />

    <!-- Main Content -->
    <div class="flex flex-col w-8/12 items-center mx-auto space-y-10">
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
                    Your internship report 🗃️
                  </h1>
                </div>
                <div class="mt-3">
                  <h1 class="text-sm text-gray-200">
                    Upload your final report for submission below
                  </h1>
                </div>
                <div class="mt-10 flex space-x-10">
                  <a v-if="report[0]" :href="report[0].file_url" class="
                      text-white
                      border-gray-300 border
                      rounded-full
                      px-6
                      py-3
                      flex
                      space-x-2
                      justify-center
                      items-center
                    ">
                    <img src="/images/download-solid.png" class="w-5 h-5" alt="icon" />
                    <span>Download Report Template</span>
                  </a>
                  <span v-else class="
                      text-white
                      border-gray-300 border
                      rounded-full
                      px-6
                      py-3
                      flex
                      space-x-2
                      justify-center
                      items-center
                    ">
                    <span>Report Template Not Available</span>
                  </span>
                  <button @click="showForm = !showForm">Toggle Form</button>
                </div>
              </div>
              <!-- Doc img -->
              <div class="flex flex-col h-[220px] p-10">
                <img src="/images/business-performance-analysis-with-graphs_53876-66260-removebg-preview.png" class="w-80"
                  alt="doc image" />
              </div>
            </div>

            <div></div>
          </div>

          <!-- Main Section -->
          <div class="w-full mt-10">
            <div class="w-full mt-6 flex flex-col space-y-6">
              <div class="px-10 py-7 space-y-2">
                <form v-if="showForm" @submit.prevent="submit">
                  <div class="flex justify-center items-center">
                    <div class="
                        w-[500px]
                        h-[300px]
                        bg-white
                        shadow-2xl
                        rounded-3xl
                        flex flex-col
                        justify-center
                        items-center
                        space-y-5
                      ">
                      <div>
                        <img src="/images/transfer-files.png" alt="icon" class="w-[150px]" />
                      </div>
                      <input ref="hiddenFileInput" type="file" id="upload-file" accept=".pdf, .docx"
                        @input="form.intern_file = $event.target.files[0]" hidden />
                      <button type="submit" id="upload-btn" class="
                          bg-darkBlue
                          text-white
                          px-6
                          py-4
                          rounded-full
                          text-lg
                          font-bold
                          flex
                          space-x-2
                        ">
                        <img src="/images/upload-solid_white.png" class="w-6 h-6" alt="icon" />
                        <span> Upload Your Report </span>
                      </button>
                      <small v-if="errors.intern_file" class="text-sm text-red-500">{{ errors.file }}</small>
                    </div>
                  </div>
                </form>
                <table v-else class="w-full bg-white shadow-lg rounded">
                  <thead class="">
                    <tr>
                      <th class="py-8 px-4 text-base">Your Name</th>
                      <th class="py-8 px-4 text-base">Submited Report</th>
                      <th class="py-8 px-4 text-base">Submitted On</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr class="bg-white border-b border-gray-200">
                      <td class="py-3 px-4 text-center">{{ authUser.name }}</td>
                      <td class="py-3 px-4 text-center underline"> <a :href="authUser.report_url">View Your Submited
                          Report</a></td>
                      <td class="py-3 px-4 text-center">{{ transformDateTime(authUser.updated_at) }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Authenticated>
</template>
      
<script>
import { computed, ref, reactive } from "vue";
import Authenticated from "@/Layouts/Authenticated.vue";
import ReportNav from "@/Components/Students/ReportNav.vue";
import { Head, Link, usePage, useForm } from "@inertiajs/inertia-vue3";


export default {
  components: {
    ReportNav,
    Authenticated,
  },
  props: {
    report: Object,
    errors: Object,
  },
  data() {
    return {
      showForm: true,
    };
  },
  methods: {
    transformDateTime(dateTimeString) {
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
  },
  setup(props) {
    const authUser = computed(() => usePage().props.value.auth.user);

    const form = useForm({
      intern_file: null,
      report_id: props.report[0].id
    });

    function submit() {
      document.querySelector("#upload-file").click();

      setTimeout(() => {
        form.post(route("interns.report.store"));
      }, 3000);
    }

    return { authUser, submit, form };
  },
};
</script>