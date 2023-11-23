<template>
    <div class="my-2">
        <create></create>
        <!-- <p>Tạo câu hỏi</p>
        <form action="">
            <div>
                <label for="quiz">Quiz</label>
                <select id="quiz" v-model="quizId">
                    <option v-for="quiz in quizs" v-bind:value="quiz.id">{{ quiz.name }}</option>
                </select>
            </div>
            <div>
                <label for="content">Điểm</label>
                <input type="Number" id="content" v-model="point" rows="2"
                    class="min-w-full border border-solid rounded-md px-2 block" />
            </div>
            <div>
                <label for="content">Nội dung câu hỏi</label>
                <textarea type="text" id="content" v-model="content" rows="2"
                    class="min-w-full border border-solid rounded-md px-2 block" />
            </div>
            <button type="button" v-on:click="createQuesion()">Submit</button>
        </form> -->
    </div>
</template> 

<script>
import create from '../answer/CompCreate.vue'
export default {
    name: 'comp-create-quesion',
    data() {
        return {
            quizs: [],
            quizId: 0,
            point:0,
            content: ''
        }
    },
    created() {
        this.getQuiz()
    },
    methods: {
        getQuiz() {
            axios.get('api/quiz').then(res => {
                this.quizs = res.data
            })
        },
        createQuesion() {
            axios.post('api/quesion',{
                'quiz_id':this.quizId,
                'content':this.content,
                'point':this.point
            }).then(res=>{

            })
        }
    },
    components:{
        create
    }
}
</script>
