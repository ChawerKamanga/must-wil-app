<template>
  <Authenticated>
    <Head title="Industrial Supervisors" />
    <IndustrialSupervisorNav />

     <section class="w-full lg:w-10/12 lg:items-center lg:mx-auto space-y-10">
      <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-10">
        <div>
          <h1 class="text-veryDarkBlue text-3xl font-bold">Industrial Supervisors</h1>
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
              :href="route('industrial-supervisors.create')"
              class="create-btn hidden lg:block"
              >Add Supervisor</Link
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
                  <th class="dashboard-th text-left">Created At</th>
                  <th class="dashboard-th">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(industrialSupervisor, index) in industrialSupervisors.data"
                  :key="industrialSupervisor.id"
                  class="border-b border-gray-200"
                >
                  <th class="text-left">
                    <span class="font-normal">{{ index + 1 }}</span>
                  </th>
                  <td class="text-td">
                    <span>{{ industrialSupervisor.name }}</span>
                  </td>
                  <td class="text-td">
                    <span>
                      {{ industrialSupervisor.email }}
                    </span>
                  </td>
                  <td class="text-td">
                    <span>
                      {{ industrialSupervisor.organization }}
                    </span>
                  </td>
                  <td class="text-td">
                    <span v-if="industrialSupervisor.gender == 'M'">
                      Male
                    </span>
                     <span v-else>
                      Female
                    </span>
                  </td><td class="text-td">
                    <span>
                      {{ industrialSupervisor.phoneNumber }}
                    </span>
                  </td>
                  <td class="text-td">
                    {{ industrialSupervisor.createdAt }}
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
                      <EditTableRow :href="route('industrial-supervisors.edit', industrialSupervisor.slug)" />
                      <DeleteTableRow @click="destroy(industrialSupervisor)" />
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
import IndustrialSupervisorNav from "@/Components/IndustrialSupervisorNav.vue";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Alert from "@/Components/Alert.vue";
import DeleteTableRow from "@/Components/DeleteTableRow.vue";
import EditTableRow from "@/Components/EditTableRow.vue";


const props = defineProps({
  industrialSupervisors: Object,
  filters: Object,
});

let search = ref(props.filters.search);

const erase = () => {
  Inertia.get(route("industrial-supervisors.index"));
};

const destroy = (industrialSupervisor) => {
  if (confirm("Are you sure you want to delete this industrial supervisor?")) {
    Inertia.delete(route("industrial-supervisors.destroy", industrialSupervisor));
  }
};

watch(
  search,
  debounce(function (value) {
    Inertia.get(
      route("industrial-supervisors.index"),
      { search: value },
      {
        preserveState: true,
        replace: true,
      }
    );
  }, 300)
);
</script>