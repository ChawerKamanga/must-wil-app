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
    <div class="w-full">
      <Link method="post" :href="route('logout')" class="menu-item-link group inactive-nav-item">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="menu-icon text-gray-300 group-hover:text-darkBlue"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
          />
        </svg>
        <span
          class="
            menu-text
            text-gray-300 text-xs
            group-hover:text-darkBlue
            hidden
            xl:block
          "
          >Logout</span
        >
      </Link>
    </div>

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
          <h6 class="text-lg">{{ authUser.name }}</h6>
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
const authUserRole = usePage().props.value.auth.user.role;
const authProfileImage = usePage().props.value.auth.user.profile_img_url;
const gender = usePage().props.value.auth.user.gender

</script>