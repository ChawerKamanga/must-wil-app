<template>
  <Authenticated>
    <Head title="Interns" />
    <InternsNav />

     <section class="w-full lg:w-10/12 lg:items-center lg:mx-auto space-y-10">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-10">
        <div>
          <h1 class="text-veryDarkBlue text-3xl font-bold">Interns</h1>
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
              :href="route('interns.create')"
              class="create-btn hidden lg:block"
              >Add Intern</Link
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
                  <th class="dashboard-th text-left">Email</th>
                  <th class="dashboard-th text-left">Organization</th>
                  <th class="dashboard-th text-left">Gender</th>
                  <th class="dashboard-th text-left">Phone Number</th>
                  <th class="dashboard-th text-left">Programme</th>
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
                  <td class="text-td">
                    <span>{{ intern.name }}</span>
                  </td>
                  <td class="text-td">
                    <span>
                      {{ intern.email }}
                    </span>
                  </td>
                  <td class="text-td">
                    <span>
                      {{ intern.organization }}
                    </span>
                  </td>
                  <td class="text-td">
                    <span v-if="intern.gender == 'M'">
                      Male
                    </span>
                     <span v-else>
                      Female
                    </span>
                  </td><td class="text-td">
                    <span>
                      {{ intern.phoneNumber }}
                    </span>
                  </td>
                  <td class="text-td">
                    {{ intern.programme }}
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
                      <EditTableRow :href="route('interns.edit', intern.slug)" />
                      <DeleteTableRow @click="destroy(intern)" />
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
import InternsNav from "@/Components/InternsNav.vue";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Alert from "@/Components/Alert.vue";
import DeleteTableRow from "@/Components/DeleteTableRow.vue";
import EditTableRow from "@/Components/EditTableRow.vue";


const props = defineProps({
  interns: Object,
  filters: Object,
});

let search = ref(props.filters.search);

const erase = () => {
  Inertia.get(route("interns.index"));
};

const destroy = (intern) => {
  if (confirm("Are you sure you want to delete this intern?")) {
    Inertia.delete(route("interns.destroy", intern));
  }
};

watch(
  search,
  debounce(function (value) {
    Inertia.get(
      route("interns.index"),
      { search: value },
      {
        preserveState: true,
        replace: true,
      }
    );
  }, 300)
);
</script>