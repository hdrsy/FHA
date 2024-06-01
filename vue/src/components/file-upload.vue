<template>
    <div class="form-group d-flex flex-column">
        <label class="form-label">{{ label }}</label>
        <input
            type="file"
            class="hidden"
            ref="inputRef"
            @change="(e) => changePhoto(e)"
        />

        <button
            class="btn btn-primary"
            type="button"
            @click.prevent="fileSelector()"
        >
            <i class="fa fa-upload" /> &nbsp; upload
        </button>
        <img ref="imgRef" class="my-2 rounded-4" />
    </div>
</template>
<script>
export default {
    name: "FileUpload",
    props: ["file", "label"],
    emits: ["update-file", "update-files"],
    mounted() {
        this.$refs.imgRef.src = this.file;
    },
    methods: {
        fileSelector() {
            if (this.$refs.inputRef != null) this.$refs.inputRef.click();
        },
        changePhoto(e) {
            this.handlePhoto(e, (files) => {
                if (files.length > 1) {
                    this.$emit("update-files", files);
                } else {
                    this.$emit("update-file", files[0]);
                }
            });
        },
        handlePhoto(fileChange, callback) {
            if (fileChange.target.files.length) {
                // setting up the reader
                let reader = new FileReader();
                reader.readAsDataURL(fileChange.target?.files[0]); // this is reading as data url

                reader.onload = (readerEvent) => {
                    this.$refs.imgRef.src = readerEvent.target?.result; // this is the content!
                    callback(fileChange.target.files);
                };
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
