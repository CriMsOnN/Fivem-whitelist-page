<template>
    <app-layout>
        <template #header>
            <h1>Whitelist Application</h1>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="mt-8 text-2xl">
                            Apply for whitelist
                        </div>

                        <jet-validation-errors class="mb-4"/>

                        <section class="py-40 bg-gray-100 bg-opacity-50 h-screen">
                            <div class="mx-auto container max-w-2xl md:w-3/4 shadow-md">
                                <div class="bg-gray-100 p-4 border-t-2 bg-opacity-5 border-indigo-400 rounder-t">
                                    <div class="max-w-sm mx-auto md:w-full md:mx-0">
                                        <div class="inline-flex items-center space-x-4">
                                            Whitelist Applications are: <span class="text-green-400 text-sm pt-0.5">&nbsp;On</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white space-y-6">
                                    <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                                        <h2 class="md:w-1/3 max-w-sm mx-auto">Account info</h2>
                                        <div class="md:w-2/3 max-w-sm mx-auto">
                                            <label class="text-sm text-gray-400">Email</label>
                                            <div class="w-full inline-flex border">
                                                <div class="pt-2 w-1/12 bg-gray-100 bg-opacity-50">
                                                    <i class="far fa-envelope text-3xl pb-2 text-blue-500"></i>
                                                </div>
                                                <input type="email" v-model="email" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" placeholder="email@exmaple.com">
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                                        <h2 class="md:w-1/3 mx-auto max-w-sm">Personal Info</h2>
                                        <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                                            <div>
                                                <label class="text-sm text-gray-400">Full Name</label>
                                                <div class="w-full inline-flex border">
                                                    <div class="w-1/12 pt-2 bg-gray-100">
                                                        <i class="fas fa-user-alt text-3xl pb-2 text-blue-500"></i>
                                                    </div>
                                                    <input type="text" v-model="fullname" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" placeholder="Full Name">
                                                </div>
                                            </div>
                                            <div>
                                                <label class="text-sm text-gray-400">Fivem Hours</label>
                                                <div class="w-full inline-flex border">
                                                    <div class="pt-2 w-1/12 bg-gray-100">
                                                        <i class="far fa-clock text-3xl pb-2 text-blue-500"></i>
                                                    </div>
                                                    <input type="number" v-model="fivemHours" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" placeholder="300">
                                                </div>
                                            </div>
                                            <div>
                                                <label class="text-sm text-gray-400">Steam Name</label>
                                                <div class="w-full inline-flex border">
                                                    <div class="pt-2 w-1/12 bg-gray-100">
                                                        <i class="fab fa-steam-square text-3xl pb-2 text-blue-500"></i>
                                                    </div>
                                                    <input type="text" v-model="steamName" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" placeholder="Example">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                                        <h2 class="md:w-1/3 mx-auto max-w-sm">Character</h2>
                                        <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                                            <div>
                                                <label class="text-sm text-gray-400">Character Story</label>
                                                <div class="w-full inline-flex border">
                                                    <div class="w-1/12 pt-2 bg-gray-100">
                                                        <i class="fas fa-book-open text-3xl pb-2 text-blue-500"></i>
                                                    </div>
                                                    <textarea v-model="story" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" placeholder="Character Story"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="w-full p-4 text-right text-gray-500">
                                        <button @click="handleForm" class="inline-flex items-center focus:outline-none mr-4 p-2 text-gray-300 bg-gray-800 rounded hover:bg-gray-900 hover:text-white">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import JetValidationErrors from "@/Jetstream/ValidationErrors";
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
export default {
    components: {AppLayout, JetValidationErrors},
    setup() {
        const email = ref('');
        const fullname = ref('');
        const fivemHours = ref(0);
        const steamName = ref('');
        const story = ref('');

        const handleForm = () => {
            Inertia.post('/apply', {
                email: email.value,
                fullname: fullname.value,
                fivemHours: fivemHours.value,
                steamName: steamName.value,
                story: story.value
            })
        }

        return {
            handleForm,
            email,
            fullname,
            fivemHours,
            steamName,
            story
        }
    }
}
</script>
