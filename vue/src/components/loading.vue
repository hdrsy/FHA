<template>
    <div v-if="loading" class="loading-indicator">
        <i class="fa fa-4xl fa-refresh fa-spin text-black" />
    </div>
</template>
<script>
import { mapState } from "pinia";
import { useAppStore } from "../store";

export default {
    computed: {
        ...mapState(useAppStore, ["loading"]),
    },
    watch: {
        loading(value) {
            if (value) {
                document.body.style.overflow = "hidden";
            } else {
                document.body.style.overflow = "scroll";
            }
        },
    },
};
</script>
<style scoped>
.loading-indicator {
    background: #999;
    opacity: 0.7;
    position: fixed;
    bottom: 0;
    right: 0;
    height: 90vh;
    width: 80vw;
    z-index: 1000;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}
.loading-indicator .fa {
    font-size: 10em;
}
</style>
