<template>
    <p>Subject list</p> 
    <div class="grid grid-cols-12 space-x-4">
        <div class="col-span-8">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b-2 text-center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="subject in subjects" class="border-b-2 text-center">
                        <td>{{subject.id}}</td>
                        <td>{{subject.name}}</td>
                        <td class="space-x-2 my-2">
                            <button v-on:click="changeIsAction()" class="border border-solid rounded-md px-2 bg-yellow-500">Edit</button>
                            <button v-on:click="destroy(subject.id)" class="border border-solid rounded-md px-2 bg-red-500">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
    
        </div>
        <div class="col-span-4">
             <CompCreate v-if="isAction"></CompCreate>
             <CompEdit v-else></CompEdit>
            
        </div>
    </div>
</template>

<script>
import CompCreate from './CompCreate.vue';
import CompEdit from './CompEdit.vue';
export default {
    name: 'comp-list-subject',
    components: {
        CompCreate,
        CompEdit
    },
    data() {
        return {
            subjects:[],
            isAction: true
        }
    },
    created(){
        axios.get('api/subject').then(res=>{
            this.subjects = res.data;
        })
    },computed:{
        Action(){

        }
    },methods:{
        changeIsAction(){
           this.isAction = !this.isAction
        },
        destroy(id){
            let url = 'api/subject/'+id;
            axios.delete(url).then(res=>{
            this.subjects = res.data;
        })
        }
    }
}
</script>
