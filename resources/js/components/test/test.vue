<template>
    <span v-if="isSubmit">Điểm của bạn là :{{ totallScore }}</span>
    <p class="text-2xl font-semibold">{{ quiz.name }}</p>
    <p class="text-2xl font-semibold">Time: {{ quiz.time }}</p>
    <div v-for="quesion,index in quiz.quesion" class="space-x-4 space-y-1  mt-2">
        <p class="text-xl font-semibold">{{index+1 +'. '+ quesion.content }} ?</p>
        <div v-for="answer in quesion.answer" class="border border-solid rounded-md p-2">
            <input v-bind:name="quesion.id" type="radio" v-on:click="handerAnswered(quesion.id, answer.id)">
            <span>{{ answer.content }}</span>
        </div>
    </div>
    <div>
        <button v-if="isSubmit == false" v-on:click="submit()"
            class="bg-white border border-solid my-2 p-2 rounded-md font-semibold" type="button">Submit</button>
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
            poin: 0,
            totallScore: 0,
            isSubmit: false
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
            axios.get('api/quiz/1').then(res => {
                this.quiz = res.data
                console.log(Number(this.quiz.time));
                // console.log(Date.prototype.setMinutes(Number(this.quiz.time)));
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
        submit() {
            if (confirm('bạn chắc chắn muốn nộp bài thi ?')) {
                this.isSubmit = true;
                this.poin = 10 / this.quiz.quesion.length
                this.quiz.quesion.forEach((a) => {
                    a.answer.forEach((answer) => {
                        if (answer.id == this.answered[a.id]) {
                            if (answer.is_corect == 1) {
                                this.totallScore += this.poin
                            }
                        }
                    })
                })
                if (this.totallScore < 5) {
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
            axios.post('api/quized',this.submitData).then(res => {
                alert('lưu bài thành công')
            })
        }
    }
}
</script>
