<template>
    <section class="max-w-7xl mx-auto border-b-2 mb-5">
        <div class="flex justify-between items-center py-1">
            <div class="flex justify-center items-center space-x-4">
                <p class="text-black font-semibold text-2xl">VUEJS QUIZ</p>
                <input class="border border-solid rounded-full px-2" type="text" placeholder="Find a quiz ...">
            </div>
            <div>
                <ul class="flex items-center space-x-4">
                    <li>Home</li>
                    <li>Subject</li>
                    <li>Class</li>
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
    data() {
        return {

        }
    }
}
</script>
