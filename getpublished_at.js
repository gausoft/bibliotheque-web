async function fetchBooks() {
    let response = await fetch("../backend/index.php");
    let books = await response.json();
    let select = document.getElementById("bookSelect");
    select.innerHTML = '<option value="">Sélectionner un livre</option>';
    books.forEach(book => {
        select.innerHTML += `<option value="${book.id}">${book.title} - ${book.author}</option>`;
    });
}

async function fillForm() {
    let id = document.getElementById("bookSelect").value;
    if (!id) return;

    let response = await fetch("../backend/index.php");
    let books = await response.json();
    let book = books.find(b => b.id == id);

    if (book) {
        document.getElementById("title").value = book.title;
        document.getElementById("author").value = book.author;
        document.getElementById("published_at").value = book.published_at;
        document.getElementById("available").checked = book.available;
    }
}

async function updateBook(event) {
    event.preventDefault();
    let id = document.getElementById("bookSelect").value;
    let title = document.getElementById("title").value;
    let author = document.getElementById("author").value;
    let available = document.getElementById("available").checked ? 1 : 0;
    let published_at = document.getElementById("published_at").value;

    let response = await fetch("../backend/update-book.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id, title, author, available, published_at })
    });

    let result = await response.json();
    alert(result.message || result.error);
}

window.onload = fetchBooks;
