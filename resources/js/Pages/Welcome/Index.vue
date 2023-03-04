<script setup>
import Guest from '@/Shared/Guest.vue';
import Link from '@/Shared/Forms/Link.vue';
import { PlusCircleIcon } from '@heroicons/vue/24/solid';
import { UserPlusIcon } from '@heroicons/vue/24/solid';

const props = defineProps({
  data: Array,
});
</script>

<template>
  <Guest>
    <img src="img/logo.svg" alt="logo" class="text-center mx-auto mb-4 block">

    <div class="text-center font-bold mb-4 text-gray-600 dark:text-gray-400">
      Does your company already exist in OfficeLife?
    </div>

    <div class="mb-8 text-center text-gray-600 dark:text-gray-400">
      You can add your company or join your existing company if it already exists.
    </div>

    <div class="justify-between">
      <div class="text-center">
        <!-- create a company -->
        <Link :href="props.data.url.create" class="mb-4 border group border-gray-200 rounded-lg p-5 flex hover:bg-gray-50 cursor-pointer hover:border-gray-300 items-center no-underline text-gray-800" dusk="link-create-company">
          <PlusCircleIcon class="w-5 h-5 text-gray-400 group-hover:text-emerald-600 mr-2" />

          <span>Add your company</span>
        </Link>

        <!-- join -->
        <a href=" create_company.index" dusk="" class="mb-4 border group border-gray-200 rounded-lg p-5 flex hover:bg-gray-50 cursor-pointer hover:border-gray-300 items-center">
          <UserPlusIcon class="w-5 h-5 text-gray-400 group-hover:text-emerald-600 mr-2" />

          <span>Join an existing company</span>
        </a>
      </div>

      <Link :href="props.data.url.logout">Or you can also log out</Link>
    </div>
  </Guest>
</template>
