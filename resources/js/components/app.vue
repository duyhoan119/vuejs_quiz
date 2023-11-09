<template>
    <div>
        <CompHerder />
        <div class="max-w-7xl mx-auto">
            <test />
        </div>
        <CompFooter />
    </div>
</template>

<script>
import test from './test/test.vue';
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
        CompQuiz,
        test
    },
    computed: {
        showComp() {

        }
    },
    methods: {

    }

}
</script>