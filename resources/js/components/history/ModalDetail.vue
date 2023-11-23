<template>
    <div class=" absolute z-10 inset-0 max-w-3/4 mx-auto bg-slate-200 rounded-lg p-4">
        <p class="text-center text-2xl font-semibold">Detail history</p>
        <div class="content-center">
            <div v-for="quesion, index in quesions" class="space-x-4 space-y-1  mt-2">
                <p class="text-xl font-semibold">{{ index + 1 + '. ' + quesion.content }} ?</p>
                <div v-for="answer in quesion.answer" class="border border-solid rounded-md p-2">
                    <label>{{ answer.content }}</label>
                </div>
            </div>
        </div>
        <button type="button" v-on:click="close">Cancle</button>
        <button type="button" v-on:click="log">LOg</button>
    </div>
</template>

<script>
export default {
    name: 'modal-detail',
    props: {
        answered: {
            required: true
        }
    },
    data() {
        return {
            quesions: [],
            quesioned:[]
        }
    },
    created() {
        this.getQuesion()
        this.changequesioned()
    },
    methods: {
        getQuesion() {
            axios.get('api/quesion/quized/'+this.answered.quizId).then(res=>{
                this.quesions = res.data
            })
        },
        changequesioned(){
            this.quesioned = JSON.parse(this.answered.quesionAnsered)
        },
        log(){
            console.log(this.quesioned);
        },
        close() {
            this.$emit('close')
        }
    }
}
</script>
