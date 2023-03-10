<template>
    <div class="items">
        <input v-model="num" />
        <br />
        <div class="answer">{{ num_plus }}</div>
        <button class="clicks" @click="onClick">Click</button>
    </div>
</template>

<script setup>
import { ref } from "vue";

let num_plus = ref(null);
let num = ref(null);

const onClick = async () => {
    let data = {
        upper: 0,
        lowwer: 0,
    };
    for (let i = 0; i < num.value.length; i++) {
        if (num.value[i].toUpperCase() == num.value[i]) {
            data.upper++;
        }
    }

    data.lowwer = num.value.length - data.upper;

    num_plus.value = data;
};
</script>

<style>
.items {
    margin-left: 20px;
}
.answer {
    margin-left: 44.1%;
    width: 150px;
    height: 50px;
    border: 1px solid black;
    border-radius: 5px;
}
.clicks {
    font-size: medium;
    font-weight: bold;
    margin: 5px;
    background: white;
    border: 1px solid red;
    border-radius: 10px;
    width: 60px;
    height: 30px;
}
</style>
