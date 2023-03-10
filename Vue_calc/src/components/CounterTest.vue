<template>
    <div class="items">
        <input v-model="num1" /> + <input v-model="num2" />
        <br />
        <div class="answer">{{ num_plus }}</div>
        <div class="buttons">
            <button class="clicks" @click="onClickPlus">+</button>
            <button class="clicks" @click="onClickMinus">-</button>
            <button class="clicks" @click="onClickDev">*</button>
            <button class="clicks" @click="onClickSep">/</button>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref } from "vue";

// let text = ref("");
let num_plus = ref(null);
let num1 = ref(null);
let num2 = ref(null);
const onClickPlus = async () => {
    let { data } = await axios.get("plus", {
        params: {
            str1: num1.value,
            str2: num2.value,
        },
    });
    num_plus.value = data;
};

const onClickMinus = async () => {
    let { data } = await axios.post("minus", {
        str1: num1.value,
        str2: num2.value,
    });
    num_plus.value = data;
};

const onClickDev = async () => {
    let { data } = await axios.post("dev", {
        str1: num1.value,
        str2: num2.value,
    });
    num_plus.value = data;
};

const onClickSep = async () => {
    let { data } = await axios.post("sep", {
        str1: num1.value,
        str2: num2.value,
    });
    num_plus.value = data;
};
</script>

<style>
.items {
    margin-left: 20px;
}
.answer {
    margin-left: 44.6%;
    width: 150px;
    height: 20px;
    border: 1px solid black;
    border-radius: 5px;
}
.buttons {
    margin-right: 0px;
}
.clicks {
    font-size: medium;
    font-weight: bold;
    margin: 5px;
    background: white;
    border: 1px solid red;
    border-radius: 10px;
    width: 30px;
    height: 30px;
}
</style>
