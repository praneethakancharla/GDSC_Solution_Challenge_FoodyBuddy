const products = [
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
        li.addEventListener("click", () => displayUpdateForm(product));

        li.innerHTML = `
            <div>Name: ${product.name}</div>
            <div>Manufacture Date: ${product.manufacture_date}</div>
            <div>Expiry Date: ${product.expiry_date}</div>
            <div>Price: $${product.price}</div>
            <div>Quantity: ${product.quantity}</div>
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

// Function to display update form
function displayUpdateForm(product) {
    document.getElementById('updateProductForm').style.display = 'block';

    // Fill form fields with product details
    document.getElementById('productName').value = product.name;
    document.getElementById('manufactureDate').value = product.manufacture_date;
    document.getElementById('expiryDate').value = product.expiry_date;
    document.getElementById('price').value = product.price;
    document.getElementById('quantity').value = product.quantity;

    // Add a data attribute to store product ID
    document.getElementById('updateProductForm').setAttribute('data-product-id', product.id);
}

// Function to update product details
function updateProduct() {
    const productId = document.getElementById('updateProductForm').getAttribute('data-product-id');

    const productName = document.getElementById('productName').value;
    const manufactureDate = document.getElementById('manufactureDate').value;
    const expiryDate = document.getElementById('expiryDate').value;
    const price = document.getElementById('price').value;
    const quantity = document.getElementById('quantity').value;

    // Find the index of the product in the array
    const index = products.findIndex(product => product.id == productId);
    if (index !== -1) {
        // Update product details
        products[index].name = productName;
        products[index].manufacture_date = manufactureDate;
        products[index].expiry_date = expiryDate;
        products[index].price = price;
        products[index].quantity = quantity;

        // Re-display updated product list
        displayProducts(products);

        // Hide update form
        document.getElementById('updateProductForm').style.display = 'none';
    }
}

// Initially display all products
displayProducts(products);