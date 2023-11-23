<template>
    <p>Answer list</p>
    <div class="grid grid-cols-12 space-x-4">
        <div class="col-span-8">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b-2 text-center">
                        <th>ID</th>
                        <th>Quesion name</th>
                        <th>Content</th>
                        <th>Is Corect</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="answer in answers" class="border-b-2 text-center">
                        <td>{{ answer.id }}</td>
                        <td class="line-clamp-2">{{ answer.quesion.content }}</td>
                        <td>{{ answer.content }}</td>
                        <td>{{ answer.is_corect == 1?'True':'' }}</td>
                        <td class="space-x-2 my-2">
                            <button class="border border-solid rounded-md px-2 bg-yellow-500">Edit</button>
                            <button class="border border-solid rounded-md px-2 bg-red-500">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="col-span-4">

        </div>
    </div>
</template>

<script>
export default {
    name: 'comp-list-answer',
    data() {
        return {
            answers: [],
            
        }
    }, created() {
        this.getAnswer()
    }, methods: {
        getAnswer() {
            axios.get('api/answer').then(res => {
                this.answers = res.data
            })
        }
    }
}
</script>
