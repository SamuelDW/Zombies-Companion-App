import {isFieldValid, isFormValid, doesEmailExist, doesUsernameExist} from '../forms/form_validation';
import {fetchPostRequest} from '../base/form';
import { Routing } from '../routing/routing';

/**
 * Form Fields that need validating on the registration form
 */
let formFields = {
    firstName:false,
    lastName:false,
    email:false,
    username:false,
    password:false,
    termsAndConditions:false,
    privacyPolicy:false
}

document.addEventListener("DOMContentLoaded", function() { 

    isFormValid(formFields, '#registration-button')

    let firstName = document.querySelector('#registrationForm_firstName'),
        lastName = document.querySelector('#registrationForm_lastName'),
        email = document.querySelector('#registrationForm_email'),
        username = document.querySelector('#registrationForm_username'),
        password = document.querySelector('#registrationForm_plainPassword'),
        termsAndConditions = document.querySelector('#registrationForm_acceptedTermsAndConditions'),
        privacyPolicy = document.querySelector('#registrationForm_acceptedPrivacyPolicy')

    /**
     * On form change, check if the form is valid and set button to disabled/enabled
     */
    document.querySelector('#registration-form').addEventListener('input', function() {
        isFormValid(formFields, '#registration-button')
    })

    firstName.addEventListener('input', function() {
       formFields.firstName =  isFieldValid(firstName.value, formFields.firstName)
    })

    lastName.addEventListener('input', function() {
        formFields.lastName = isFieldValid(lastName.value, formFields.lastName)
    })

    email.addEventListener('input', function() {
        formFields.email = isFieldValid(email.value, formFields.email)
    })

    username.addEventListener('input', function() {
        formFields.username = isFieldValid(username.value, formFields.username, true)
    })

    username.addEventListener('change', function() {
        doesUsernameExist(username.value).then(function(result) {
            formFields.username = !result[0]
        })
    })

    email.addEventListener('change', function() {
        doesEmailExist(email.value).then(function(result) {
            formFields.email = !result[0]
        })
    })

    password.addEventListener('input', function() {
        formFields.password = isFieldValid(password.value, formFields.password)
    })

    termsAndConditions.addEventListener('input', function() {
        formFields.termsAndConditions = termsAndConditions.checked
    })

    privacyPolicy.addEventListener('input', function() {
        formFields.privacyPolicy = privacyPolicy.checked
    })

    /**
     * If form is valid, submit form via AJAX
     */
     document.querySelector('#registration-button').addEventListener('click', function() {
        if((document.querySelector('#registration-button').disabled)) {
            return
        }
        const url = Routing.generate('registration')
        fetch(url, {
            method: 'POST',
            body: new FormData(document.querySelector('#registration-form')),
            mode: 'no-cors'
        })
        .then((response) => response.json())
        .then(function(data) {
            return data
        })
        .catch(error => {
            return error
        })
     })
})