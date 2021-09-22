import { Routing } from "../routing/routing"

    const FORM_INPUT_MIN_LENGTH = 2,
        FORM_INPUT_NAME_MAX_LENGTH = 50,
        FORM_INPUT_USERNAME_MAX_LENGTH = 15


    /**
     * Enable/Disable Submit buttons if all fields are valid
     * 
     * @param {*} formFields 
     * @param {*} submitButton 
     */
    function isFormValid(formFields, submitButton) {
        document.querySelector(submitButton).disabled = 
        !Object.values(formFields).every(element => element !== false)
    }

    /**
     * Checks if field is valid, and changes the value of the validation object
     * 
     * @param {*} formField 
     * 
     * @returns {boolean}
     */
    function isFieldValid(formField, FormValidationObject, isUsername = false) {
        if (!formField) {
            return FormValidationObject = formField
        }
        if(formField.length < FORM_INPUT_MIN_LENGTH || formField.length > FORM_INPUT_NAME_MAX_LENGTH) {
            return FormValidationObject = false
        }
        if(isUsername && formField < FORM_INPUT_MIN_LENGTH || formField > FORM_INPUT_USERNAME_MAX_LENGTH ) {
            return FormValidationObject = false
        }

       return FormValidationObject = true
    }

    /**
     * Validating if an email exists
     * 
     * @param {*} email 
     */
    async function doesEmailExist(email) {
        const url = Routing.generate('validation_email')
        
        return fetch(url, {
            method: 'POST',
            body: email
        })
        .then((validationResponse) => validationResponse.json())
        .then(function(data) {
            return data // returns true or false
        })
        .catch(er => {
            return er
        })
    }

    /**
     * Validating if a username exists
     * 
     * @param {*} username 
     * 
     * @returns 
     */
    async function doesUsernameExist(username) {
        const url = Routing.generate('validation_username')
        
        return fetch(url, {
            method: 'POST',
            body: username
        })
        .then((validationResponse) => validationResponse.json())
        .then(function(data) {
            return data // returns true or false
        })
        .catch(er => {
            return er
        })
    }


export {doesEmailExist, isFieldValid, isFormValid, doesUsernameExist}