<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import Twitter from "vue-material-design-icons/Twitter.vue";
import Magnify from "vue-material-design-icons/Magnify.vue";
import DotsHorizontal from "vue-material-design-icons/DotsHorizontal.vue";
import DotsVertical from "vue-material-design-icons/DotsVertical.vue";
import Feather from "vue-material-design-icons/Feather.vue";
import Close from "vue-material-design-icons/Close.vue";
import ChevronDown from "vue-material-design-icons/ChevronDown.vue";
import Earth from "vue-material-design-icons/Earth.vue";
import ImageOutline from "vue-material-design-icons/ImageOutline.vue";
import FileGifBox from "vue-material-design-icons/FileGifBox.vue";
import Emoticon from "vue-material-design-icons/Emoticon.vue";
import ArrowLeft from "vue-material-design-icons/ArrowLeft.vue";
import MenuItem from "@/Components/MenuItem.vue";

let createChirp = ref(false);
let textarea = ref(null);
let chirp = ref("");
let file = ref("");
let showUpload = ref("");
let uploadType = ref("");
let randImg1 = ref(`https://picsum.photos/id/${(Math.random() * 200).toFixed(0)}/100`);
let randImg2 = ref(`https://picsum.photos/id/${(Math.random() * 200).toFixed(0)}/100`);

const getFile = (e) => {
    file.value = e.target.files[0];
    showUpload.value = URL.createObjectURL(e.target.files[0]);
    uploadType.value = file.value.type.split(".").pop();
};

const closeMessageBox = () => {
    createChirp.value = false;
    chirp.value = "";
    showUpload.value = "";
    uploadType.value = "";
    file.value = "";
};

const textareaInput = (e) => {
    textarea.value.style.height = "auto";
    textarea.value.style.height = `${textarea.value.scrollHeight}px`;
};
</script>

