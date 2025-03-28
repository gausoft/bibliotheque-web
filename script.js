// Fonction pour charger et afficher les livres
async function loadBooks(searchTerm = '') {
    try {
        const response = await fetch(`backend/index.php${searchTerm ? '?search=' + encodeURIComponent(searchTerm) : ''}`);
        const data = await response.json();
        
        if (data.success) {
            const booksList = document.getElementById('booksList');
            booksList.innerHTML = '';
            
            data.books.forEach(book => {
                const row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${book.title}</td>
                    <td>${book.author}</td>
                    <td>${book.published_at}</td>
                    <td class="${book.available ? 'available' : 'unavailable'}">
                        ${book.available ? 'Disponible' : 'Indisponible'}
                    </td>
                    <td class="actions">
                        <button onclick="editBook(${book.id})">Modifier</button>
                        <button onclick="confirmDelete(${book.id})">Supprimer</button>
                    </td>
                `;
                
                booksList.appendChild(row);
            });
        } else {
            alert('Erreur lors du chargement des livres: ' + data.message);
        }
    } catch (error) {
        console.error('Erreur:', error);
        alert('Une erreur est survenue lors du chargement des livres');
    }
}

// Fonction de recherche
function searchBooks() {
    const searchTerm = document.getElementById('searchInput').value;
    loadBooks(searchTerm);
}

// Fonction pour modifier un livre
function editBook(id) {
    window.location.href = `update-book.html?id=${id}`;
}

// Fonction pour confirmer la suppression
function confirmDelete(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')) {
        deleteBook(id);
    }
}

// Fonction pour supprimer un livre
async function deleteBook(id) {
    try {
        const response = await fetch(`backend/delete-book.php?id=${id}`);
        const data = await response.json();
        
        if (data.success) {
            alert('Livre supprimé avec succès');
            loadBooks();
        } else {
            alert('Erreur lors de la suppression: ' + data.message);
        }
    } catch (error) {
        console.error('Erreur:', error);
        alert('Une erreur est survenue lors de la suppression du livre');
    }
}

// Charger les livres au chargement de la page
document.addEventListener('DOMContentLoaded', () => loadBooks());