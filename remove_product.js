let products = [
    { id: 1, name: "Cool drinks", manufacture_date: "21-12-2023", expiry_date: "23-05-2024", price: 15, quantity: 50},
    { id: 2, name: "Corn Flour", manufacture_date: "09-07-2023", expiry_date: "17-07-2024", price: 50, quantity: "8kg" },
    { id: 3, name: "Biscuits", manufacture_date: "26-12-2023", expiry_date: "25-12-2024", price: 10, quantity: 45},
];

// Function to display products
function displayProducts(productData) {
    const productList = document.getElementById("productList");
    productList.innerHTML = "";
    
    productData.forEach(product => {
        const li = document.createElement("li");
        li.classList.add("product-item");
        li.style.borderRadius = "10px";
        li.style.padding = "20px";
        li.style.cursor = "pointer";
        li.addEventListener("click", () => displayProductDetails(product));

        li.innerHTML = `
            <div>Name: ${product.name}</div>
            <div>Manufacture_date: ${product.manufacture_date}</div>
            <div>Expiry_date: ${product.expiry_date}</div>
            <div>Price: $${product.price}</div>
            <div>Quantity: ${product.quantity}</div>
            <button class="remove-button" onclick="removeProduct(${product.id})">Remove</button>
        `;

        productList.appendChild(li);
    });
}

// Function to search products
function searchProducts() {
    const searchInput = document.getElementById("searchInput");
    const searchText = searchInput.value.toLowerCase();

    const filteredProducts = products.filter(product => product.name.toLowerCase().includes(searchText));
    displayProducts(filteredProducts);
}

// Function to remove product
function removeProduct(productId) {
    const index = products.findIndex(product => product.id === productId);
    if (index !== -1) {
        products.splice(index, 1);
        displayProducts(products);
    }
}


//  Initially display all products
displayProducts(products);