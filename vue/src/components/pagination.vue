<template>
    <div class="d-flex gap-2 flex-row mb-30">
        <button
            @click.prevent="$emit('update-page', link.url)"
            v-for="(link, index) in links"
            :key="index"
            v-html="link.label"
            class="btn btn-outline-primary"
            :disabled="link.url == null"
            :class="{ active: link.active }"
        />
    </div>
</template>
<script>
export default {
    props: ["links"],
    emits: ["update-page"],
};
</script>
