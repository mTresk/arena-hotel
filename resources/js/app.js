window['FLS'] = false

import '../scss/style.scss'
import '../js/vue.js'
import * as flsFunctions from './files/functions.js'
import './libs/popup.js'
import * as flsForms from './files/forms/forms.js'
import './files/forms/inputmask.js';
import './files/sliders.js'
import './libs/parallax.js'
import './files/map.js'
import './libs/dynamic_adapt.js'
import './files/script.js'

flsFunctions.isWebp()
flsFunctions.menuInit()
flsForms.formFieldsInit({})
flsForms.formRating()
