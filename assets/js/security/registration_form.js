import {FormValidation} from '../forms/form_validation';
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

    FormValidation.isFormValid(formFields, '#registration-button')

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
        FormValidation.isFormValid(formFields, '#registration-button')
    })

    firstName.addEventListener('input', function() {
       formFields.firstName =  FormValidation.isFieldValid(firstName.value, formFields.firstName)
    })

    lastName.addEventListener('input', function() {
        formFields.lastName = FormValidation.isFieldValid(lastName.value, formFields.lastName)
    })

    email.addEventListener('input', function() {
        formFields.email = FormValidation.isFieldValid(email.value, formFields.email)
    })

    username.addEventListener('input', function() {
        formFields.username = FormValidation.isFieldValid(username.value, formFields.username)
    })

    password.addEventListener('input', function() {
        formFields.password = FormValidation.isFieldValid(password.value, formFields.password)
    })

    termsAndConditions.addEventListener('input', function() {
        console.log(termsAndConditions.value)
        formFields.termsAndConditions = FormValidation.isFieldValid(termsAndConditions.value, formFields.termsAndConditions)
    })

    privacyPolicy.addEventListener('input', function() {
        formFields.privacyPolicy = FormValidation.isFieldValid(privacyPolicy.value, formFields.privacyPolicy)
    })

    /**
     * If form is valid, submit form via AJAX
     */
     document.querySelector('#registration-button').addEventListener('click', function() {
        if((document.querySelector('#registration-button').disabled)) {
            return
        }
        console.log(new FormData(document.querySelector('#registration-form')), "HELLO")
        const url = Routing.generate('registration')
        fetch(url, {
            method: 'POST',
            body: new FormData(document.querySelector('#registration-form')),
            mode: 'no-cors'
        })
        .then((response) => response.json())
        .then(function(data) {
            console.log(data)
        })
        .catch(error => {
            console.log(error)
        })
     })
})