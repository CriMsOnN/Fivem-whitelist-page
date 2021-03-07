<template>
    <admin_default>
        <template #header>
            <div class="w-full text-center">
                Fullname: <span class="text-sm text-gray-500">{{whitelist.fullname}}</span><br>
            </div>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-800 rounded text-white text-center">
                Email: <span class="text-sm text-gray-200">{{whitelist.email}}</span><br>
                Fivem Hours: <span class="text-sm text-gray-200">{{whitelist.fivemHours}}</span><br>
                Steam Name: <span class="text-sm text-gray-200">{{whitelist.steamName}}</span><br>
                Story<br> <span class="text-sm text-gray">{{whitelist.story}}</span>
            </div>
        </div>
    </admin_default>
</template>

<script>
import admin_default from "@/Pages/Admin/admin_default";
export default {
    props: ['whitelist'],
    components: {
        admin_default
    }
}
</script>
