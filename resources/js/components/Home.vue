<template>
    <div class="grid grid-cols-10 space-x-2">
        <div v-for="subject in subjects" v-on:click="handleAction(subject.id, 'quiz')"
            class="col-span-2 p-4 border border-solid border-black rounded-md">
            <p class="text-center">{{ subject.name }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'comp-home',
    data() {
        return {
            subjects: []
        }
    },
    created() {
        this.getSubject()
    },
    methods: {
        getSubject() {
            axios.get('api/subject').then(res => {
                this.subjects = res.data
            })
        },
        handleAction(id, key) {
            this.$emit('handleAction', id, key)
        }
    }
}
</script>