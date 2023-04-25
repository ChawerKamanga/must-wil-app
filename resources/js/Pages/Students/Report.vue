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
                  <button @click="showForm = !showForm"
                    class="text-white px-6 py-2 rounded-full border border-white flex space-x-4 justify-center items-center">
                    <svg v-if="showForm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                      class="w-6 h-6 text-white">
                      <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                      <path fill-rule="evenodd"
                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                        clip-rule="evenodd" />
                    </svg>

                    <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                      class="w-6 h-6">
                      <path fill-rule="evenodd"
                        d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zm6.905 9.97a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.72-1.72V18a.75.75 0 001.5 0v-4.19l1.72 1.72a.75.75 0 101.06-1.06l-3-3z"
                        clip-rule="evenodd" />
                      <path
                        d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z" />
                    </svg>



                    <span> {{ showForm ? 'View Your Submitted Report' : 'Submit a Report' }}</span> </button>
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
          <div v-if="$page.props.flash.message" class="bg-darkBlue text-white py-2 px-8 rounded-md font-bold">
            <Alert class="w-[800px] ">
              {{ $page.props.flash.message }}
            </Alert>
          </div>

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

      this.showForm = false;

    }

    if (authUser.value.report_url === "") {
      this.showForm = false;
    }


    return { authUser, submit, form };
  },
};
</script>