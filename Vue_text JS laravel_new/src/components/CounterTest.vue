<template>
    <div class="items">
        Имя <input v-model="name" />
        <br />
        Баланс <input v-model="num" />
        <br />
        <button class="clicks jump" @click="onSend">Send</button>
        <div v-for="input in inputs" :key="input">
            Изменение
            <br />
            {{ nowText.name }}
            <input v-model="changeName" />
            <br />
            {{ nowText.balance }}
            <input v-model="changeBalance" />
            <br />
            <button class="clicks" @click="changeValues(nowID)">Change</button>
        </div>
        <li v-for="item in items" :key="item.id">
            Пользователь <b>{{ item.name }}</b>
            <br />
            Баланс <b>{{ item.balance }}</b> руб.
            <br />
            <button class="clicks" @click="onDelete(item.id)">Delete</button>
            <button class="clicks" @click="pushInput(item.id)">Edit</button>
        </li>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref } from "vue";

// let text = ref("");
let name = ref(null);
let num = ref(null);

let items = ref(null);

let inputs = ref(null);

let changeName = ref(null);
let changeBalance = ref(null);

let nowID = ref(null);
let nowText = ref(null);

const onSend = async () => {
    await axios.post("send", {
        aSendText: name.value,
        aBalance: num.value || 0,
    });
    update();
};

const update = async () => {
    let { data } = await axios.get("update");
    items.value = data;
};

async function onDelete(id) {
    await axios.delete("delete", {
        params: { aDeleteID: id },
    });
    update();
}

async function pushInput(id) {
    inputs.value = 0;
    nowID = id;
    textFinder(id);

    inputs.value = 1;
}

async function changeValues(id) {
    await axios.post("change", {
        idText: id,
        changeText: changeName.value || false,
        changeBal: changeBalance.value || false,
    });

    inputs.value = 0;
    changeName.value = null;
    update();
}

async function textFinder(id) {
    let { data } = await axios.post("text", {
        idText: id,
    });

    nowText.value = data;

    update();
}

update();
</script>

<style>
.items {
    margin-left: 20px;
}
.answer {
    margin-left: 610px;
    width: 180px;
    height: 200px;
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
    width: 70px;
    height: 30px;
}
.jump {
    margin-bottom: 50px;
}
</style>
