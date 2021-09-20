import { Routing } from '../routing/routing'

/**
 * 
 * @param {*} pathToFetch 
 * 
 * @returns 
 */
function fetchPostRequest(pathToFetch, formData) {
    const url = Routing.generate(pathToFetch)

    /** 
     * Fetch the request with the form data
     */
    fetch(
        url, {
            method: 'POST',
            mode: 'no-cors',
            body: new FormData(formData)
        }
    )
    .then(response => response.json())
    .then(function(data) {
        return data
    })
    .catch(formError => {
        return formError
    })
}

export {fetchPostRequest}