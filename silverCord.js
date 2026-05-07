const menusItemsDropDown = document.querySelectorAll('.menu-item-dropdown');
const menuItems = document.querySelectorAll('.menu-item');
const menuItemsStatic = document.querySelectorAll('.menu-item-static');
const sidebar = document.getElementById('sidebar');
const menuBtn = document.getElementById('menu-btn');

menuBtn.addEventListener('click', () => {
    sidebar.classList.toggle('minimize');

    if (!sidebar.classList.contains('minimize')) {
        menuItems.forEach((item) => {
            const span = item.querySelector('.menu-link span');
            if (span) span.style.display = '';
        });
    }
});

function closeMenu(item) {
    const submenu = item.querySelector('.sub-menu');
    if (submenu) {
        item.classList.remove('sub-menu-toggle');
        submenu.style.height = '0';
        submenu.style.padding = '0';
    }
}

function openMenu(item) {
    const submenu = item.querySelector('.sub-menu');
    if (submenu) {
        item.classList.add('sub-menu-toggle');
        submenu.style.height = `${submenu.scrollHeight + 6}px`;
        submenu.style.padding = '0.2rem 0';
    }
}

menusItemsDropDown.forEach((menuItem) => {
    menuItem.addEventListener('click', () => {
        const isActive = menuItem.classList.contains('sub-menu-toggle');
        menusItemsDropDown.forEach((item) => closeMenu(item));
        if (!isActive) {
            openMenu(menuItem);
        }
    });
});

menuItems.forEach((item) => {
    item.addEventListener('mouseenter', () => {
        if (sidebar.classList.contains('minimize')) {
            const span = item.querySelector('.menu-link span');
            if (span) span.style.display = 'block';
            const subMenu = item.querySelector('.sub-menu');
            if (subMenu && item.classList.contains('sub-menu-toggle')) {
                subMenu.style.height = 'auto';
            }
        }
    });

    item.addEventListener('mouseleave', () => {
        if (sidebar.classList.contains('minimize')) {
            const span = item.querySelector('.menu-link span');
            if (span) span.style.display = 'none';
            const subMenu = item.querySelector('.sub-menu');
            if (subMenu && item.classList.contains('sub-menu-toggle')) {
                subMenu.style.height = `${subMenu.scrollHeight}px`;
            }
        }
    });
});

menuItemsStatic.forEach((menuItem) => {
    menuItem.addEventListener('mouseenter', () => {
        if (!sidebar.classList.contains('minimize')) return;
        menusItemsDropDown.forEach((item) => {
            const otherSubMenu = item.querySelector('.sub-menu');
            if (otherSubMenu) {
                item.classList.remove('sub-menu-toggle'); // sin punto
                otherSubMenu.style.height = '0';
                otherSubMenu.style.padding = '0';
            }
        });
    });
});

// Cerrar todos los sub-menus al cargar
document.addEventListener('DOMContentLoaded', () => {
    menusItemsDropDown.forEach((item) => closeMenu(item));
});

// Buscadores con filtro

const searchInput = document.querySelector('.search input');

// Buscador index.php - filtra por artista
const tablaAlbums = document.getElementById('tablaAlbums');
if (searchInput && tablaAlbums) {
    searchInput.addEventListener('input', function() {
        const valor = this.value.toLowerCase();
        const filas = tablaAlbums.querySelectorAll('tr:not(:first-child)');
        filas.forEach(fila => {
            const artista = fila.cells[1]?.textContent.toLowerCase();
            fila.style.display = artista?.includes(valor) ? '' : 'none';
        });
    });
}

// Buscador registros.php - filtra por usuario
const tablaRegistros = document.getElementById('tablaRegistros');
if (searchInput && tablaRegistros) {
    searchInput.addEventListener('input', function() {
        const valor = this.value.toLowerCase();
        const filas = tablaRegistros.querySelectorAll('tr:not(:first-child)');
        filas.forEach(fila => {
            const usuario = fila.cells[1]?.textContent.toLowerCase();
            fila.style.display = usuario?.includes(valor) ? '' : 'none';
        });
    });
}

// Placeholder dinámico del buscador
if (searchInput) {
    if (tablaAlbums) {
        searchInput.placeholder = 'Filtrar por artista...';
    } else if (tablaRegistros) {
        searchInput.placeholder = 'Filtrar por usuario...';
    }
}