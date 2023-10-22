<template>
    <div>
        <CompHerder></CompHerder>
        <div class="max-w-7xl mx-auto">
            <CompSubject></CompSubject>
        </div>
        <CompFooter></CompFooter>
    </div>
</template>

<script>
import CompHerder from './layout/CompHerder.vue';
import CompFooter from './layout/CompFooter.vue';
import CompSubject from './subject/ListComp.vue';
import CompQuiz from './quiz/CompList.vue';
export default {
    name: 'app',
    data() {
        return {
            Comp:''
        };
    },
    components: {
        CompHerder,
        CompFooter,
        CompSubject,
        CompQuiz
    },
    computed: {
        showComp() {

        }
    },
    methods: {

    }

}
</script>