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

        <div v-if="formStep == 3" class="flex justify-center items-center mb-5">
          <div class="progress-round bg-veryDarkBlue">1</div>
          <div class="w-48 h-1 bg-veryDarkBlue"></div>
          <div class="progress-round bg-veryDarkBlue">2</div>
          <div class="w-48 h-1 bg-veryDarkBlue"></div>
          <div class="progress-round bg-veryDarkBlue">3</div>
        </div>

        <form @submit.prevent="submit">
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
              <h6 class="text-gray-700 text-sm font-bold" v-if="formStep == 3">
                Step 3 of 3
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
                <select v-model="form.program_of_study" id="program-select">
                  <option
                    v-for="programme in programmes.data"
                    :key="programme.id"
                    :value="programme.id"
                  >
                    {{ programme.name }}
                  </option>
                </select>
              </div>

              <div class="flex flex-col">
                <label for="profile-pic" class="form-label"
                  >Profile Picture</label
                >
                <input
                  type="file"
                  ref="photo"
                  accept="image/png, image/jpeg, image/jpg"
                  @change="previewImage"
                  class="
                    w-full
                    px-4
                    py-2
                    mt-2
                    border
                    rounded-md
                    focus:outline-none focus:ring-1 focus:ring-blue-600
                  "
                />
                <img v-if="url" :src="url" class="w-full mt-4 h-80" />
                <progress
                  v-if="form.progress"
                  :value="form.progress.percentage"
                  max="100"
                >
                  {{ form.progress.percentage }}%
                </progress>
              </div>

              <div class="flex flex-col space-y-2">
                <label for="gender" class="form-label">Gender</label>
                <div class="flex space-x-4">
                  <div class="space-x-2">
                    <input
                      type="radio"
                      id="male"
                      v-model="form.gender"
                      value="M"
                      checked
                    />
                    <label for="male">Male</label>
                  </div>

                  <div class="space-x-2">
                    <input
                      id="female"
                      type="radio"
                      v-model="form.gender"
                      value="F"
                    />
                    <label for="female">Female</label>
                  </div>
                </div>
              </div>
            </div>

            <!-- Third Step -->
            <div class="space-y-5" v-if="formStep == 3">
              <span class="form-label">Select your fields of interest</span>
              <div
                class="flex flex-col"
                v-for="(interest, index) in interests.data"
                :key="index"
              >
                <div class="space-x-2">
                  <input type="checkbox" :id="interest.id" />
                  <label :for="interest.id">{{ interest.name }}</label>
                </div>
              </div>

              <div class="flex flex-col space-y-2">
                <label for="personal-number" class="form-label">Location</label>
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
              <div class="flex flex-col space-y-2">
                <label for="password" class="form-label">Enter Password</label>
                <input
                  type="password"
                  id="password"
                  placeholder="Enter Password"
                  class="text-xs placeholder:text-gray-700 py-4"
                  v-model="form.password"
                />
              </div>

              <div class="flex flex-col space-y-2">
                <label for="confirm-password" class="form-label"
                  >Confirm Password</label
                >
                <input
                  type="password"
                  id="confirm-password"
                  placeholder="Confirm Password"
                  class="text-xs placeholder:text-gray-700 py-4"
                  v-model="form.password_confirmation"
                />
              </div>

              <div class="flex flex-col space-y-2">
                <div class="flex space-x-4">
                  <div class="flex space-x-2 items-center">
                    <input type="checkbox" id="agree" name="agree" />
                    <label for="agree" class="text-sm text-gray-600"
                      >Are you okay being allocated to an area of your intrest
                      even outside your district?</label
                    >
                  </div>
                </div>
              </div>
            </div>

            <div v-if="formStep == 1" class="flex justify-end">
              <div
                class="
                  bg-veryDarkBlue
                  text-white
                  px-4
                  py-3
                  rounded
                  cursor-pointer
                  flex
                  items-center
                  justify-between
                  w-24
                "
                @click="nextStep"
              >
                <span>Next</span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
            </div>

            <div v-if="formStep == 2" class="flex justify-between">
              <div
                class="
                  bg-veryDarkBlue
                  text-white
                  px-4
                  py-3
                  rounded
                  flex
                  items-center
                  justify-between
                  w-24
                  cursor-pointer
                "
                @click="prevStep"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
                <span>Prev</span>
              </div>

              <div
                class="
                  bg-veryDarkBlue
                  text-white
                  px-4
                  py-3
                  rounded
                  cursor-pointer
                  flex
                  items-center
                  justify-between
                  w-24
                "
                @click="lastStep"
              >
                <span>Next</span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
            </div>

            <div v-if="formStep == 3" class="flex justify-between">
              <div
                class="
                  bg-veryDarkBlue
                  text-white
                  px-4
                  py-3
                  rounded
                  flex
                  items-center
                  justify-between
                  w-24
                  cursor-pointer
                "
                @click="prevStep"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
                <span>Prev</span>
              </div>

              <button
                class="bg-veryDarkBlue text-white px-4 py-3 rounded"
                type="submit"
                @click="submit"
              >
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, onMounted } from "vue";
import { Inertia } from "@inertiajs/inertia";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";

export default {
  components: {
    Link,
    Head,
    Inertia,
    BreezeValidationErrors,
  },
  props: {
    errors: Object,
    programmes: Object,
    interests: Object,
    districts: Object,
  },
  data() {
    return {
      url: null,
      formStep: 1    
  };
  },
  setup() {
    const form = useForm({
      name: "",
      email: "",
      user_name: "",
      phone_number: "",
      next_of_kin: "",
      program_of_study: "",
      reg_number: "",
      gender: null,
      profile_pic: null,
      password: "",
      password_confirmation: "",
      district: "",
    });

    return {form};
  },
  
  methods: {
    submit() {
      if (this.$refs.photo) {
        this.form.profile_pic = this.$refs.photo.files[0];
      }
      this.form.post(route("student.register"));
    },
    nextStep() {
      Inertia.post(
        route("student-register.step.first"),
        {
          name: this.form.name,
          email: this.form.email,
          phone_number: this.form.phone_number,
          next_of_kin: this.form.next_of_kin,
        },
        {
          onSuccess: () => {
            this.formStep++;
          },
        }
      );
    },
    prevStep() {
      this.formStep--;
    },
    lastStep() {
      if (this.$refs.photo) {
        this.form.profile_pic = this.$refs.photo.files[0];
      }
      Inertia.post(
        route("student-register.step.second"),
        {
          reg_number: this.form.reg_number,
          program_of_study: this.form.program_of_study,
          profile_pic: this.form.profile_pic,
          gender: this.form.gender,
        },
        {
          onSuccess: () => {
            this.formStep++;
          },
        }
      );
    },
    previewImage(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    },
  },
};
</script>