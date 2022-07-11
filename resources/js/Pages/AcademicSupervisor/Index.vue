<template>
  <Authenticated>
    <Head title="Roles" />
    <AcademicSupervisorNav>
      <template v-slot:username>
        {{ authUser.name }}
      </template>

       <template v-slot:userrole>
        {{ authUserRole.name }}
      </template>
    </AcademicSupervisorNav>

  
  </Authenticated>
</template>

<script setup>
import Authenticated from "@/Layouts/Authenticated.vue";
import AcademicSupervisorNav from "@/Components/AcademicSupervisorNav.vue";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";
import { Head, Link, usePage } from "@inertiajs/inertia-vue3";
import Alert from "@/Components/Alert.vue";
import DeleteTableRow from "@/Components/DeleteTableRow.vue";
import EditTableRow from "@/Components/EditTableRow.vue";

const authUser = usePage().props.value.auth.user;
const authUserRole = usePage().props.value.auth.user.role;

const props = defineProps({
  roles: Object,
  filters: Object,
});

let search = ref(props.filters.search);

const erase = () => {
  Inertia.get(route("roles.index"));
};

const destroy = (role) => {
  if (confirm("Are you sure you want to delete this role?")) {
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