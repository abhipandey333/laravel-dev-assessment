<script setup lang="ts">
import { ref } from "vue";
import Hero from "@/Components/Dashboard/Hero.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import JobCard from "@/Components/JobCard.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps<{
  jobs?: array;
}>();

const filteredJobs = ref(props.jobs);

const handleSearch = () => {
  filteredJobs.value = props.jobs?.filter(
    (job) =>
      (!title.value || job.title.toLowerCase().includes(title.value.toLowerCase())) &&
      (!location.value || job.location.toLowerCase().includes(location.value.toLowerCase()))
  );
};

const title = ref("");
const location = ref("");
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <!-- Hero -->
    <Hero :handleSearch="handleSearch" v-model:title="title" v-model:location="location" />

    <!-- Job List -->
    <div class="bg-white">
      <div class="container py-5">
        <JobCard :jobs="filteredJobs" />
      </div>
    </div>
  </AuthenticatedLayout>
</template>
