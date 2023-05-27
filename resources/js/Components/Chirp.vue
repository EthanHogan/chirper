<script setup>
import { onMounted, ref } from "vue";
import { Link } from "@inertiajs/vue3";
import HeartOutline from "vue-material-design-icons/HeartOutline.vue";
import ChartBar from "vue-material-design-icons/ChartBar.vue";
import MessageOutline from "vue-material-design-icons/MessageOutline.vue";
import RepeatVariant from "vue-material-design-icons/RepeatVariant.vue";
import DotsHorizontal from "vue-material-design-icons/DotsHorizontal.vue";
import TrashCanOutline from "vue-material-design-icons/TrashCanOutline.vue";

defineProps({ chirp: Object });

let openOptions = ref(false);
</script>

<template>
    <div class="min-w-[60px]">
        <img class="m-2 mt-3 rounded-full" width="50" :src="chirp.image" alt="chirp image" />
    </div>
    <div class="w-full p-2">
        <div class="font-extrabold flex item-center justify-between mt-0.5 mb-1.5">
            <div class="flex items-center">
                <div>{{ chirp.name }}</div>
                <span class="font-[300] text-[15px] text-gray-500 pl-2">{{ chirp.handle }}</span>
            </div>
            <div class="relative rounded-full cursor-pointer hover:bg-gray-880">
                <button type="button" class="block p-2">
                    <DotsHorizontal @click="openOptions = !openOptions" />
                </button>
            </div>
        </div>
        <div class="pb-3">{{ chirp.chirp }}</div>

        <div v-if="chirp.file">
            <div v-if="!chirp.is_video" class="rounded-xl">
                <img :src="chirp.file" class="object-fill w-full mt-2 rounded-xl" />
            </div>
            <div v-else>
                <video class="rounded-xl" :src="chirp.file" controls></video>
            </div>
        </div>

        <div class="flex items-center justify-between w-4/5 mt-4">
            <div class="flex">
                <MessageOutline fillColor="#5e5c5c" :size="18" />
                <span class="text-xs dont-extrabold text-[#5e5c5c] ml-3">{{ chirp.comments }}</span>
            </div>
            <div class="flex">
                <RepeatVariant fillColor="#5e5c5c" :size="18" />
                <span class="text-xs dont-extrabold text-[#5e5c5c] ml-3">{{ chirp.rechirps }}</span>
            </div>
            <div class="flex">
                <HeartOutline fillColor="#5e5c5c" :size="18" />
                <span class="text-xs dont-extrabold text-[#5e5c5c] ml-3">{{ chirp.likes }}</span>
            </div>
            <div class="flex">
                <ChartBar fillColor="#5e5c5c" :size="18" />
                <span class="text-xs dont-extrabold text-[#5e5c5c] ml-3">{{ chirp.analytics }}</span>
            </div>
        </div>
    </div>
</template>
