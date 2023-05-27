<template>
    <div
        class="w-full p-2 px-4 transition duration-200 ease-in-out rounded-full cursor-pointer lg:inline-block hover:bg-gray-900 lg:pr-6"
    >
        <div class="flex items-center">
            <component :is="icon" fillColor="#FFFFFF" :size="30" />
            <span
                class="lg:block hidden text-white font-extrabold text-[23px] pl-4 mt-0.5"
            >
                {{ iconString }}
            </span>
        </div>
    </div>
</template>

<script setup>
import { toRefs } from "vue";
import Home from "vue-material-design-icons/Home.vue";
import Pound from "vue-material-design-icons/Pound.vue";
import BellOutline from "vue-material-design-icons/BellOutline.vue";
import EmailOutline from "vue-material-design-icons/EmailOutline.vue";
import AccountOutline from "vue-material-design-icons/AccountOutline.vue";

const props = defineProps({
    iconString: String,
});

const { iconString } = toRefs(props);

let icon = null;

switch (iconString.value) {
    case "Home":
        icon = Home;
        break;
    case "Explore":
        icon = Pound;
        break;
    case "Notifications":
        icon = BellOutline;
        break;
    case "Messages":
        icon = EmailOutline;
        break;
    case "Bookmarks":
        icon = AccountOutline;
        break;
    case "Lists":
        icon = AccountOutline;
        break;
    case "Profile":
        icon = AccountOutline;
        break;
    default:
        icon = Home;
        break;
}
</script>

<style lang="scss" scoped></style>
