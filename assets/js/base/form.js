import { Routing } from '../routing/routing'

//console.log(Routing.generate('registration', true))

document.addEventListener("DOMContentLoaded", function() {
    
// console.log(registerButton)
//     registerButton.addEventListener('click', function() {
//         //console.log( Routing.generate('registration', true), "Hello")

//         const url = Routing.generate('registration');

//         fetch(url)
//         .then(function(response) {
//             console.log(response)
//         })
//     })
 })

/**
 * 
 * @param {*} pathToFetch 
 * 
 * @returns 
 */
function fetchPostRequest(pathToFetch) {
    const url = Routing.generate(pathToFetch)

    fetch(url)
    .then(function(response) {

    })
}

export {fetchPostRequest}