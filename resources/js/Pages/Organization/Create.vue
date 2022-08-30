<template>
  <Authenticated>
    <Head title="Edit Programmes" />
    <OrganizationNav>
      <template v-slot:username>
        {{ authUser.name }}
      </template>

      <template v-slot:userrole>
        {{ authUserRole.name }}
      </template>
    </OrganizationNav>

    <section class="w-full lg:w-10/12 lg:items-center m-4 mx-auto">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-5">
        <div>
          <h1 class="text-veryDarkBlue text-3xl font-bold">
            Create Organization
          </h1>
        </div>

        <div
          class="
            flex
            lg:flex-row
            flex-col
            lg:space-x-10
            space-y-10
            lg:space-y-0
          "
        >
          <form
            action="#"
            class="
              flex flex-col
              space-y-5
              lg:flex-row lg:space-y-0
              space-x-0
              lg:space-x-10
            "
            method="post"
          >
            <div class="flex flex-col w-full space-y-5 bg-white p-5 rounded-lg">
              <div
                class="
                  flex flex-col
                  lg:flex-row
                  space-x-0
                  lg:space-x-5
                  space-y-5
                  lg:space-y-0
                "
              >
                <div class="w-full">
                  <label for="name"
                    >Organization Name<sup class="text-red-500">*</sup></label
                  >
                  <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    class="dashboard-textinput"
                  />
                </div>
                <div class="w-full">
                  <label for="industrial-supervisor"
                    >Commencement date<sup class="text-red-500"
                      >*</sup
                    ></label
                  >
                  <input
                  type="date"
                  id="commencement"
                  class="
                   dashboard-textinput
                  "
                />
                
                </div>
              </div>
              <div
                class="
                  flex flex-col
                  lg:flex-row
                  space-x-0
                  lg:space-x-5
                  space-y-5
                  lg:space-y-0
                "
              >
                <div class="w-full flex flex-col space-y-2">
                  <label for="name"
                    >Location<sup class="text-red-500">*</sup></label
                  >
                  <select id="program-select" v-model="form.district">
                    <option
                      v-for="(district, index) in districts.data"
                      :key="index"
                      :value="district.id"
                    >
                      {{ district.name }}
                    </option>
                  </select>
                </div>
                <div class="w-full flex flex-col space-y-2">
                  <label for="industrial-supervisor"
                    >Company Logo<sup class="text-red-500">*</sup></label
                  >
                  <input accept="image/png, image/jpeg, image/jpg" class="dashboard-textinput px-2" type="file" @input="form.profile_pic = $event.target.files[0]" />

                </div>
              </div>
              <div>
                <label for="name"
                  >Description<sup class="text-red-500">*</sup></label
                >
                <textarea
                  class="
                  dashboard-textinput
                  "
                  id=""
                  cols="30"
                  rows="10"
                ></textarea>
              </div>
            </div>

            <div class="space-y-5">
              <div class="bg-white p-5 rounded-lg space-y-2">
                <div>
                  <h6 class="font-semibold text-sm text-veryDarkBlue">
                    Status
                  </h6>
                </div>
                <div>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-7 w-7 text-veryDarkBlue"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"
                    />
                  </svg>
                </div>
               
                <div>
                  <label for="industrial-supervisor"
                    >Industrial Supervisor<sup class="text-red-500">*</sup></label
                  >
                  <input
                  type="text"
                  id="industrial-supervisor"
                  class="
                  dashboard-textinput
                  "
                />
                </div>
              </div>

              <div class="bg-white p-5 rounded-lg space-y-4">
                <div>
                  <h6 class="font-semibold text-sm text-veryDarkBlue">
                    Interns
                  </h6>
                </div>
                <div>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-7 w-7 text-veryDarkBlue"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
                    />
                  </svg>
                </div>
                <div>
                  <p>Add students to this organization</p>
                </div>
                <div>
                  <input
                    type="text"
                    id="add-students"
                    class="
                      py-2
                      px-4
                      text-left
                      w-full
                      text-gray-700
                      border
                      placeholder:text-left
                      border-gray-300
                      rounded-md
                      placeholder:text-base
                      focus:border-gray-200 focus:outline-none
                    "
                  />
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="flex space-x-3">
          <button class="bg-veryDarkBlue text-white py-2 px-4 rounded-md">
            Create
          </button>
          <button
            class="
              bg-none
              border border-gray-300
              text-veryDarkBlue
              py-2
              px-4
              rounded-md
            "
          >
            Create & create another
          </button>
          <a
            href="organization.html"
            class="
              bg-none
              border border-gray-300
              text-veryDarkBlue
              py-2
              px-4
              rounded-md
            "
            >Cancel</a
          >
        </div>
      </div>
    </section>
  </Authenticated>
</template>
  
  <script setup>
import Authenticated from "@/Layouts/Authenticated.vue";
import OrganizationNav from "@/Components/OrganizationNav.vue";
import { ref } from "vue";
import { Head, Link, usePage } from "@inertiajs/inertia-vue3";
import Alert from "@/Components/Alert.vue";
import { useForm } from "@inertiajs/inertia-vue3";

const authUser = usePage().props.value.auth.user;
const authUserRole = usePage().props.value.auth.user.role;

defineProps({
  errors: Object,
  districts: Object,
});

let form = useForm({
  name: "",
  supervisor: "",
  district: "",
  organization_pic: null,
  description: ""
});

let submit = () => {
  form.post(route("programmes.store"));
};
</script>