<template>
    <Authenticated>

        <Head title="Assessments" />
        <InternsNav />

        <section class="w-full lg:w-10/12 lg:items-center lg:mx-auto space-y-10">
            <div class="container w-full mx-auto px-5 py-5 flex flex-col space-y-10">
                <div class="flex justify-between items-center my-4">
                    <!-- Assement -->
                    <div>
                        <h1 class="text-veryDarkBlue text-3xl font-bold">
                            {{ intern.name }}
                        </h1>
                    </div>
                    <!-- Create button -->
                    <div>
                        <Link :href="route('interns.show', intern)" class="create-btn hidden lg:block">Go Back</Link>
                    </div>
                </div>




                <div class="bg-white rounded-xl w-full">
                    <div class="w-full mt-6 flex flex-col space-y-6">
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th class="dashboard-th text-left">Week Number</th>
                                    <th class="dashboard-th text-left">Dates</th>
                                    <th class="dashboard-th text-left">Days Present</th>
                                    <th class="dashboard-th text-left">Days Absent</th>
                                    <th class="dashboard-th text-left">Summary</th>
                                    <th class="dashboard-th text-left">Added On</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(activity, index) in activities.data" :key="activity.id"
                                    class="border-b border-gray-200">
                                    <th class="text-td text-center">
                                        <div class="flex items-center  space-x-2">
                                            <span class="font-normal">{{ activity.week_number }}</span>
                                        </div>
                                    </th>
                                    <td class="text-td">
                                        <div>From {{ transformDate(activity.from_date) }} to {{
                                            transformDate(activity.to_date) }}</div>
                                    </td>

                                    <td class="text-td">
                                        <div>{{ activity.days_present }}</div>
                                    </td>

                                    <td class="text-td">
                                        <div>{{ activity.days_absent }}</div>
                                    </td>

                                    <td class="text-td">
                                        <div>{{ activity.summary }}</div>
                                    </td>

                                    <td class="text-td">{{ transformDateTime(activity.created_at) }}</td>

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
import EditTableRow from "@/Components/EditTableRow.vue";
import DeleteTableRow from "@/Components/DeleteTableRow.vue";
import { Link, Head, useForm } from "@inertiajs/inertia-vue3";


const props = defineProps({
    activities: Object,
    intern: Object
});


let transformDate = (dateString) => {
    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    const date = new Date(dateString);
    const day = date.getDate();
    const month = months[date.getMonth()];
    const year = date.getFullYear();

    return `${day} ${month} ${year}`;
}


let transformDateTime = (dateTimeString) => {
    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    const dateTime = new Date(dateTimeString);
    const day = dateTime.getDate();
    const month = months[dateTime.getMonth()];
    const year = dateTime.getFullYear();
    const time = dateTime.toLocaleTimeString('en-US', { hour12: false });

    return `${day} ${month}, ${year} at ${time}`;
}



</script>