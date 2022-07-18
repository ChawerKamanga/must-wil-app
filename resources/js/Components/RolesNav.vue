<template>
  <nav class="w-36 xl:w-64 h-screen bg-veryDarkBlue">
    <div class="mt-5 flex h-[92%] xl:h-[94%] flex-col justify-between">
      <!-- Top Navs -->
      <div class="space-y-8 xl:space-y-2">
        <div class="hidden xl:flex justify-center items-center mb-10">
          <span class="text-white text-xl font-light">MUST WIL</span>
        </div>
        <!-- Menu Item 1 -->
        <InactiveNavItem routeName="dashboard" itemName="Dashboard">
          <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
              />
        </InactiveNavItem>

        <InactiveNavItem routeName="dashboard" itemName="Assessment">
          <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
              />
        </InactiveNavItem>

        <!-- Menu Item 2 -->
        <InactiveNavItem routeName="dashboard" itemName="Organization">
           <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
              />
        </InactiveNavItem>

        <!-- Menu Item 3 -->
        <InactiveNavItem routeName="dashboard" itemName="Interns">
          <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
              /> 
        </InactiveNavItem>

        <!-- Menu Item 4 -->
        <InactiveNavItem routeName="dashboard" itemName="Ind. Supervisors">
          <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
              />
        </InactiveNavItem>
       
        <!-- Menu Item 5 -->
        <InactiveNavItem routeName="academic-supervisors.index" itemName="Acad. Supervisors">
          <path d="M12 14l9-5-9-5-9 5 9 5z" />
              <path
                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
              />
        </InactiveNavItem>
        

        <!-- Menu Item 6 -->
        <InactiveNavItem routeName="programmes.index" itemName="Programmes">
          <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
              />
        </InactiveNavItem>
       

        <!-- Menu Item 7 -->
        <ActiveNavItem routeName="roles.index" itemName="Roles">
          <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"
              />
        </ActiveNavItem>
        
      </div>

      <!-- Logout & profile nav -->
      <LogoutProfile />
    </div>
  </nav>
</template>

<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import InactiveNavItem from "./InactiveNavItem.vue";
import ActiveNavItem from "./ActiveNavItem.vue";
import LogoutProfile from "./LogoutProfile.vue";
</script>