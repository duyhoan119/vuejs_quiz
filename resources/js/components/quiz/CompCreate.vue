<template>
    <div>
        <div class="space-y-4">
            <p class="text-black text-2xl font-semibold uppercase text-center">Create new Quiz</p>
            <form action="" class="space-x-4 space-y-4">
                <label for="name">Name</label>
                <input class="border border-solid rounded-md px-2" id="name" type="text" v-model="name"
                    placeholder="enter subject name ...">
                <label for="name">Subject</label>
                <select v-model="subjectId" id="">
                    <option v-for="subject in subjects" v-bind="subject.id" v-bind:key="subject.id">{{ subject.name }}
                    </option>
                </select>
                <div class="space-x-4">
                    <button class="border border-solid rounded-full px-2" type="button">Submit</button>
                    <button class="border border-solid rounded-full px-2" type="button">Cancle</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import createQuesion from '../quesion/CompCreate.vue';
export default {
    name: 'comp-add',
    components: {
        createQuesion
    },
    data() {
        return {
            quesionCount: 0,
            subjects: [],
            subjectId: {
                type: Number
            },
            name: '',
            quesions: false
        }
    },
    created() {
        this.getSubject()
    },
    methods: {
        creareNew() {
            axios.post('api/quiz', { name: this.name, subjectId: this.subjectId }).then(res => {
                alert('tao thanh cong')
            })
        },
        getSubject() {
            axios.get('api/subject').then(res => {
                this.subjects = res.data
            })
        },
        rederQuesion() {
            this.quesions = true
        }
    }
}
</script>
