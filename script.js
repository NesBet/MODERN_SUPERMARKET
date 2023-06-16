// Get table data from server
function getData() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            const data = JSON.parse(this.responseText);
            populateTable(data);
        }
    };
    xhr.open("GET", "get_product.php", true);
    xhr.send();
}

// Populate table with data
function populateTable(data) {
    const table = document.getElementById("product_table");
    table.innerHTML = "";
    const header = table.createTHead();
    const row = header.insertRow();
    const columns = ["Product UID", "Product Name", "Price"];
    columns.forEach(function(column) {
        const cell = row.insertCell();
        cell.innerHTML = column;
    });
    const tbody = table.createTBody();
    data.forEach(function(rowData) {
        const row = tbody.insertRow();
        const product_uid = rowData.Product_UID;
        const product_name = rowData.Product_name;
        const price = rowData.Price;
        const cells = [product_uid, product_name, price];
        cells.forEach(function(cellData) {
            const cell = row.insertCell();
            cell.innerHTML = cellData;
        });
        const editCell = row.insertCell();
        const editButton = document.createElement("button");
        editButton.innerHTML = "Edit";
        editButton.onclick = function() {
            editRecord(product_uid, product_name, price);
        };
        editCell.appendChild(editButton);
    });
}

// Edit record
function editRecord(product_uid, product_name, price) {
    const newProduct_name = prompt("Enter new Product Name", product_name);
    const newPrice = prompt("Enter new Price", price);
    if (newProduct_name !== null && newPrice !== null) {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                const data = JSON.parse(this.responseText);
                if (data.success) {
                    alert("Record updated successfully");
                    getData();
                } else {
                    alert("Error updating record");
                }
            }
        };
        xhr.open("POST", "update_product.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        const params = "product_uid=" + product_uid + "&product_name=" + newProduct_name + "&price=" + newPrice;
        xhr.send(params);
    }
}

// Load data on page load
window.onload = getData;