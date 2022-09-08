<template>
    <Authenticated>
      <Head title="Dashboard" />
      <ActivityLogNav />
  
      <!-- Main Content -->
      <div class="flex flex-col w-8/12 items-center mx-auto space-y-10">
          <div class="flex w-full space-x-6">
            <div class=" rounded-xl w-full mt-5 space-y-6">
              <div class="w-full mt-2 flex flex-col space-y-6 bg-white pb-5 rounded-xl">
                <!-- Dark Blue Banner -->
                <div
                  class="relative flex justify-between w-11/12 mx-auto mt-5 bg-darkBlue rounded-lg"
                >
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
                      <div class="flex">
                        <div
                          class="bg-[#fbc345] border border-gray-300 rounded-full w-12 h-12 flex justify-center items-center mr-3"
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
                          class="bg-[#ef6f59] border border-gray-300 rounded-full w-12 h-12 flex justify-center items-center mr-3"
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
                          <h5 class="font-bold text-lg">
                            Industrial Supervisor
                          </h5>
                          <span class="-mt-1 text-sm">John Mwale</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Doc img -->
                  <div class="flex flex-col h-[220px] p-10">
                    <img
                      src="/images/business-performance-analysis-with-graphs_53876-66260-removebg-preview.png"
                      class="w-80"
                      alt="doc image"
                    />
                  </div>
                </div>
  
                <div></div>
              </div>
  
              <!-- Table Section -->
              <div class="bg-white rounded-xl w-full mt-10">
                <div class="w-full mt-6 flex flex-col space-y-6">
                  <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                      <tr>
                        <th class="dashboard-th text-left">Organization</th>
                        <th class="dashboard-th text-left">Name</th>
                        <th class="dashboard-th text-left">Role</th>
                        <th class="dashboard-th">Email</th>
                        <th class="dashboard-th">Picture</th>
                        <th class="dashboard-th">Phonenumber</th>
                        <th class="dashboard-th">Programme</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(intern, index) in interns" :key="index" class="border-b border-gray-200">
                        <th
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"
                        >
                          <div class="flex items-center space-x-2">
                            <div class="rounded-full bg-gray-800">
                              <img
                                :src="authUserOrg.img_url"
                                class="w-10"
                                alt="logo"
                              />
                            </div>
                            <span class="font-normal">{{ authUserOrg.name }}</span>
                          </div>
                        </th>
                        <td
                          class="border-t-0 px-6 border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                        {{ intern.name }}
                        </td>
                        <td
                          class="border-t-0 px-6 border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          Intern
                        </td>
                        <td
                          class="border-t-0 px-6 text-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                        {{ intern.email }}
                        </td>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                        <div class="flex justify-center">
                          <img
                            :src="intern.profile_img_url"
                            class="w-10 rounded-full"
                            alt="amina"
                          />
                        </div>
                        </td>
                        <td
                          class="border-t-0 px-6 text-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          {{ intern.phone_number }}
                        </td>
                        <td
                          class="border-t-0 px-6 text-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                         {{ intern.email.substring(0,3).toUpperCase() }}
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
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