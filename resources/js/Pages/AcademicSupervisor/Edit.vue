<template>
  <Authenticated>
    <Head title="Add Supervisor" />
    <AcademicSupervisorNav>
      <template v-slot:username>
        {{ authUser.name }}
      </template>

      <template v-slot:userrole>
        {{ authUserRole.name }}
      </template>
    </AcademicSupervisorNav>

    <section class="w-full lg:w-10/12 lg:items-center m-4 mx-auto">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-5">
        <div>
          <h1 class="text-veryDarkBlue text-3xl font-bold">Add Supervisor</h1>
        </div>

        <Alert v-if="$page.props.flash.message" class="w-[800px]">
          {{ $page.props.flash.message }}
        </Alert>

        <div
          class="flex lg:flex-row flex-col space-x-10 space-y-10 lg:space-y-0"
        >
          <form @submit.prevent="submit" method="post" class="space-y-7">
            <div class="flex space-x-7">
              <div
                class="
                  flex flex-col
                  w-[800px]
                  space-y-5
                  border-gray-200
                  bg-white
                  p-5
                  rounded-lg
                "
              >
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
                      >Fullname<sup class="text-red-500">*</sup></label
                    >
                    <input
                      v-model="form.name"
                      type="text"
                      required
                      id="name"
                      class="dashboard-textinput"
                    />
                    <div v-if="errors.name" class="text-sm text-red-500">
                      {{ errors.name }}
                    </div>
                  </div>

                  <div class="w-full">
                    <label for="email"
                      >Email<sup class="text-red-500">*</sup></label
                    >
                    <input
                      v-model="form.email"
                      type="email"
                      required
                      id="email"
                      class="dashboard-textinput"
                    />

                    <div v-if="errors.email" class="text-sm text-red-500">
                      {{ errors.email }}
                    </div>
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
                  <div class="w-full">
                    <label for="phone_number"
                      >PhoneNumber<sup class="text-red-500">*</sup></label
                    >
                    <input
                      v-model="form.phone_number"
                      type="text"
                      required
                      id="name"
                      class="dashboard-textinput"
                    />

                    <input type="hidden" v-model="form.role_id" />

                    <div
                      v-if="errors.phone_number"
                      class="text-sm text-red-500"
                    >
                      {{ errors.phone_number }}
                    </div>
                  </div>
                  <div class="w-full">
                    <label for="password"
                      >Password<sup class="text-red-500">*</sup></label
                    >
                    <input
                      v-model="form.password"
                      type="password"
                      required
                      id="password"
                      class="dashboard-textinput"
                    />
                    <div v-if="errors.password" class="text-sm text-red-500">
                      {{ errors.password }}
                    </div>

                    <input type="hidden" v-model="form.role_id" />
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
                    <label>Gender<sup class="text-red-500">*</sup></label>
                    <div class="space-x-4 flex items-center">
                      <div class="space-x-2">
                        <input
                          type="radio"
                          id="male"
                          name="gender"
                          value="M"
                          v-model="form.gender"
                        />
                        <label for="male">Male</label>
                      </div>

                      <div class="space-x-2">
                        <input
                          type="radio"
                          id="female"
                          name="gender"
                          value="F"
                          v-model="form.gender"
                        />
                        <label for="female">Female</label>
                      </div>
                    </div>
                    <div v-if="errors.gender" class="text-sm text-red-500">
                      {{ errors.gender }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="space-y-5">
                <div
                  class="
                    bg-white
                    p-5
                    shadow-md
                    border
                    w-[400px]
                    border-gray-200
                    rounded-lg
                    space-y-2
                  "
                >
                  <div class="px-7 py-5">
                    <div class="space-y-5">
                      <div>
                        <p>Created At</p>
                        <p>-</p>
                      </div>

                      <div>
                        <p>Last modified At</p>
                        <p>-</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex space-x-3">
              <button class="create-btn" type="submit">Create</button>
              <Link
                :href="route('academic-supervisors.index')"
                class="create-secondaryBtn"
                >Cancel</Link
              >
            </div>
          </form>
        </div>
      </div>
    </section>
  </Authenticated>
</template>

<script setup>
import Authenticated from "@/Layouts/Authenticated.vue";
import AcademicSupervisorNav from "@/Components/AcademicSupervisorNav.vue";
import { Head, Link, usePage } from "@inertiajs/inertia-vue3";
import Alert from "@/Components/Alert.vue";
import { useForm } from "@inertiajs/inertia-vue3";

const authUser = usePage().props.value.auth.user;
const authUserRole = usePage().props.value.auth.user.role;

const props = defineProps({
  errors: Object,
  academicSupervisor: object
});

let form = useForm({
  name: props.academicSupervisor.name,
  email: props.academicSupervisor.email,
  gender: props.academicSupervisor.gender,
  phone_number: props.academicSupervisor.phone_number,
  password: "",
  role_id: 2,
});

let submit = () => {
  form.post(route("academic-supervisors.store"));
};
</script>