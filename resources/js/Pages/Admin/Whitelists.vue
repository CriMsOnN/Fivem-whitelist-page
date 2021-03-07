<template>
    <admin_default>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                WhiteLists
            </h2>
        </template>
        <div class="hidden sm:flex sm:items-center sm:justify-end sm:ml-6 pr-28">
            {{'Accepted: ' + accepted.length}} {{'Pending: ' + pending.length}}
            <div class="ml-3 relative">
                <jet-dropdown align="right" width="48">
                    <template #trigger>
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border-transparent">
                            Filter
                        </button>
                    </span>
                    </template>
                    <template #content>
                        <div class="w-30">
                            <div class="block px-2 py-2 text-xs text-gray-400">
                                Filter by status
                            </div>
                            <button @click="filterBy('Accepted')" class="w-full rounded px-4 py-2 text-xs text-gray-400 hover:bg-gray-800">
                                Accepted
                            </button>
                            <button @click="filterBy('Pending')" class="w-full rounded px-4 py-2 text-xs text-gray-400 hover:bg-gray-800">
                                Pending
                            </button>
                        </div>
                    </template>
                </jet-dropdown>
            </div>
        </div>
        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
            <thead>
                <tr class="text-center border-b-2 border-gray-300">
                    <th class="px-4 py-3">Id</th>
                    <th class="px-4 py-3">FullName</th>
                    <th class="px-4 py-3">Fivem Hours</th>
                    <th class="px-4 py-3">Steam Name</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(whitelist, index) in filtered" :key="whitelist.id" class="bg-gray-100 border-b border-gray-200 text-center hover:bg-gray-700 hover:text-white">
                    <td class="px-4 py-3">{{index + 1}}</td>
                    <td class="px-4 py-3">{{whitelist.fullname}}</td>
                    <td class="px-4 py-3">{{whitelist.fivemHours}}</td>
                    <td class="px-4 py-3">{{whitelist.steamName}}</td>
                    <td class="px-4 py-3" :class="whitelist.status === 'Pending' ? 'text-red-400' : 'text-green-500'">{{whitelist.status}}</td>
                    <td class="px-4 py-3" >
                        <button @click="deleteWhitelist(whitelist.id)">
                            <i class="fas fa-trash mr-2"></i>
                        </button>
                        <button v-if="whitelist.status === 'Pending'" @click="updateWhitelist(whitelist.id)">
                            <i class="far fa-check-circle text-green-700"></i>
                        </button>
                        <button @click="selectWhitelist(whitelist.id)">
                            <i class="far fa-eye text-gray-300 ml-2"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </admin_default>
</template>

<script>
import admin_default from "@/Pages/Admin/admin_default";
import JetDropdown from '@/Jetstream/Dropdown';
import JetDropdownLink from '@/Jetstream/DropdownLink';
import {computed, ref} from "vue";
import { Inertia } from '@inertiajs/inertia';

export default {
    props: ['whitelists'],
    components: {
        admin_default,
        JetDropdown,
        JetDropdownLink
    },
    setup(props) {
        const filter = ref('');
        const accepted = computed(() => {
            return props.whitelists.filter((e) => e.status !== 'Pending');
        })
        const pending = computed(() => {
            return props.whitelists.filter((e) => e.status !== 'Accepted');
        })
        const filtered = computed(() => {
            return props.whitelists.filter((e) => e.status !== filter.value);
        })
        const filterBy = (filtered) => {
            filter.value = filtered
        }

        const selectWhitelist = (id) => {
            Inertia.get(`/admin/whitelists/${id}`)
        }

        const deleteWhitelist = (id) => {
            Inertia.post('/admin/whitelist', {
                id: id
            })
        }

        const updateWhitelist = (id) => {
            Inertia.post('/admin/updatewhitelist', {
                id: id
            })
        }
      return {
          filtered,
          filterBy,
          deleteWhitelist,
          admin_default,
          pending,
          accepted,
          updateWhitelist,
          selectWhitelist
      }
    }
}
</script>
