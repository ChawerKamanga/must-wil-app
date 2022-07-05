<template>
  <Authenticated>
    <Head title="Dashboard" />
    <DashboardNav />

    <!-- Main Content -->
    <div class="flex flex-col w-10/12 items-center mx-auto space-y-10">
      <div class="flex w-full space-x-6">
        <div class="bg-white rounded-xl w-full mt-5 space-y-6">
          <div class="w-full mt-2 flex flex-col space-y-6">
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
              <!-- Circle Progress Bar -->
              <div class="circle-container bg-darkBlue">
                <div class="top-semicircle">
                  <div class="rectangle1"></div>
                </div>
                <div class="bottom-semicircle">
                  <div class="rectangle2"></div>
                </div>
                <div class="inner-circle bg-darkBlue"></div>
                <div class="smaller-circle text-white">
                  <span id="big-percentage">75</span> %
                </div>
              </div>
              <!-- Assessment Progress Text -->
              <div class="flex flex-col h-[220px] justify-center">
                <div>
                  <h1 class="text-xl font-bold text-white">
                    Assessment Progress
                  </h1>
                </div>
                <div class="mt-2">
                  <h1 class="text-lg text-white">68 / 90 students</h1>
                </div>
              </div>
              <!-- Doc img -->
              <div class="flex flex-col h-[220px] justify-end p-10">
                <img
                  src="images/docs_img_nobg.png"
                  class="w-36"
                  alt="doc image"
                />
              </div>
            </div>

            <div
              class="grid gap-4 lg:grid-cols-3 xl:grid-cols-2 mx-auto w-11/12"
            >
              <!-- Organization 1 Stats -->
              <div class="bg-[#F4F4F4] px-5 py-3 rounded-lg flex flex-col">
                <div class="flex">
                  <!-- Progress Bar -->
                  <div class="org-circle-container">
                    <div class="org-top-semicircle">
                      <div class="org-rectangle1"></div>
                    </div>
                    <div class="org-bottom-semicircle">
                      <div class="org-rectangle2"></div>
                    </div>
                    <div class="org-inner-circle">100%</div>
                  </div>

                  <!-- Organization Description -->
                  <div class="flex flex-col w-full ml-4">
                    <h2 class="">FDH Bank</h2>
                    <div class="flex justify-between mb-2">
                      <span class="text-textLightGray text-xs"> Blantyre </span>
                      <span class="text-textLightGray text-xs"> 7/7 </span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Organization 2 Stats -->
              <div class="bg-[#F4F4F4] px-5 py-3 rounded-lg flex flex-col">
                <div class="flex">
                  <!-- Progress Bar -->
                  <div class="org-circle-container">
                    <div class="org-top-semicircle">
                      <div class="org-rectangle1"></div>
                    </div>
                    <div class="org-bottom-semicircle">
                      <div class="org-rectangle2"></div>
                    </div>
                    <div class="org-inner-circle">100%</div>
                  </div>

                  <!-- Organization Description -->
                  <div class="flex flex-col w-full ml-4">
                    <h2 class="">MHub</h2>
                    <div class="flex justify-between mb-2">
                      <span class="text-textLightGray text-xs">Lilongwe</span>
                      <span class="text-textLightGray text-xs"> 7/7 </span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Organization 3 Stats -->
              <div class="bg-[#F4F4F4] px-5 py-3 rounded-lg flex flex-col">
                <div class="flex">
                  <!-- Progress Bar -->
                  <div class="org-circle-container">
                    <div class="org-top-semicircle">
                      <div class="org-rectangle1"></div>
                    </div>
                    <div class="org-bottom-semicircle">
                      <div class="org-rectangle2"></div>
                    </div>
                    <div class="org-inner-circle">100%</div>
                  </div>

                  <!-- Organization Description -->
                  <div class="flex flex-col w-full ml-4">
                    <h2 class="">NBS Bank</h2>
                    <div class="flex justify-between mb-2">
                      <span class="text-textLightGray text-xs"> Blantyre </span>
                      <span class="text-textLightGray text-xs"> 7/7 </span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Organization 4 Stats -->
              <div class="bg-[#F4F4F4] px-5 py-3 rounded-lg flex flex-col">
                <div class="flex">
                  <!-- Progress Bar -->
                  <div class="org-circle-container">
                    <div class="org-top-semicircle">
                      <div class="org-rectangle1"></div>
                    </div>
                    <div class="org-bottom-semicircle">
                      <div class="org-rectangle2"></div>
                    </div>
                    <div class="org-inner-circle">100%</div>
                  </div>

                  <!-- Organization Description -->
                  <div class="flex flex-col w-full ml-4">
                    <h2 class="">EHub</h2>
                    <div class="flex justify-between mb-2">
                      <span class="text-textLightGray text-xs"> Mzuzu </span>
                      <span class="text-textLightGray text-xs"> 7/7 </span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Organization 5 Stats -->
              <div class="bg-[#F4F4F4] px-5 py-3 rounded-lg flex flex-col">
                <div class="flex">
                  <!-- Progress Bar -->
                  <div class="org-circle-container">
                    <div class="org-top-semicircle">
                      <div class="org-rectangle1"></div>
                    </div>
                    <div class="org-bottom-semicircle">
                      <div class="org-rectangle2"></div>
                    </div>
                    <div class="org-inner-circle">100%</div>
                  </div>

                  <!-- Organization Description -->
                  <div class="flex flex-col w-full ml-4">
                    <h2 class="">MANEB</h2>
                    <div class="flex justify-between mb-2">
                      <span class="text-textLightGray text-xs">Zomba</span>
                      <span class="text-textLightGray text-xs"> 7/7 </span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Organization 6 Stats -->
              <div class="bg-[#F4F4F4] px-5 py-3 rounded-lg flex flex-col">
                <div class="flex">
                  <!-- Progress Bar -->
                  <div class="org-circle-container">
                    <div class="org-top-semicircle">
                      <div class="org-rectangle1"></div>
                    </div>
                    <div class="org-bottom-semicircle">
                      <div class="org-rectangle2"></div>
                    </div>
                    <div class="org-inner-circle">100%</div>
                  </div>

                  <!-- Organization Description -->
                  <div class="flex flex-col w-full ml-4">
                    <h2 class="">MUST</h2>
                    <div class="flex justify-between mb-2">
                      <span class="text-textLightGray text-xs"> Thyolo </span>
                      <span class="text-textLightGray text-xs"> 7/7 </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div></div>
          </div>
        </div>

        <div class="hidden xl:flex flex-col space-y-8 mt-5">
          <!-- Row 1 of stats Card -->
          <div class="flex space-x-6 justify-between">
            <!-- Stats Card 1-->
            <div class="bg-white rounded-lg">
              <div class="flex flex-col p-5 w-full space-y-4">
                <!-- Number with a background -->
                <div class="w-16 h-16 bg-[#F5B34C] rounded-md">
                  <div class="flex justify-center items-center mt-2">
                    <div
                      class="
                        border border-white
                        w-12
                        h-12
                        p-2
                        flex
                        justify-center
                        items-center
                      "
                    >
                      <span class="text-white font-bold text-3xl">12</span>
                    </div>
                  </div>
                </div>
                <h5 class="text-textLightGray font-semibold">Organizations</h5>
                <h6 class="text-gray-900 font-bold text-xl">
                  Total number of organizations allocated
                </h6>
                <span></span>
              </div>
            </div>

            <!-- Stats Card 2-->
            <div class="bg-white rounded-lg">
              <div class="flex flex-col p-5 w-full space-y-4">
                <!-- Number with a background -->
                <div class="w-16 h-16 bg-[#578680] rounded-md">
                  <div class="flex justify-center items-center mt-2">
                    <div
                      class="
                        border border-white
                        w-12
                        h-12
                        p-2
                        flex
                        justify-center
                        items-center
                      "
                    >
                      <span class="text-white font-bold text-3xl">3</span>
                    </div>
                  </div>
                </div>
                <h5 class="text-textLightGray font-semibold">Assessments</h5>
                <h6 class="text-gray-900 font-bold text-xl">
                  Total number of Assessments Added
                </h6>
                <span></span>
              </div>
            </div>
          </div>

          <!-- Row 2 of stats Card -->
          <div class="flex space-x-6 justify-between">
            <!-- Stats Card 1-->
            <div class="bg-white rounded-lg">
              <div class="flex flex-col p-5 w-full space-y-4">
                <!-- Number with a background -->
                <div class="w-16 h-16 bg-[#4F4F4F] rounded-md">
                  <div class="flex justify-center items-center mt-2">
                    <div
                      class="
                        border border-white
                        w-12
                        h-12
                        p-2
                        flex
                        justify-center
                        items-center
                      "
                    >
                      <span class="text-white font-bold text-3xl">8</span>
                    </div>
                  </div>
                </div>
                <h5 class="text-textLightGray font-semibold">
                  Academic Supervisor
                </h5>
                <h6 class="text-gray-900 font-bold text-xl">
                  Total number of Academic Supervisors
                </h6>
                <span></span>
              </div>
            </div>

            <!-- Stats Card 2-->
            <div class="bg-white rounded-lg">
              <div class="flex flex-col p-5 w-full space-y-4">
                <!-- Number with a background -->
                <div class="w-16 h-16 bg-[#BC0000] rounded-md">
                  <div class="flex justify-center items-center mt-2">
                    <div
                      class="
                        border border-white
                        w-12
                        h-12
                        p-2
                        flex
                        justify-center
                        items-center
                      "
                    >
                      <span class="text-white font-bold text-2xl">120</span>
                    </div>
                  </div>
                </div>
                <h5 class="text-textLightGray font-semibold">Interns</h5>
                <h6 class="text-gray-900 font-bold text-xl">
                  Total number of Interns allocated
                </h6>
                <span></span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Table Section -->
      <div class="bg-white rounded-xl w-full">
        <div class="w-full mt-6 flex flex-col space-y-6">
          <table class="items-center w-full bg-transparent border-collapse">
            <thead>
              <tr>
                <th class="dashboard-th text-left">Organizations</th>
                <th class="dashboard-th text-left">Interns</th>
                <th class="dashboard-th">Industrial Supervisors</th>
                <th class="dashboard-th">Academic Supervisors</th>
                <th class="dashboard-th">Internship Status</th>
                <th class="dashboard-th text-left">Location</th>
                <th class="dashboard-th">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b border-gray-200">
                <th
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                    text-left
                  "
                >
                  <div class="flex items-center space-x-2">
                    <div class="rounded-full bg-gray-800">
                      <img
                        src="images/fdh_logo-removebg-preview.png"
                        class="w-10"
                        alt="logo"
                      />
                    </div>
                    <span class="font-normal">FDH Bank</span>
                  </div>
                </th>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div class="flex items-center">
                    <img
                      src="images/amina.jpg"
                      class="w-10 rounded-full"
                      alt="logo"
                    />
                    <img
                      src="images/bright.jpg"
                      class="w-10 rounded-full -m-2"
                      alt="logo"
                    />
                    <img
                      src="images/chisomo.jpg"
                      class="w-10 rounded-full -m-2"
                      alt="logo"
                    />
                    <img
                      src="images/grace.jpg"
                      class="w-10 rounded-full -m-2"
                      alt="logo"
                    />
                  </div>
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div class="flex justify-center">Joseph Phiri</div>
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div class="flex justify-center">
                    <img
                      src="images/pic_1.jpg"
                      class="w-10 rounded-full"
                      alt="amina"
                    />
                  </div>
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div class="flex justify-center">
                    <div
                      class="
                        bg-green-100
                        rounded-lg
                        text-green-800
                        py-2
                        text-center
                        w-20
                      "
                    >
                      In progress
                    </div>
                  </div>
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  Blantyre
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div
                    class="flex space-x-1 justify-center hover:cursor-pointer"
                  >
                    <div class="bg-gray-500 rounded-full w-1 h-1"></div>
                    <div class="bg-gray-500 rounded-full w-1 h-1"></div>
                    <div class="bg-gray-500 rounded-full w-1 h-1"></div>
                  </div>
                </td>
              </tr>
              <tr class="border-b border-gray-200">
                <th
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                    text-left
                  "
                >
                  <div class="flex items-center space-x-2">
                    <div class="rounded-full bg-gray-800">
                      <img src="images/mhub.png" class="w-10" alt="logo" />
                    </div>
                    <span class="font-normal">MHub Malawi</span>
                  </div>
                </th>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div class="flex items-center">
                    <img
                      src="images/david.jpg"
                      class="w-10 rounded-full"
                      alt="logo"
                    />
                    <img
                      src="images/francis.jpg"
                      class="w-10 rounded-full -m-2"
                      alt="logo"
                    />
                  </div>
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div class="flex justify-center">Anita Mhango</div>
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div class="flex justify-center">
                    <img
                      src="images/pic_4.jpg"
                      class="w-10 rounded-full"
                      alt="amina"
                    />
                  </div>
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div class="flex justify-center">
                    <div
                      class="
                        bg-green-100
                        rounded-lg
                        text-green-800
                        py-2
                        text-center
                        w-20
                      "
                    >
                      In progress
                    </div>
                  </div>
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  Lilongwe
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div
                    class="flex space-x-1 justify-center hover:cursor-pointer"
                  >
                    <div class="bg-gray-500 rounded-full w-1 h-1"></div>
                    <div class="bg-gray-500 rounded-full w-1 h-1"></div>
                    <div class="bg-gray-500 rounded-full w-1 h-1"></div>
                  </div>
                </td>
              </tr>
              <tr class="border-b border-gray-200">
                <th
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                    text-left
                  "
                >
                  <div class="flex items-center space-x-2">
                    <div class="rounded-full bg-gray-800">
                      <img
                        src="images/mzuzu_ehub.png"
                        class="w-10"
                        alt="logo"
                      />
                    </div>
                    <span class="font-normal">Mzuzu EHub</span>
                  </div>
                </th>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div class="flex items-center">
                    <img
                      src="images/hanna.jpg"
                      class="w-10 rounded-full"
                      alt="logo"
                    />
                    <img
                      src="images/brian.jpg"
                      class="w-10 rounded-full -m-2"
                      alt="logo"
                    />
                  </div>
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div class="flex justify-center">Betty Kaunda</div>
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div class="flex justify-center">
                    <img
                      src="images/pic_5.jpg"
                      class="w-10 rounded-full"
                      alt="amina"
                    />
                  </div>
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div class="flex justify-center">
                    <div
                      class="
                        bg-green-100
                        rounded-lg
                        text-green-800
                        py-2
                        text-center
                        w-20
                      "
                    >
                      In progress
                    </div>
                  </div>
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  Mzuzu
                </td>
                <td
                  class="
                    border-t-0
                    px-6
                    align-middle
                    border-l-0 border-r-0
                    text-xs
                    whitespace-nowrap
                    p-4
                  "
                >
                  <div
                    class="flex space-x-1 justify-center hover:cursor-pointer"
                  >
                    <div class="bg-gray-500 rounded-full w-1 h-1"></div>
                    <div class="bg-gray-500 rounded-full w-1 h-1"></div>
                    <div class="bg-gray-500 rounded-full w-1 h-1"></div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </Authenticated>
</template>

<script setup>
import Authenticated from "@/Layouts/Authenticated.vue";
import DashboardNav from "@/Components/DashboardNav.vue";
import {Head, Link} from "@inertiajs/inertia-vue3";
</script>