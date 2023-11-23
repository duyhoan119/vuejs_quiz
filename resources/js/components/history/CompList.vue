<template>
    <p>History quized</p>
    <div class="min-w-full relative">
        <modalDetail v-on:close="close" v-if="isModal" v-bind:answered="answered" />
        <div class="grid grid-cols-12 space-x-4">
            <div class="col-span-12">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b-2 text-center">
                            <th>Name quiz</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="quized in quizeds" class="border-b-2 text-center">
                            <td>{{ quized.quiz.name }}</td>
                            <td>{{ quized.score }}</td>
                            <td class="space-x-2 my-2">
                                <button v-on:click="view(quized)"
                                    class="border border-solid rounded-md px-2 bg-green-500">View</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import modalDetail from './ModalDetail.vue';
export default {
    name: 'comp-list-history',
    components: {
        modalDetail
    },
    data() {
        return {
            quizeds: [],
            isModal: false,
            answered: []
        }
    },
    created() {
        this.getHistory()
    }, methods: {
        getHistory() {
            axios.get('api/history').then(res => {
                this.quizeds = res.data
            })
        }, view(quized) {
            this.answered['quesionAnsered'] = quized.quesion_answered
            this.answered['quizId'] = quized.quiz_id
            this.isModal = true
        },
        close(){
            this.isModal = false
        }
    }
}
</script>