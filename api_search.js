
/* Questa dovrebbe essere la funzione Search in caso che utilizziamo fetching a una 
    pagina PHP che allego pure implementata */

/*
function search(event) {
    const form_data = new FormData(document.querySelector("#main-form"));
    console.log(form_data.get('search'))
    // Fetch the PHP file
    fetch("api_home_search.php?q=" + encodeURIComponent(form_data.get('search')))
        .then(searchResponse)
        .then(searchJson)
    event.preventDefault();
}
*/


const container = document.querySelector('.flex-container');

function search(event)
{
    event.preventDefault();
    // Leggi valore del campo di testo
    const input = document.querySelector('#text');
    const valore = encodeURIComponent(input.value);
    console.log(valore);

    fetch('https://dummyjson.com/products/search?q=' + valore).then(onResponse).then(onJson);
}



function onResponse(response)
{
    //console.log(response);
    return response.json();
}

function onJson(json)
{
    console.log(json);
    
    if(json.products.length === 0){
        errore.classList.remove('hidden');
    }else{
        errore.classList.add('hidden');
        console.log(json.products);

        container.innerHTML = "";

        for (let i = 0; i < 6; i++) {
            // Leggi il documento
            const products = json.products[i];
            // Leggiamo info
            const title = products.title;
            const desc = products.description;
            const selected_image = products.thumbnail;
            const price = products.price;

            // Creiamo il div che conterrà immagine e didascalia

            const product = document.createElement("div");

            const mainImg = document.createElement("img");
            mainImg.src = selected_image;

            mainTitle = document.createElement("h5");
            mainTitle.textContent = title;
            mainDesc = document.createElement("p");
            mainDesc.textContent = desc;
            mainPrice = document.createElement("h4");
            mainPrice.textContent = "€" + price;

            product.appendChild(mainImg);
            product.appendChild(mainTitle);
            product.appendChild(mainDesc);
            product.appendChild(mainPrice);

            container.appendChild(product);
        }
    }
}

const cerca = document.getElementById("main-form");
const errore = document.getElementById("errore");
// Call the search function when the form is submitted
cerca.addEventListener("submit",search);


