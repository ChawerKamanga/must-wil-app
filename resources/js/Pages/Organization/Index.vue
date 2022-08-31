<template>
  <Authenticated>
    <Head title="Organizations" />
    <OrganizationNav />

    <section class="w-full lg:w-10/12 lg:items-center lg:mx-auto space-y-10">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-10">
        <div>
          <h1 class="text-veryDarkBlue text-3xl font-bold">Organizations</h1>
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
                  <th class="dashboard-th text-left">Logo</th>
                  <th class="dashboard-th text-left">Organization Name</th>
                  <th class="dashboard-th text-left">Supervisor</th>
                  <th class="dashboard-th text-left">District of Origin</th>
                  <th class="dashboard-th text-left">Internship Commencement</th>
                  <th class="dashboard-th">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(organization, index) in organizations.data"
                  :key="organization.id"
                  class="border-b border-gray-200"
                >
                  <th class="text-left">
                    <span class="font-normal">{{ index + 1 }}</span>
                  </th>
                  <th class="text-left">
                    <img :src="organization.img_url" class="w-10 h-10" alt="logo">
                  </th>
                  <td class="text-td text-left">
                    <Link :href="route('organizations.show', organization)">
                      {{ organization.name }}
                    </Link>
                  </td>
                   <td class="text-td text-left">
                    <span v-if="organization.supervisor.length > 0">
                      <span v-for="supervisor in organization.supervisor" :key="supervisor.id">
                        <span v-if="supervisor.role_id == 3">
                          {{ supervisor.name }}
                        </span>
                      </span>
                    </span>
                    
                    <span class="text-red-700" v-else>N/A</span>
                  </td>
                  <td class="text-td">
                    <span>{{ organization.district }}</span>
                  </td>
                  <td class="text-td">
                    {{ organization.starting_date }}
                  </td>
                  <td class="text-td relative">
                    <div
                      class="
                        flex
                        space-x-5
                        justify-center
                        hover:cursor-pointer
                      "
                    >
                      <EditTableRow :href="route('organizations.edit', organization.slug)" />
                      <DeleteTableRow @click="destroy(organization)" />
                    </div>
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
  organizations: Object,
  filters: Object,
});

let search = ref(props.filters.search);

const erase = () => {
  Inertia.get(route("organizations.index"));
};

const destroy = (organization) => {
  if (confirm("Are you sure you want to delete this organization?")) {
    Inertia.delete(route("organizations.destroy", organization));
  }
};

watch(
  search,
  debounce(function (value) {
    Inertia.get(
      route("organizations.index"),
      { search: value },
      {
        preserveState: true,
        replace: true,
      }
    );
  }, 300)
);
</script>