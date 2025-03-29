async function addBook(event) {
    event.preventDefault();
    let title = document.getElementById("title").value;
    let author = document.getElementById("author").value;
    let available = document.getElementById("available").checked ? 1 : 0;
    let published_at = document.getElementById("published_at").value;

    let response = await fetch("../backend/add-book.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ title, author, available, published_at })
    });

    let result = await response.json();
    alert(result.message || result.error);
    document.getElementById("bookForm").reset();
}
