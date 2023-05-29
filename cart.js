
const removeButton = "close.svg";

let cart = JSON.parse(localStorage.getItem("data")) || [];
console.log(cart);

const box = document.getElementById("basket");
//box.innerHTML = "";
//console.log(box);

function addToCart(){
    if(cart.length!== 0){
        box.innerHTML = "";
        for (let i = 0; i < cart.length; i++){

            let row = document.createElement("tr");

            let remove = document.createElement("td");
            let photo = document.createElement("td");
            let title = document.createElement("td");
            let price = document.createElement("td");
            let quantity = document.createElement("td");
            let sub = document.createElement("td");

            let input = document.createElement("input");
            input.type = "number";
            input.value = "1";
            input.min = "1";
            quantity.appendChild(input);

            let X = document.createElement("img");
            X.src = removeButton;
            X.classList.add("remove");
            X.onclick = function () {
                removeFromCart(cart[i].id);
                };

            let imag = document.createElement("img");
            imag.src = cart[i].image;


            remove.appendChild(X);
            photo.appendChild(imag);
            
            title.textContent = cart[i].title; 
            price.textContent = "€" + cart[i].price;

            sub.textContent = "€" + cart[i].price;
            input.addEventListener("input", ()=> {
                sub.textContent = "€" + (input.value * cart[i].price).toFixed(2);
                cartSubTotal(cart[i].id,input.value);
            })

            row.appendChild(remove);
            row.appendChild(photo);
            row.appendChild(title);
            row.appendChild(price);
            row.appendChild(quantity);
            row.appendChild(sub);

            box.appendChild(row);
        }

        }else{
            document.querySelector(".cart").innerHTML = "";
            box.innerHTML = "";
            const header = document.createElement("h4");
            header.textContent = "Cart is empty!";
            const link = document.createElement("a");
            link.href = "shop.php";
            link.textContent = "Click here";
            box.appendChild(header);
            box.appendChild(link);
            box.classList.add("empty");
            document.querySelector(".cart").appendChild(box);

            console.log(box);
            //button.window.location = "shop.php";
        }  
} 
addToCart();

function removeFromCart(id){
    console.log(id);
    cart = cart.filter((item) => item.id !== id);
    localStorage.setItem("data", JSON.stringify(cart));
    addToCart();
}

let total = [];
function cartSubTotal(id, input){
    if (cart.length !== 0) {
        for (let i = 0; i < cart.length; i++){
            if(cart[i].id === id){
                let x = cart[i].price * input;
                total.push(x);
            }
        }
        let sub = total.reduce((x, y) => x + y, 0);
        document.querySelector(".amount").textContent = "€" + sub; 
        document.querySelector(".amount-bold").textContent = "€" + sub; 
        console.log(sub);
    }
}

// adding products to db after clicking on button "Proceed to checkout"

function addingDB(event){

    fetch("inserting.php", {
        method: "POST",
        headers: {
            "Content-type": "application/json"
        },
        body: JSON.stringify(cart)

    }).then(function(response){
        return response.json(); 
    }).then(function(data){
        console.log(data);
    })

}

const checkout = document.getElementById("check_out");
checkout.addEventListener("click", addingDB);




