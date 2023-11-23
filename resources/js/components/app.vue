<template>
    <CompHerder v-if="isView != 'test'" v-on:change-view-event="handleView" />
    <div class="max-w-7xl mx-auto">
        <CompSubject v-if="isView == 'subject'" />
        <CompQuiz v-bind:id="id" v-on:detailQuiz="action" v-on:actionQuiz="action" v-if="isView == 'quiz'" />
        <CompQuesion v-if="isView == 'quesion'" />
        <CompAnswer v-if="isView == 'answer'" />
        <CompHistory v-if="isView == 'history'" />
        <CompTest v-bind:id="id" v-on:close="close" v-if="isView == 'test'" />
        <CompHome v-on:handleAction="action" v-if="isView == 'home'" />
    </div>
    <CompFooter v-if="isView != 'test'" />
</template>

<script>
import CompTest from './test/test.vue';
import CompHerder from './layout/CompHerder.vue';
import CompFooter from './layout/CompFooter.vue';
import CompSubject from './subject/ListComp.vue';
import CompQuiz from './quiz/CompList.vue';
import CompQuesion from './quesion/CompList.vue';
import CompAnswer from './answer/CompList.vue';
import CompHistory from './history/CompList';
import CompHome from './Home.vue';
export default {
    name: 'app',
    data() {
        return {
            isView: 'home',
            id: 0
        };
    },
    components: {
        CompHerder,
        CompFooter,
        CompSubject,
        CompQuiz,
        CompQuesion,
        CompAnswer,
        CompTest,
        CompHistory,
        CompHome
    },
    methods: {
        handleView(key) {
            this.isView = key
        },
        action(id, key) {
            this.id = id
            this.isView = key
        }, close() {
            this.isView = 'home'
        }
    }

}
</script>