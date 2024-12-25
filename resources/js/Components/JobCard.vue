<script setup lang="ts">
import Icon from "@/Components/Icon.vue";

const props = defineProps({
  jobs: Array,
});
</script>


<template>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div
      v-for="job in jobs"
      :key="job.id"
      class="p-6 bg-white rounded-lg shadow-md border border-gray-200"
    >
      <div class="flex items-center justify-between mb-4">
        <div class="flex items-center space-x-4">
          <img
            :src="job.logo"
            alt="Company Logo"
            class="h-20 w-20 rounded-full"
          />
          <div>
            <h3 class="text-lg font-semibold text-gray-800">{{ job.title }}</h3>
            <p class="text-sm text-gray-500">{{ job.company_name }}</p>
          </div>
        </div>
        <div class="flex space-x-2">
          <span
            v-for="(jobType, index) in job.type"
            :key="index"
            class="px-3 py-1 text-sm bg-gray-300 text-gray-700 rounded-full font-semibold"
          >
            {{ jobType }}
          </span>
        </div>
      </div>
      <div class="flex items-center text-sm text-gray-500 mb-4 space-x-2">
        <div class="flex items-center space-x-1">
          <Icon name="briefcase" class="w-5 h-5 text-gray-400" />
          <span>{{ job.experience }}</span>
        </div>
        <span>|</span>
        <div class="flex items-center space-x-1">
          <Icon name="rupee" class="w-5 h-5 text-gray-400" />
          <span>₹{{ job.salary }}</span>
        </div>
        <span>|</span>
        <div class="flex items-center space-x-1">
          <Icon name="location" class="w-5 h-5 text-gray-400" />
          <span>{{ job.location }}</span>
        </div>
      </div>
      <div class="flex items-center text-gray-700 text-sm mb-3 space-x-2">
        <Icon name="file" class="w-5 h-5 text-gray-400" />
        <p>{{ job.description }}</p>
      </div>

      <div class="flex flex-wrap gap-2">
        <span
          v-for="skill in job.skills"
          :key="skill"
          class="px-2 py-1 text-xs text-gray-600 bg-gray-100 rounded-md"
        >
          {{ skill.name }}
        </span>
      </div>
      <p class="text-right text-xs text-gray-400 mt-3">{{ job.created_at }}</p>
    </div>
  </div>
</template>
