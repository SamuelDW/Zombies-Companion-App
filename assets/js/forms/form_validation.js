/**
 * Class to hold various functions relating to front end validation of forms.
 */
class FormValidation {

    /**
     * Enable/Disable Submit buttons if all fields are valid
     * 
     * @param {*} formFields 
     * @param {*} submitButton 
     */
    static isFormValid(formFields, submitButton) {
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
    static isFieldValid(formField, FormValidationObject) {
       return FormValidationObject = formField ? true : false
    }
}

export {FormValidation}