<template>
    <div class="fixed w-full">
        <div class="max-w-[1400] flex mx-auto">
            <div class="lg:w-3/12 w-[60px] h-[100vh] max-w-[350px] lg:px-4 lg:mx-auto">
                <div class="p-2 px-3 mb-4">
                    <Twitter fillColor="#FFFFFF" :size="37" />
                </div>
                <MenuItem iconString="Home" />
                <MenuItem iconString="Explore" />
                <MenuItem iconString="Notifications" />
                <MenuItem iconString="Messages" />
                <MenuItem iconString="Profile" />

                <button
                    @click="createChirp = true"
                    class="lg:w-full mt-8 ml-2 text-white font-extrabold text-[22px] bg-[#1C9CEF] p-3 px-3 rounded-full cursor-pointer"
                >
                    <span class="hidden lg:block">Chirp</span>
                    <span class="block lg:hidden"><Feather /></span>
                </button>
            </div>

            <div class="relative w-11/12 border-gray-800 lg:w-7/12 border-x">
                <div class="absolute z-10 w-full bg-black bg-opacity-50 backdrop-blur-md">
                    <div class="w-full border-b border-gray-800">
                        <div class="w-full text-white text-[22px] font-extrabold p-4">Home</div>
                        <div class="flex">
                            <div
                                class="flex items-center justify-center w-full h-[60px] text-white text-[17px] font-extrabold p-4 hover:bg-gray-500 hover:bg-opacity-30 cursor-pointer transition duration-200 ease-in-out"
                            >
                                <div class="inline-block text-center border-b-4 border-b-[#1C9CEF] h-[60px]">
                                    <div class="my-auto mt-4">For you</div>
                                </div>
                            </div>
                            <div
                                class="w-full h-[60px] text-gray-500 text-[17px] font-extrabold p-4 hover:bg-gray-500 hover:bg-opacity-30 cursor-pointer transition duration-200 ease-in-out"
                            >
                                <div class="text-center">Following</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute top-0 z-0 h-full overflow-auto scrollbar-hide">
                <div class="mt-[126px]"></div>
                <slot />
                <div class="pb-4"></div>
            </div>

            <div class="hidden h-screen pl-4 border-l border-gray-800 lg:block lg:w-4/12">
                <div class="w-full p-1 mt-2 px-4 lg:flex items-center rounded-full hidden bg-[#212327]">
                    <Magnify fillColor="#5e5c5c" :size="25" />
                    <input
                        class="appearance-none w-full border-0 py-2 bg-[#212327] text-gray-100 placeholder-gray-500 leading-tight focus:ring-0"
                        type="text"
                        placeholder="Search Chirper"
                    />
                </div>
                <div class="w-full mt-4 rounded-lg lg:block hidden bg-[#212327]">
                    <div class="w-full p-4 text-white font-extrabold mb-6 text-[20px]">What's happening</div>

                    <div class="h-[80px] hover:bg-gray-800 cursor-pointer transition duration-200 ease-in-out">
                        <div class="flex p-3 justify-between h-[80px] py-3">
                            <div>
                                <div class="text-[14px] text-gray-400">Tennis Tournament LIVE</div>
                                <div class="w-full text-white font-extrabold mb-6 text-[17px]">
                                    Australian Open 2023
                                </div>
                            </div>
                            <img class="rounded-xl" :src="randImg2" alt="" />
                        </div>
                    </div>

                    <div class="h-[80px] hover:bg-gray-800 cursor-pointer transition duration-200 ease-in-out">
                        <div class="flex p-3 justify-between h-[80px] py-3">
                            <div>
                                <div class="text-[14px] text-gray-400">Formula 1 · Trending</div>
                                <div class="w-full text-white font-extrabold mb-6 text-[17px]">
                                    Monaco Grand Prix 2023
                                </div>
                            </div>
                            <img
                                class="rounded-xl"
                                src="https://pbs.twimg.com/semantic_core_img/1530954945821745152/0hbUSoVL?format=jpg&name=small"
                                alt=""
                            />
                        </div>
                    </div>

                    <div class="transition duration-200 ease-in-out cursor-pointer hover:bg-gray-800">
                        <div class="flex justify-between p-3">
                            <div>
                                <div class="text-[14px] text-gray-400">Trending in the United States</div>
                                <div class="w-full text-white font-extrabold text-[17px]">Doomsday Clock</div>
                                <div class="text-[14px] text-gray-400">4,682 Chirps</div>
                            </div>
                            <DotsHorizontal fillColor="#5e5c5c" />
                        </div>
                    </div>

                    <div class="transition duration-200 ease-in-out cursor-pointer hover:bg-gray-800">
                        <div class="flex justify-between p-3">
                            <div>
                                <div class="text-[14px] text-gray-400">Gaming · Trending</div>
                                <div class="w-full text-white font-extrabold text-[17px]">Bungie</div>
                                <div class="text-[14px] text-gray-400">12.7k Chirps</div>
                            </div>
                            <DotsHorizontal fillColor="#5e5c5c" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        id="OverlaySection"
        v-if="createChirp"
        class="fixed top-0 left-0 w-full h-screen bg-black md:bg-gray-400 md:bg-opacity-30 md:p-3"
    >
        <div class="bg-black md:max-w-2xl md:mx-auto md:mt-10 md:rounded-xl">
            <div class="flex items-center justify-between p-2 m-2 rounded-full cursor-pointer md:inline-block">
                <div @click="closeMessageBox()" class="inline-block p-2 rounded-full cursor-pointer hover:bg-gray-800">
                    <Close fillColor="#FFFFFF" :size="28" class="hidden md:block" />
                    <ArrowLeft fillColor="#FFFFFF" :size="28" class="block md:hidden" />
                </div>
                <button
                    :disabled="!chirp"
                    :class="chirp ? 'bg-[#1C9CEF] text-white' : 'bg-[#124077] text-gray-400'"
                    class="md:hidden font-extrabold text-[16px] p-1.5 px-4 rounded-full cursor-pointer"
                >
                    Chirp
                </button>
            </div>

            <div class="flex w-full">
                <div class="ml-3.5 mr-2">
                    <img class="rounded-full" width="55" :src="randImg1" alt="random image" />
                </div>
                <div class="w-[calc(100%-100px)]">
                    <div class="inline-block">
                        <div class="flex items-center border border-gray-700 rounded-full">
                            <span class="text-[#1C9CEF] p-0.5 pl-3.5 font-extrabold">Everyone</span>
                            <ChevronDown class="pr-2" fillColor="#1C9CEF" :size="25" />
                        </div>
                    </div>
                    <div>
                        <textarea
                            :onInput="textareaInput"
                            cols="30"
                            rows="4"
                            placeholder="What's happening?"
                            v-model="chirp"
                            ref="textarea"
                            class="w-full bg-black border-0 mt-2 focus:ring-0 text-white text-[19px] font-extrabold min-h-[120px]"
                        ></textarea>
                        <div class="w-full">
                            <video
                                controls
                                v-if="uploadType === 'mp4'"
                                :src="showUpload"
                                class="overflow-auto rounded-xl"
                            />
                            <img v-else :src="showUpload" class="min-w-full rounded-xl" />
                        </div>
                        <div class="flex py-2 items-center text-[#1C9CEF] font-extrabold">
                            <Earth class="pr-2" fillColor="#1C9CEF" :size="20" /> Everyone can reply
                        </div>
                        <div class="border-b border-b-gray-700"></div>
                        <div class="flex items=center justify-between py-2">
                            <div class="flex items-center">
                                <div class="inline-block p-2 rounded-full cursor-pointer hover:bg-gray-800">
                                    <label for="fileUpload" class="cursor-pointer">
                                        <ImageOutline fillColor="#1C9CEF" :size="25" />
                                    </label>
                                    <input type="file" id="fileUpload" class="hidden" @change="getFile" />
                                </div>
                                <div class="inline-block p-2 rounded-full cursor-pointer hover:bg-gray-800">
                                    <FileGifBox fillColor="#1C9CEF" :size="25" />
                                </div>
                                <div class="inline-block p-2 rounded-full cursor-pointer hover:bg-gray-800">
                                    <Emoticon fillColor="#1C9CEF" :size="25" />
                                </div>
                            </div>
                            <button
                                :disabled="!chirp"
                                :class="chirp ? 'bg-[#1C9CEF] text-white' : 'bg-[#124077] text-gray-400'"
                                class="hidden md:block font-extrabold text-[16px] p-1.5 px-4 rounded-full cursor-pointer"
                            >
                                Chirp
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
body {
    background-color: black;
}
</style>
