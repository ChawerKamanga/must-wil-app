<template>
  <Authenticated>
    <Head title="Organizations" />
    <OrganizationNav />

    <section class="w-full lg:w-10/12 lg:items-center lg:mx-auto space-y-10">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-10">
        <div>
          <h1 class="text-veryDarkBlue text-3xl font-bold">{{ organization.name }}</h1>
        </div>

        <div class="flex justify-between items-center my-4">
          <!-- Search bar -->
          <div class="flex items-center">
            <input
              type="text"
              placeholder="Search..."
              v-model="search"
              class="search-input"
            />
            <button @click="erase()" class="px-3 text-gray-500 text-base">
              Reset
            </button>
          </div>
          <!-- Create button -->
          <div>
            <Link
              :href="route('organizations.create')"
              class="create-btn hidden lg:block"
              >Create organization</Link
            >
            <a href="organization-create.html" class="create-btn lg:hidden"
              >Create</a
            >
          </div>
        </div>

        <Alert v-if="$page.props.flash.message">
          {{ $page.props.flash.message }}
        </Alert>

        <div class="bg-white rounded-xl w-full">
          <div class="w-full mt-6 flex flex-col space-y-6">
            <table class="items-center w-full bg-transparent border-collapse">
              <thead>
                <tr>
                  <th class="dashboard-th text-left">Index</th>
                  <th class="dashboard-th text-left">Name</th>
                  <th class="dashboard-th text-left">Gender</th>
                  <th class="dashboard-th text-left">Email</th>
                  <th class="dashboard-th text-left">Phonenumber</th>
                  <th class="dashboard-th text-left">Program Code</th>
                  <th class="dashboard-th">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(intern, index) in interns.data"
                  :key="intern.id"
                  class="border-b border-gray-200"
                >
                  <th class="text-left">
                    <span class="font-normal">{{ index + 1 }}</span>
                  </th>
                  <td class="text-td text-left">
                    <span>
                      {{ intern.name }}
                    </span>
                  </td>
                  <td class="text-td">
                    <span>{{ intern.gender }}</span>
                  </td>
                  <td class="text-td">
                    {{ intern.email }}
                  </td>
                 <td class="text-td">
                    {{ intern.phonenumber }}
                  </td>
                  <td class="text-td">
                    {{ intern.email }}
                  </td>
                  <td class="text-td text-center">
                    <button class="text-red-800">Deallocate</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </Authenticated>
</template>

<script setup>
import Authenticated from "@/Layouts/Authenticated.vue";
import OrganizationNav from "@/Components/OrganizationNav.vue";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Alert from "@/Components/Alert.vue";
import DeleteTableRow from "@/Components/DeleteTableRow.vue";
import EditTableRow from "@/Components/EditTableRow.vue";


const props = defineProps({
  organization: Object,
  interns: Object
});

const erase = () => {
  Inertia.get(route("organizations.index"));
};

const destroy = (organization) => {
  if (confirm("Are you sure you want to delete this organization?")) {
    Inertia.delete(route("organizations.destroy", organization));
  }
};

// watch(
//   debounce(function (value) {
//     Inertia.get(
//       route("organizations.index"),
//       { search: value },
//       {
//         preserveState: true,
//         replace: true,
//       }
//     );
//   }, 300)
// );
</script>