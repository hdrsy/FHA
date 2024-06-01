<template>
    <div class="form-group d-flex flex-column">
        <label class="form-label">{{ label }}</label>
        <input
            type="file"
            class="hidden"
            ref="inputRef"
            @change="(e) => changePhoto(e)"
            multiple
        />
        <button
            class="btn btn-primary"
            type="button"
            @click.prevent="fileSelector()"
        >
            <i class="fa fa-upload" /> &nbsp; upload
        </button>
        <div v-if="imgs.length" class="d-flex flex-row gap-2 flex-wrap">
            <img
                v-for="(img, index) in imgs"
                :src="img"
                :key="index"
                ref="imgRef"
                class="m-1 rounded-3"
                style="width: 30%"
            />
        </div>
    </div>
</template>
<script>
export default {
    name: "FileUpload",
    props: ["files", "label"],
    emits: ["update-files"],
    data() {
        return {
            imgs: [],
        };
    },
    created() {
        this.imgs = this.files;
    },
    methods: {
        fileSelector() {
            if (this.$refs.inputRef != null) this.$refs.inputRef.click();
        },
        changePhoto(e) {
            this.handlePhoto(e, (files) => {
                if (files.length > 0) {
                    this.$emit("update-files", files);
                }
            });
        },
        handlePhoto(fileChange, callback) {
            if (fileChange.target.files.length) {
                // setting up the reader
                this.imgs = [];
                for (let file of fileChange.target?.files) {
                    let reader = new FileReader();
                    // this is reading as data url
                    reader.onload = (readerEvent) => {
                        this.imgs.push(readerEvent.target?.result); // this is the content!
                    };

                    reader.readAsDataURL(file); // this is reading as data url
                }
                callback(fileChange.target.files);
            }
        },
    },
};
</script>
<style scoped>
.hidden {
    display: none;
}
</style>
