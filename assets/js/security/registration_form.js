import {FormValidation} from '../forms/form_validation';
import {fetchPostRequest} from '../base/form';

/**
 * Form Fields that need validating on the registration form
 */
let formFields = {
    firstName:false,
    lastName:false,
    email:false,
    username:false,
    password:false,
    // termsAndConditions:false,
    // privacyPolicy:false,
    // emailOptIn:false
}

document.addEventListener("DOMContentLoaded", function() { 

    FormValidation.isFormValid(formFields, '#registration-button')

    let firstName = document.querySelector('#registrationForm_firstName'),
        lastName = document.querySelector('#registrationForm_lastName'),
        email = document.querySelector('#registrationForm_email'),
        username = document.querySelector('#registrationForm_username'),
        password = document.querySelector('#registrationForm_plainPassword')

    /**
     * On form change, check if the form is valid and set button to disabled/enabled
     */
    document.querySelector('#registration-form').addEventListener('input', function() {
        FormValidation.isFormValid(formFields, '#registration-button')
        console.log(formFields)
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
})