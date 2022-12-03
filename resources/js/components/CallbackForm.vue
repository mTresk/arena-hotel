<template>
    <div id="callback-form" aria-hidden="true" class="popup">
        <div class="popup__wrapper">
            <div class="popup__content">
                <div v-if="isSending" class="spinner"></div>
                <button data-close type="button" class="popup__close">X</button>
                <form :class="{disabled: isSending}" @submit.prevent="handleSubmit" class="popup__body callback-form">
                    <div class="callback-form__title">
                        Заказать звонок
                    </div>
                    <div v-if="errors.name" class="contacts-form__error">{{ errors.name[0] }}</div>
                    <div class="callback-form__input">
                        <label>
                            <input v-model="payload.name" autocomplete="off" type="text" name="name"
                                   placeholder="Ваше имя">
                        </label>
                    </div>
                    <div v-if="errors.phone" class="contacts-form__error">{{ errors.phone[0] }}</div>
                    <div class="callback-form__input">
                        <label>
                            <input v-model="payload.phone" autocomplete="off" type="text" name="phone"
                                   placeholder="Ваш телефон">
                        </label>
                    </div>
                    <button type="submit" class="callback-form__button">Отправить</button>
                </form>
            </div>
        </div>
    </div>
    <div class="popup" aria-hidden="true" id="thanks">
        <div class="popup__wrapper">
            <div class="popup__content">
                <div class="popup__body thanks">
                    <div class="thanks__title title">Спасибо!</div>
                    <div class="thanks__text">Скоро мы свяжемся с вами.</div>
                    <button data-close type="button" class="popup__close">X</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref} from "vue";
import axios from "axios";
import {flsModules} from "../files/modules";

const payload = ref({
    name: '',
    phone: '',
})

const errors = ref([])

const isSending = ref(false)
const isSuccess = ref(false)

const formSent = () => {
    if (flsModules.popup) {
        flsModules.popup.open('#thanks')
    }
    payload.value = {
        name: '',
        phone: '',
    }
}

const handleSubmit = () => {
    isSending.value = true
    isSuccess.value = false

    console.log(payload.value)

    axios.post('/callback', payload.value)
        .then(response => {
            if (response.status === 200) {
                isSending.value = false
                isSuccess.value = true
                formSent()
                errors.value = []
            }
        })
        .catch(e => {
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
    top: 50%;
    left: 50%;
    color: #a63d4d;
    font-size: 20px;
    width: 1em;
    height: 1em;
    border-radius: 50%;
    text-indent: -9999em;
    animation: load4 1.3s infinite linear;
    transform: translate(-50%, -50%);
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
