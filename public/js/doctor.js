// DOM Elements
const searchInput = document.getElementById('searchInput');
const filterBtn = document.getElementById('filterBtn');
const doctorsTableBody = document.getElementById('doctorsTableBody');
const noResults = document.getElementById('noResults');

// Filter state
let currentFilter = 'all'; // 'all', 'available', 'busy'

// Get all table rows
const getAllRows = () => document.querySelectorAll('.table-row');

// Filter and search functionality
function filterAndSearchDoctors() {
    const searchTerm = searchInput.value.toLowerCase().trim();
    const rows = getAllRows();
    let visibleCount = 0;

    rows.forEach(row => {
        const doctorName = row.querySelector('.doctor-name').textContent.toLowerCase();
        const doctorSpecialty = row.querySelector('.doctor-specialty').textContent.toLowerCase();
        const availability = row.dataset.availability;

        // Check search match
        const matchesSearch = searchTerm === '' ||
            doctorName.includes(searchTerm) ||
            doctorSpecialty.includes(searchTerm);

        // Check filter match
        const matchesFilter = currentFilter === 'all' || availability === currentFilter;

        // Show/hide row
        if (matchesSearch && matchesFilter) {
            row.classList.remove('hidden');
            visibleCount++;
        } else {
            row.classList.add('hidden');
        }
    });

    // Show/hide no results message
    if (visibleCount === 0) {
        noResults.style.display = 'block';
        doctorsTableBody.parentElement.style.display = 'none';
    } else {
        noResults.style.display = 'none';
        doctorsTableBody.parentElement.style.display = 'block';
    }
}

// Update filter button text
function updateFilterButtonText() {
    const filterTexts = {
        'all': 'Filtrer',
        'available': 'Disponible',
        'busy': 'Occupé'
    };

    const buttonText = filterBtn.querySelector('svg + text') || filterBtn.childNodes[2];
    if (buttonText && buttonText.nodeType === Node.TEXT_NODE) {
        buttonText.textContent = filterTexts[currentFilter];
    }
}

// Cycle through filters
function cycleFilter() {
    const filters = ['all', 'available', 'busy'];
    const currentIndex = filters.indexOf(currentFilter);
    currentFilter = filters[(currentIndex + 1) % filters.length];

    updateFilterButtonText();
    filterAndSearchDoctors();
}

// Event listeners
searchInput.addEventListener('input', filterAndSearchDoctors);
filterBtn.addEventListener('click', cycleFilter);

// Add click handlers for action buttons
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('action-btn')) {
        const row = e.target.closest('tr');
        const doctorName = row.querySelector('.doctor-name').textContent;
        alert(`Voir les créneaux pour ${doctorName}`);
    }
});

// Add hover effects for table rows
document.addEventListener('DOMContentLoaded', function() {
    const rows = getAllRows();
    rows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.backgroundColor = '#f9fafb';
        });

        row.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '';
        });
    });
});

// Smooth scrolling for navigation links
document.querySelectorAll('.nav-item').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();

        // Remove active class from all nav items
        document.querySelectorAll('.nav-item').forEach(item => {
            item.classList.remove('active');
        });

        // Add active class to clicked item
        this.classList.add('active');
    });
});

// Initialize the page
document.addEventListener('DOMContentLoaded', function() {
    filterAndSearchDoctors();
    updateFilterButtonText();
});

// Add responsive menu toggle for mobile (if needed)
function toggleMobileMenu() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('mobile-open');
}

// Add keyboard navigation
document.addEventListener('keydown', function(e) {
    // Escape key to clear search
    if (e.key === 'Escape' && document.activeElement === searchInput) {
        searchInput.value = '';
        filterAndSearchDoctors();
    }

    // Enter key to focus first action button
    if (e.key === 'Enter' && document.activeElement === searchInput) {
        const firstVisibleActionBtn = document.querySelector('.table-row:not(.hidden) .action-btn');
        if (firstVisibleActionBtn) {
            firstVisibleActionBtn.focus();
        }
    }
});

// Add loading state simulation
function showLoadingState() {
    const tableContainer = document.querySelector('.table-container');
    tableContainer.style.opacity = '0.6';
    tableContainer.style.pointerEvents = 'none';

    setTimeout(() => {
        tableContainer.style.opacity = '1';
        tableContainer.style.pointerEvents = 'auto';
    }, 300);
}

// Simulate refresh functionality
document.querySelector('.refresh-btn').addEventListener('click', function() {

    // In a real app, this would fetch fresh data
    console.log('Refreshing doctors data...');
});