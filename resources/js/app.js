import '../scss/style.scss'
import * as flsFunctions from './files/functions.js'
import './libs/popup.js'
import * as flsForms from './files/forms/forms.js'
import './files/sliders.js'
import './libs/parallax.js'
import './files/map.js'
import './libs/dynamic_adapt.js'
import './files/script.js'
import './bootstrap'

flsFunctions.isWebp()
flsFunctions.menuInit()
flsForms.formFieldsInit({
    viewPass: false,
    autoHeight: false,
})
flsForms.formRating()
