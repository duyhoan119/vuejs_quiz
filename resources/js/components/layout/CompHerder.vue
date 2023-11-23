<template>
    <section class="mx-auto border-b-2 mb-5">
        <div class="flex justify-between items-center py-1">
            <div class="flex justify-center items-center space-x-4">
                <p class="text-black font-semibold text-2xl">VUEJS QUIZ</p>
                <input class="border border-solid rounded-full px-2" type="text" placeholder="Find a quiz ...">
            </div>
            <div>
                <ul class="flex items-center space-x-4">
                    <li v-on:click="changeView('home')">Home</li>
                    <li v-on:click="changeView('subject')">Subject</li>
                    <li v-on:click="changeView('quiz')">Quiz</li>
                    <li v-on:click="changeView('quesion')">Quesion</li>
                    <li v-on:click="changeView('answer')">Answer</li>
                    <li v-on:click="changeView('history')">History</li>
                </ul>
            </div>
            <div class="flex items-center space-x-4">
                <button class="border border-solid rounded-md px-2 bg-white" type="button">Login</button>
                <button class="border border-solid rounded-md px-2 bg-cyan-600" type="button">Sign up</button>
                <button class="border border-solid rounded-md px-2 bg-orange-600" type="button">Log out</button>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'comp-header',
    emits:['change-view-event'],
    data() {
        return {
        }
    },
    methods:{
        changeView(key){
            this.$emit('changeViewEvent',key)
        }
    }
}
</script>
