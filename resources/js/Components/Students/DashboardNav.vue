<template>
  <nav class="w-36 xl:w-64 h-screen bg-veryDarkBlue">
    <div class="mt-5 flex h-[92%] xl:h-[94%] flex-col justify-between">
      <!-- Top Navs -->
      <div class="space-y-8 xl:space-y-2">
        <div class="hidden xl:flex justify-center items-center mb-10">
          <span class="text-white text-xl font-light">MUST WIL</span>
        </div>
        <!-- Menu Item 1 -->
        <ActiveNavItem routeName="dashboard" itemName="Dashboard">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
          />
        </ActiveNavItem>

        <!-- Menu Item 6 -->
        <InactiveNavItem routeName="programmes.index" itemName="Activity Log">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
          />
        </InactiveNavItem>

        <!-- Menu Item 7 -->
        <InactiveNavItem routeName="programmes.index" itemName="Report">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
          />
        </InactiveNavItem>

        <!-- <InactiveNavItem routeName="programmes.index" itemName="Logout">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
          />
        </InactiveNavItem> -->
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
      </div>

      <!-- Logout & profile nav -->
      <LogoutProfile />
    </div>
  </nav>
</template>

<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import ActiveNavItem from "../ActiveNavItem.vue";
import InactiveNavItem from "../InactiveNavItem.vue";
import LogoutProfile from "./LogoutProfile.vue";
</script>