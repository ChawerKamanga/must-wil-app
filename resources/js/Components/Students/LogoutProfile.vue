<template>
  <div
    class="
      flex flex-col
      space-y-8
      justify-center
      items-center
      px-4
      xl:px-0 xl:space-y-2
    "
  >
    <!-- Smaller Screen -->
    <div class="xl:hidden hidden lg:block">
      <img
        src="/images/pic_3.jpg"
        class="w-16 rounded-full"
        alt="profile pic"
      />
    </div>

    <!-- Larger Screen -->
    <div class="hidden xl:block w-full">
      <div class="flex space-x-3 text-white px-4">
        <img v-if="authProfileImage" :src="authProfileImage" class="w-12 h-12 rounded-full" alt="profile pic" />
        <img v-else-if="gender == 'M'"  src="/images/male_avataar.png" class="w-12" alt="profile pic" />
        <img v-else  src="/images/female_avataar.png" class="w-12" alt="profile pic" />
        <div class="flex flex-col">
          <Link class="text-lg" :href="route('users.edit', authUser)">{{ authUser.name }}</Link>
          <span class="text-sm">{{ authUserRole.name }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
const authUser = usePage().props.value.auth.user;
const authProfileImage = usePage().props.value.auth.user.profile_img_url;
const gender = usePage().props.value.auth.user.gender
const authUserRole = usePage().props.value.auth.user.role;

</script>