<template>
    <p>Tạo đáp án</p>
    <form action="">
        <div> 
            <select v-model="answer.quesion_id" id="">
                <option v-for="quesion in quesions" v-bind:value="quesion.id">{{quesion.content}}</option>
            </select>
        </div>
        <div>
            <label for="content">Nội dung đáp án</label>
            <input type="text" id="content" v-model="answer.content" class="border border-solid rounded-md px-2 block">
        </div>
        <div>
            <input v-model="answer.isCrect" id="iscorect" value="1" type="radio">
            <label for="iscorect">
                is corect 
            </label>
        </div>
        <div>
            <button v-on:click="createAnswer()" type="button" class="border border-solid rounded-md px-2 ">Submit</button>
        </div>
    </form>
</template>

<script>
export default {
    name: 'comp-create-answer',
    data() {
        return {
            quesions: [],  
            answer: {
                quesion_id: 0,
                content: '',
                isCrect: 0
            }
        }
    },
    created() {
        this.getQuesion()
    }, methods: {
        getQuesion() {
            axios.get('api/quesion').then(res=>{
                this.quesions = res.data
            })
        },
        createAnswer() {
            axios.post('api/answer',this.answer).then(res=>{
                console.log(res);
            })
        }
    }
}
</script>