<template>
    <p>Quiz list</p>
    <div class="grid grid-cols-12 space-x-4">
        <div class="col-span-8">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b-2 text-center">
                        <th>ID</th>
                        <th>Subject name</th>
                        <th>Quiz Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="quiz in quizs" class="border-b-2 text-center">
                        <td>{{ quiz.id }}</td>
                        <td>{{ quiz.subject.name }}</td>
                        <td>{{ quiz.name }}</td>
                        <td class="space-x-2 my-2">
                            <button v-on:click="changeIsAction(2)"
                                class="border border-solid rounded-md px-2 bg-yellow-500">Edit</button>
                            <button v-on:click="changeQuiz(quiz.id, 'test')"
                                class="border border-solid rounded-md px-2 bg-blue-500">Test</button>
                            <button v-on:click="detailQuiz(quiz.id, 'quesion')"
                                class="border border-solid rounded-md px-2 bg-green-500">View</button>
                            <button class="border border-solid rounded-md px-2 bg-red-500">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="col-span-4">
            <CompCreate v-if="isAction"></CompCreate>
            <CompEdit v-else></CompEdit>
        </div>
    </div>
</template>

<script>
import CompCreate from './CompCreate.vue';
import CompEdit from './CompEdit.vue';
export default {
    name: 'comp-list-quiz',
    components: {
        CompCreate,
        CompEdit,
    },
    props: {
        id: {
            type: Number,
            required: false
        }
    },
    data() {
        return {
            quizs: [],
            isAction: true
        }

    }, created() {
        if (this.id) {
            this.findSubject()
        }
        else {
            this.getQuiz()
        }
    },
    methods: {
        changeIsAction() {
            this.isAction = !this.isAction
        },
        getQuiz() {
            axios.get('api/quiz').then(res => {
                this.quizs = res.data
            })
        },
        findSubject() {
            axios.get('api/quiz/subject/' + this.id).then(res => {
                this.quizs = res.data
            })
        },
        changeQuiz(id, key) {
            this.$emit('actionQuiz', id, key)
        },
        detailQuiz(id, key) {
            this.$emit('detailQuiz', id, key)
        }
    }
}
</script>
