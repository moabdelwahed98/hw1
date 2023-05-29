const cartElements = document.querySelector(".cart-elements");

const cartImg =
  "https://shop.unicornstore.in/beam/themes/2019/assets/img/cart_empty.png";
const container = document.querySelector(".flex-container");
let jsonArray = [];
let cartArray = [];

fetch("https://fakestoreapi.com/products")
  .then(searchResponse)
  .then(searchJson)
  .catch((error) => console.log(error));

function searchResponse(response) {
  return response.json();
}

function searchJson(json) {
  console.log("JSON ricevuto");
  // Leggi il numero di risultati
  const results = json.length;

    container.innerHTML = "";

    for (let i = 0; i < results; i++) {
      // Leggi il documento
      const products_data = json[i];
      // Leggiamo info
      const title = products_data.title;
      const id = products_data.id;
      const selected_image = products_data.image;
      const price = products_data.price;

      // Creiamo il div che conterrà immagine e didascalia

      const product = document.createElement("div");

      const mainImg = document.createElement("img");
      mainImg.src = selected_image;

      mainTitle = document.createElement("h5");
      mainTitle.textContent = title;
      mainPrice = document.createElement("h4");
      mainPrice.textContent = "€" + price;
      
      //add anker on cart img to force the page to refreash

      const cartImage = document.createElement("img");
      cartImage.src = cartImg;
      cartImage.classList.add("carticon");
      cartImage.onclick = function () {
        addToCart(id);
      };

      product.appendChild(mainImg);
      product.appendChild(mainTitle);
      product.appendChild(mainPrice);
      product.appendChild(cartImage);
      container.appendChild(product);
      //memorizzo tutti i dati del file json che non è accessibile all'infuori della
      // funzione onJson
      jsonArray.push(products_data);
    }
}


console.log(jsonArray);

function addToCart(id) {
  
  if (cartArray.some((item) => item.id === id)) {
    alert("Product already in cart, you can increase the quantity from there!");
  } else {
    let item = jsonArray.find((product) => product.id === id);
    console.log(item);
    cartArray.push({
      ...item,
      numberOfUnits: 1,
    });
    console.log(cartArray);
  }
  localStorage.setItem("data", JSON.stringify(cartArray));
}

/* Questa dovrebbe essere la funzione Search in caso che utilizziamo fetching a una 
    pagina PHP che allego pure implementata */
    
/*function search(event){
  
    event.preventDefault();
    const form_data = new FormData(document.getElementById("main-form"));
    console.log(form_data.get('search'));
    //
    
    //fetch a file php
    //fetch("api.php?q="+encodeURIComponent(form_data.get('search'))).then(searchResponse).then(searchJson);

    container.innerHTML = '';
} */
