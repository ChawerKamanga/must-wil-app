<template>
    <Authenticated>
      <Head title="Create Evaluation" />
      <AssessmentsNav />
  
      <section class="w-full lg:w-10/12 lg:items-center m-4 mx-auto">
        <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-5">
          <div>
            <h1 class="text-veryDarkBlue text-3xl font-bold">
              Create Assessment
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
                      >Assement Name<sup class="text-red-500">*</sup></label
                    >
                    <input
                      type="text"
                      id="name"
                      v-model="form.name"
                      class="dashboard-textinput"
                    />
                    <small v-if="errors.name" class="text-red-500">{{
                      errors.name
                    }}</small>
                  </div>
                  <div class="w-full">
                    <label for="commencement"
                      >Weight Percentage<sup class="text-red-500">*</sup></label
                    >
                    <input
                      v-model="form.weight_percentage"
                      type="number"
                      id="commencement"
                      class="dashboard-textinput"
                    />
                    <small v-if="errors.weight_percentage" class="text-red-500">{{
                      errors.weight_percentage
                    }}</small>
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
                    <label for="assement-type"
                      >Assessment Type<sup class="text-red-500">*</sup></label
                    >
                    <select id="assement-type" v-model="form.assesment">
                        <option
                          v-for="(assesment, index) in assesments.data"
                          :key="index"
                          :value="assesment.id"
                        >
                          {{ assesment.name }}
                        </option>
                      </select>
                    <small v-if="errors.assesment" class="text-red-500">{{
                      errors.assesment
                    }}</small>
                  </div>
                  <div class="w-full flex flex-col space-y-2">
                    <label for="industrial-supervisor"
                      >Upload a file</label
                    >
                    <input
                      accept=".doc, .docx, .pdf"
                      class="dashboard-textinput px-2"
                      type="file"
                      @input="form.document = $event.target.files[0]"
                    />
                    <small v-if="errors.document" class="text-red-500">{{
                      errors.document
                    }}</small>
                  </div>
                </div>
                <div>
                  <label for="name">Description</label>
                  <textarea
                    class="dashboard-textinput"
                    v-model="form.description"
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
                      >Industrial Supervisor<sup class="text-red-500"
                        >*</sup
                      ></label
                    >
                    <input
                      type="text"
                      id="industrial-supervisor"
                      class="dashboard-textinput"
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
                      class="dashboard-textinput"
                    />
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="flex space-x-3">
            <button
              @click="submit"
              class="bg-veryDarkBlue text-white py-2 px-4 rounded-md"
            >
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
            <Link
              :href="route('organizations.index')"
              class="
                bg-none
                border border-gray-300
                text-veryDarkBlue
                py-2
                px-4
                rounded-md
              "
              >Cancel</Link
            >
          </div>
        </div>
      </section>
    </Authenticated>
  </template>
    
    <script setup>
  import Authenticated from "@/Layouts/Authenticated.vue";
  import AssessmentsNav from "@/Components/AssessmentsNav.vue";
  import { ref } from "vue";
  import { Head, Link, usePage } from "@inertiajs/inertia-vue3";
  import Alert from "@/Components/Alert.vue";
  import { useForm } from "@inertiajs/inertia-vue3";
  
  const authUser = usePage().props.value.auth.user;
  const authUserRole = usePage().props.value.auth.user.role;
  
  defineProps({
    errors: Object,
    assesments: Object
  });
  
  let form = useForm({
    name: "",
    assesment: "",
    weight_percentage: null,
    document: "",
    description: "",
  });
  
  let submit = () => {
    form.post(route("evaluations.store"));
  };
  </script>