<template>
  <Head title="Student Register" />
  <div class="auth-wrapper">
    <div
      class="
        relative
        flex flex-col
        m-6
        space-y-10
        md:flex-row md:space-y-0 md:m-0
      "
    >
      <div class="min-w-[600px]">
        <div v-if="formStep == 1" class="flex justify-center items-center mb-5">
          <div class="progress-round bg-veryDarkBlue">1</div>
          <div class="w-48 h-1 bg-gray-100"></div>
          <div class="progress-round bg-gray-500">2</div>
          <div class="w-48 h-1 bg-gray-100"></div>
          <div class="progress-round bg-gray-500">3</div>
        </div>

        <div v-if="formStep == 2" class="flex justify-center items-center mb-5">
          <div class="progress-round bg-veryDarkBlue">1</div>
          <div class="w-48 h-1 bg-veryDarkBlue"></div>
          <div class="progress-round bg-veryDarkBlue">2</div>
          <div class="w-48 h-1 bg-gray-100"></div>
          <div class="progress-round bg-gray-500">3</div>
        </div>

        <form>
          <div class="space-y-5 bg-white px-10 py-10 shadow-2xl rounded-lg">
            <div class="flex flex-col space-y-2">
              <BreezeValidationErrors class="mb-4" />
              <h1 class="font-bold text-2xl mb-3">Register as a Student</h1>
              <h6 class="text-gray-700 text-sm font-bold" v-if="formStep == 1">
                Step 1 of 3
              </h6>
              <h6 class="text-gray-700 text-sm font-bold" v-if="formStep == 2">
                Step 2 of 3
              </h6>
            </div>

            <!-- First step -->
            <div class="space-y-5" v-if="formStep == 1">
              <div class="flex flex-col space-y-2">
                <label for="fullname" class="form-label">Fullname</label>
                <input
                  type="text"
                  id="fullname"
                  placeholder="Enter your fullname"
                  class="text-xs placeholder:placeholder:text-gray-700 py-4"
                  v-model="form.name"
                />
              </div>

              <div class="flex flex-col space-y-2">
                <label for="email" class="form-label">Email</label>
                <input
                  type="email"
                  id="email"
                  placeholder="Enter your school email"
                  class="text-xs placeholder:text-gray-700 py-4"
                  v-model="form.email"
                />
              </div>

              <div class="flex flex-col space-y-2">
                <label for="personal-number" class="form-label"
                  >Phonenumber</label
                >
                <input
                  type="text"
                  id="personal-number"
                  placeholder="Enter your phonenumber"
                  class="text-xs placeholder:text-gray-700 py-4"
                  v-model="form.phone_number"
                />
              </div>

              <div class="flex flex-col space-y-2">
                <label for="personal-number" class="form-label"
                  >Next of Kin #</label
                >
                <input
                  type="text"
                  id="personal-number"
                  placeholder="Enter your next of kin phonenumber"
                  class="text-xs placeholder:text-gray-700 py-4"
                  v-model="form.next_of_kin"
                />
              </div>
            </div>

            <!-- Second step -->
            <div class="space-y-5" v-if="formStep == 2">
              <div class="flex flex-col space-y-2">
                <label for="personal-number" class="form-label"
                  >Registration Number</label
                >
                <input
                  type="text"
                  id="personal-number"
                  placeholder="Enter your reg number"
                  class="text-xs placeholder:text-gray-700 py-4"
                  v-model="form.reg_number"
                />
              </div>

              <div class="flex flex-col space-y-2">
                <label for="program" class="form-label">Program of Study</label>
                <select v-model="program_of_study" id="program-select">
                  <option value="dog">Business Information Technology</option>
                  <option value="cat">Computer Systems and Security</option>
                </select>
              </div>

              <div class="flex flex-col">
                <label for="profile-pic" class="form-label"
                  >Profile Picture</label
                >
                <input
                  type="file"
                  id="profile-pic"
                  placeholder="Enter your reg number"
                  accept="image/png, image/jpeg"
                  class=" placeholder:text-gray-700 py-4"
                />
              </div>

              <div class="flex flex-col space-y-2">
                <label for="program" class="form-label">Gender</label>
                <div class="flex space-x-4">
                  <div class="space-x-2">
                    <input
                      type="radio"
                      id="male"
                      name="gender"
                      value="M"
                      checked
                    />
                    <label for="male">Male</label>
                  </div>

                  <div  class="space-x-2">
                    <input type="radio" id="female" name="gender" value="dewey" />
                    <label for="female">Female</label>
                  </div>
                </div>
              </div>
            </div>

            <div v-if="formStep == 1">
              <button
                class="bg-veryDarkBlue text-white px-4 py-3 rounded"
                type="button"
                @click="nextStep"
              >
                Next Step
              </button>
            </div>

            <div v-if="formStep == 2" class="flex justify-between">
              <button
                class="bg-veryDarkBlue text-white px-4 py-3 rounded"
                type="button"
                @click="prevStep"
              >
                Prev
              </button>

              <button
                class="bg-veryDarkBlue text-white px-4 py-3 rounded"
                type="button"
                @click="nextStep"
              >
                Next Step
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";

const form = useForm({
  name: "",
  email: "",
  user_name: "",
  phone_number: "",
  next_of_kin: "",
  program_of_study: "",
  reg_number: "",
  gender: "",
});

let formStep = ref(1);

function nextStep() {
  Inertia.post(
    route("student-register.first.step"),
    {
      name: form.name,
      email: form.email,
      phone_number: form.phone_number,
      next_of_kin: form.next_of_kin,
    },
    {
      onSuccess: () => {
        formStep.value++;
      },
    }
  );
}

function prevStep() {
  formStep.value--;
}
</script>