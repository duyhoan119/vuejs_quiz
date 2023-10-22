<template>
    <div>
        <div class="space-y-4">
            <p class="text-black text-2xl font-semibold uppercase text-center">Edit new subject</p>
            <form action="" class="space-x-4 space-y-4">
                <label for="name">Name</label>
                <input class="border border-solid rounded-md px-2" id="name" type="text" v-model="name"
                    placeholder="enter subject name ...">
                <div class="space-x-4">
                    <button class="border border-solid rounded-full px-2" type="button">Submit</button>
                    <button class="border border-solid rounded-full px-2" type="button">Cancle</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'comp-create',
    data() {
        return {
            name: ''
        }
    },
    methods:{
        // save() {
        //     axios.put('api/subject/'+this.id, { name: this.name }).then(res => {
        //         alert('cap nhat thanh cong')
        //     })
        // }
    }
}
</script>
