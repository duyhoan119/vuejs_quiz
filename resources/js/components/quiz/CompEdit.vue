<template>
    <div>
        <div class="space-y-4">
            <p class="text-black text-2xl font-semibold uppercase text-center">Create new subject</p>
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
        name:'comp-edit',
        data() {
            return {
                name:''
            }
        },
    }
</script>
