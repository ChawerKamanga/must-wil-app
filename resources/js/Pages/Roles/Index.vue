<template>
  <Authenticated>
    <Head title="Roles" />
    <RolesNav />

    <section class="w-full lg:w-11/12 lg:items-center lg:mx-auto space-y-10">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-10">
        <div>
          <h1 class="text-veryDarkBlue text-3xl font-bold">Roles</h1>
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
              :href="route('roles.create')"
              class="create-btn hidden lg:block"
              >Create Role</Link
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
                  <th class="dashboard-th text-left">Role Name</th>
                  <th class="dashboard-th text-left">Role Description</th>
                  <th class="dashboard-th text-left">Created At</th>
                  <th class="dashboard-th">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(role, index) in roles.data"
                  :key="role.id"
                  class="border-b border-gray-200"
                >
                  <th class="text-left">
                    <span class="font-normal">{{ index + 1 }}</span>
                  </th>
                  <td class="text-td">
                    <span>{{ role.name }}</span>
                  </td>
                  <td class="text-td">
                    <span>
                      {{ role.description }}
                    </span>
                  </td>
                  <td class="text-td">
                    {{ role.createdAt }}
                  </td>
                  <td class="text-td relative">
                    <div
                      class="
                        flex
                        space-x-1
                        justify-between
                        hover:cursor-pointer
                      "
                    >
                      <div class="flex space-x-2">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-4 w-4 text-veryDarkBlue"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                          stroke-width="2"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                          />
                        </svg>
                        <span class="text-veryDarkBlue">Edit</span>
                      </div>

                      <div class="flex space-x-1" @click="destroy(role)">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-4 w-4 text-red-700"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                          stroke-width="2"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                          />
                        </svg>
                        <span class="text-red-700">Delete</span>
                      </div>
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
import RolesNav from "@/Components/RolesNav.vue";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Alert from "@/Components/Alert.vue";

const props = defineProps({
  roles: Object,
  filters: Object,
});

let search = ref(props.filters.search);

const erase = () => {
  Inertia.get(route("roles.index"));
};

const destroy = (role) => {
  if (confirm("Are you sure you want to delete this children?")) {
    Inertia.delete(route("roles.destroy", role));
  }
};

watch(
  search,
  debounce(function (value) {
    Inertia.get(
      route("roles.index"),
      { search: value },
      {
        preserveState: true,
        replace: true,
      }
    );
  }, 300)
);
</script>