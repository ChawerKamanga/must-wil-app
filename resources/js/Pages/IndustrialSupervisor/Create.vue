<template>
  <Authenticated>
    <Head title="Add Industrial Supervisor" />
    <IndustrialSupervisorNav>
      <template v-slot:username>
        {{ authUser.name }}
      </template>

      <template v-slot:userrole>
        {{ authUserRole.name }}
      </template>
    </IndustrialSupervisorNav>

    <section class="w-full lg:w-10/12 lg:items-center m-4 mx-auto">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-5">
        <div>
          <h1 class="text-veryDarkBlue text-3xl font-bold">
            Add Industrial Supervisor
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
                    >Industrial Supervisor Name<sup class="text-red-500"
                      >*</sup
                    ></label
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
                  <label for="email"
                    >Email<sup class="text-red-500">*</sup></label
                  >
                  <input
                    v-model="form.email"
                    type="email"
                    id="email"
                    class="dashboard-textinput"
                  />
                  <small v-if="errors.email" class="text-red-500">{{
                    errors.email
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
                  <label for="phone-number"
                    >Phonenumber<sup class="text-red-500">*</sup></label
                  >
                  <input
                    type="text"
                    id="phone-number"
                    v-model="form.phone_number"
                    class="dashboard-textinput"
                  />
                  <small v-if="errors.phone_number" class="text-red-500">{{
                    errors.phone_number
                  }}</small>
                </div>
                <div class="w-full flex flex-col space-y-2">
                  <label for="password"
                    >Password<sup class="text-red-500">*</sup></label
                  >
                  <input
                    class="dashboard-textinput px-2"
                    id="password"
                    type="password"
                    v-model="form.password"
                  />
                  <small v-if="errors.password" class="text-red-500">{{
                    errors.password
                  }}</small>
                </div>
              </div>
            </div>

            <div class="space-y-5">
              <div class="bg-white p-5 rounded-lg space-y-4">
                <div>
                  <h6 class="font-semibold text-sm text-veryDarkBlue">
                    Organization
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
                  <p>Add the organization for this Industrial Supervisor</p>
                </div>
                <div>
                  <select
                    id="program-select"
                    class="w-full"
                    v-model="form.organization"
                  >
                    <option
                      v-for="(organization, index) in organizations.data"
                      :key="index"
                      :value="organization.id"
                    >
                      {{ organization.name }}
                    </option>
                  </select>
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
            Add User
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
            Add & add another
          </button>
          <Link
            :href="route('industrial-supervisors.index')"
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
    
<script>
import Authenticated from "@/Layouts/Authenticated.vue";
import IndustrialSupervisorNav from "@/Components/IndustrialSupervisorNav.vue";
import { ref } from "vue";
import { Head, Link, usePage } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  props: {
    errors: Object,
    organizations: {
      type: Array,
      default: () => [],
    },
  },

  setup() {
    const form = useForm({
      name: null,
      email: null,
      phone_number: null,
      password: null,
      organization: null,
    });

    function submit() {
      form.post(route("industrial-supervisors.store"));
    }

    return { form, submit };
  },

  data() {
    return {
      authUser: usePage().props.value.auth.user,
      authUserRole: usePage().props.value.auth.user.role,
      form: useForm({}),
    };
  },
  components: {
    IndustrialSupervisorNav,
    Head,
    Link,
    Authenticated,
  },
};
</script>