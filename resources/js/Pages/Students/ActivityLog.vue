<template>
  <Authenticated>
    <Head title="Dashboard" />
    <ActivityLogNav />

    <!-- Main Content -->
    <div class="flex flex-col w-8/12 items-center mx-auto space-y-10">
      <div class="flex w-full space-x-6">
        <div class="rounded-xl w-full mt-5 space-y-6">
          <div
            class="w-full mt-2 flex flex-col space-y-6 bg-white pb-5 rounded-xl"
          >
            <!-- Dark Blue Banner -->
            <div
              class="
                relative
                flex
                justify-between
                w-11/12
                mx-auto
                mt-5
                bg-darkBlue
                rounded-lg
              "
            >
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
                    <div
                      class="
                        bg-[#fbc345]
                        border border-gray-300
                        rounded-full
                        w-12
                        h-12
                        flex
                        justify-center
                        items-center
                        mr-3
                      "
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="menu-icon text-white group-hover:text-darkBlue"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                      >
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path
                          d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                        />
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
                        />
                      </svg>
                    </div>

                    <div class="flex flex-col text-white">
                      <h5 class="font-bold text-lg">Activities</h5>
                      <span class="-mt-1 text-sm">5</span>
                    </div>
                  </div>

                  <div class="flex">
                    <div
                      class="
                        bg-[#ef6f59]
                        border border-gray-300
                        rounded-full
                        w-12
                        h-12
                        flex
                        justify-center
                        items-center
                        mr-3
                      "
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="menu-icon text-white group-hover:text-darkBlue"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                      >
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path
                          d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                        />
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
                        />
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
                <img
                  src="/images/05-removebg-preview.png"
                  class="w-80"
                  alt="doc image"
                />
              </div>
            </div>

            <div></div>
          </div>

          <!-- Table Section -->
          <div class=" w-full mt-10">
            <div class="w-full mt-6 flex flex-col space-y-6">
                <div class="bg-white rounded-xl px-10 py-7 space-y-2">
                    <h6 class="text-3xl font-bold">Installed MS Server</h6>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium magnam ullam velit molestiae dolore fugiat ad quam! Eaque, aut esse?</p>
                    <div class="flex justify-between">
                        <div class="flex bg-gray-400  px-4 py-2 rounded-xl  mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zm-7.518-.267A8.25 8.25 0 1120.25 10.5M8.288 14.212A5.25 5.25 0 1117.25 10.5" />
                              </svg>
                            <span class="text-sm">Activity</span>      
                        </div>
                        <div class="mt-6">
                            <span class="text-sm text-gray-800">23 September, 2022</span>
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

const authUser = usePage().props.value.auth.user;
</script>