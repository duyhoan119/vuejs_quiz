<template>
    <p class="text-center text-3xl font-semibold mt-4">{{ quiz.name }}</p>
    <span v-if="isSubmit">Điểm của bạn là :{{ totallScore }}</span>
    <!-- <p class="text-2xl font-semibold">Time: {{ quiz.time }}</p> --> 
    <div v-for="quesion, index in quiz.quesion" class="space-x-4 space-y-1  mt-2">
        <p class="text-xl font-semibold">{{ index + 1 + '. ' + quesion.content }} ?</p>
        <div v-for="answer in quesion.answer" class="border border-solid rounded-md p-2">
            <input v-bind:name="quesion.id" v-bind:id="answer.id" type="radio"
                v-on:click="handerAnswered(quesion.id, answer.id)">
            <label v-bind:for="answer.id">{{ answer.content }}</label>
        </div>
    </div>
    <div>
        <button v-if="isSubmit == false" v-on:click="submit()"
            class="bg-white border border-solid my-2 p-2 rounded-md font-semibold" type="button">Submit</button>
        <button v-if="isSubmit" v-on:click="close()" class="bg-white border border-solid my-2 p-2 rounded-md font-semibold"
            type="button">Close</button>
    </div>
</template>

<script>

export default {
    name: 'test',
    data() {
        return {
            quiz: [],
            submitData: {},
            answered: {},
            scores: 0,
            quesioned: 0,
            totallScore: 0,
            isSubmit: false
        }
    },
    props: {
        id: {
            type: Number,
            required: true
        }
    },
    created() {
        this.getQuiz()
    }, computed: {
        countScores() {
            this.scores = this.poin * this.correctAnswer
        }
    },
    methods: {
        getQuiz() {
            axios.get('api/quiz/' + this.id).then(res => {
                this.quiz = res.data
            })
        },
        handerAnswered(quesionId, answerId) {
            if (this.answered.length == 0) {
                this.answered[quesionId] = answerId
            }
            if (quesionId in this.answered) {
                if (this.answered[quesionId] != answerId) {
                    this.answered[quesionId] = answerId
                }
            }
            else {
                this.answered[quesionId] = answerId
            }
        },
        close() {
            this.$emit('close')
        }
        ,
        submit() {
            if (confirm('bạn chắc chắn muốn nộp bài thi ?')) {
                this.isSubmit = true;
                this.quiz.quesion.forEach((a) => {
                    a.answer.forEach((answer) => {
                        if (answer.id == this.answered[a.id]) {
                            if (answer.is_corect == 1) {
                                this.totallScore += a.point
                                this.quesioned++
                            }
                        }
                    })
                })
                if (this.quesioned < this.quiz.quesion.length / 2) {
                    if (confirm('sô điểm của bạn là: ' + this.totallScore + ' không đủ điều kiện hoàn thành bài thi. bạn có muốn làm lại bài thi này không?')) {
                        location.reload()
                    }
                }
            }
            this.submitData['quiz_id'] = this.quiz.id;
            this.submitData['user_id'] = 1;
            this.submitData['score'] = this.totallScore;
            this.submitData['quesion_answered'] = JSON.stringify(this.answered);
            this.saveTest()
        },
        saveTest() {
            axios.post('api/quized', this.submitData).then(res => {
                alert('lưu bài thành công')
            })
        }
    }
}
</script>
