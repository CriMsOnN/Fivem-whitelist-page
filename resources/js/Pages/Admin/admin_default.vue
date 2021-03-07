<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <jet-nav-link :href="route('admin')" :active="route().current('admin')">
                                    Admin
                                </jet-nav-link>
                                <jet-nav-link :href="route('whitelists')" :active="route().current('whitelists')">
                                    Whitelists
                                </jet-nav-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <header class="bg-white shadow" v-if="$slots.header">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <slot name="header"></slot>
            </div>
        </header>
        <main>
            <slot></slot>
        </main>
    </div>
</template>
<script>
import JetNavLink from '@/Jetstream/NavLink'
export default {
    props: ['name'],
    components: {
        JetNavLink
    },
    setup() {
        return {
            JetNavLink
        }
    }
}
</script>

<style>

</style>
