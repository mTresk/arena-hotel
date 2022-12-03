<template>
    <form :class="{disabled: isSending}" @submit.prevent="handleSubmit" action="#" class="room__form room-form">
        <div v-if="isSending" class="spinner"></div>
        <h3 class="room-form__title">Оставить отзыв</h3>
        <div v-if="isSuccess" class="room-form__success">Спасибо, ваш отзыв будет опубликован после проверки на спам!</div>
        <div v-if="errors.username" class="contacts-form__error">{{ errors.username[0] }}</div>
        <div class="room-form__input">
            <input v-model="payload.username" autocomplete="off" type="text" name="username" placeholder="Ваше имя"/>
        </div>
        <div v-if="errors.review" class="contacts-form__error">{{ errors.review[0] }}</div>
        <div class="room-form__input">
            <textarea v-model="payload.review" rows="4" autocomplete="off" name="review" placeholder="Ваш отзыв"></textarea>
        </div>
        <div class="room-form__rate">
            Ваша оценка
        </div>
        <div class="room-form__rating rating rating--form rating_set">
            <div class="rating__body">
                <div class="rating__active"></div>
                <div class="rating__items">
                    <input v-model="payload.rating" type="radio" class="rating__item" value="1" name="rating"/>
                    <input v-model="payload.rating" type="radio" class="rating__item" value="2" name="rating"/>
                    <input v-model="payload.rating" type="radio" class="rating__item" value="3" name="rating"/>
                    <input v-model="payload.rating" type="radio" class="rating__item" value="4" name="rating"/>
                    <input v-model="payload.rating" type="radio" class="rating__item" value="5" name="rating"/>
                </div>
            </div>
            <div class="rating__value">{{ payload.rating }}</div>
        </div>
        <button type="submit" class="room-form__button">Отправить</button>
    </form>
</template>

<script setup>
import {ref} from "vue";
import axios from "axios";

const props = defineProps({
    room_id: Number
})

const payload = ref({
    username: '',
    review: '',
    rating: 5,
    room_id: props.room_id
})

const errors = ref([])

const isSending = ref(false)
const isSuccess = ref(false)

const handleSubmit = () => {
    isSending.value = true
    isSuccess.value = false

    console.log(payload.value)

    axios.post('/comment', payload.value)
        .then(response => {
            if (response.status === 200) {
                isSending.value = false
                isSuccess.value = true
                payload.value = {
                    username: '',
                    review: '',
                    rating: 5,
                }
                errors.value = []
            }
        })
        .catch(e => {
            console.log(e)
            if (e) {
                isSending.value = false
            }
            errors.value = e.response.data.errors
        })
}
</script>

<style lang="scss" scoped>
.disabled {
    pointer-events: none;

    &::before {
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #0d0a0a;
        opacity: 0.2;
        content: '';
        border-radius: 6px;
    }
}


.spinner {
    position: absolute;
    z-index: 10;
    top: 35%;
    left: 50%;
    color: #a63d4d;
    font-size: 20px;
    margin: 100px auto;
    width: 1em;
    height: 1em;
    border-radius: 50%;
    text-indent: -9999em;
    animation: load4 1.3s infinite linear;
    transform: translateX(-50%);
}

@-webkit-keyframes load4 {
    0%,
    100% {
        box-shadow: 0 -3em 0 0.2em, 2em -2em 0 0em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 0;
    }
    12.5% {
        box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
    }
    25% {
        box-shadow: 0 -3em 0 -0.5em, 2em -2em 0 0, 3em 0 0 0.2em, 2em 2em 0 0, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
    }
    37.5% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
    }
    50% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
    }
    62.5% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
    }
    75% {
        box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
    }
    87.5% {
        box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
    }
}

@keyframes load4 {
    0%,
    100% {
        box-shadow: 0 -3em 0 0.2em, 2em -2em 0 0em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 0;
    }
    12.5% {
        box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
    }
    25% {
        box-shadow: 0 -3em 0 -0.5em, 2em -2em 0 0, 3em 0 0 0.2em, 2em 2em 0 0, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
    }
    37.5% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
    }
    50% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
    }
    62.5% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
    }
    75% {
        box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
    }
    87.5% {
        box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
    }
}
</style>
