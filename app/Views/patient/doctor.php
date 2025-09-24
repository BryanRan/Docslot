<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<style>
    /* Reset and Base Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background-color: #f9fafb;
        color: #111827;
        line-height: 1.5;
    }

    /* Header Styles */
    .header {
        background: white;
        border-bottom: 1px solid #e5e7eb;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 0;
        z-index: 50;
    }

    .header-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 64px;
    }

    .header-left {
        display: flex;
        align-items: center;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .logo-icon {
        width: 32px;
        height: 32px;
        color: #111827;
    }

    .logo-text {
        font-size: 20px;
        font-weight: 700;
        color: #111827;
    }

    .search-container {
        flex: 1;
        max-width: 512px;
        margin: 0 32px;
    }

    .search-wrapper {
        position: relative;
    }

    .search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        color: #9ca3af;
        pointer-events: none;
    }

    .search-input {
        width: 100%;
        padding: 8px 12px 8px 40px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        background: white;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: #059669;
        box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
    }

    .search-input::placeholder {
        color: #9ca3af;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        background: #059669;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 500;
        font-size: 14px;
    }

    .user-info {
        display: flex;
        flex-direction: column;
    }

    .user-name {
        font-size: 14px;
        font-weight: 500;
        color: #111827;
    }

    .user-email {
        font-size: 12px;
        color: #6b7280;
    }

    /* Layout */
    .main-layout {
        display: flex;
        min-height: calc(100vh - 64px);
    }

    /* Sidebar Styles */
    .sidebar {
        width: 256px;
        background: white;
        box-shadow: 1px 0 3px 0 rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 64px;
        height: calc(100vh - 64px);
        overflow-y: auto;
    }

    .sidebar-content {
        padding: 24px;
    }

    .menu-section {
        margin-bottom: 32px;
    }

    .menu-title {
        font-size: 11px;
        font-weight: 600;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 16px;
    }

    .nav-menu {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 8px 12px;
        border-radius: 6px;
        text-decoration: none;
        color: #6b7280;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .nav-item:hover {
        background: #f9fafb;
        color: #111827;
    }

    .nav-item.active {
        background: #059669;
        color: white;
    }

    .nav-icon {
        width: 20px;
        height: 20px;
        flex-shrink: 0;
    }

    /* Promotion Card */
    .promo-card {
        background: #111827;
        border-radius: 8px;
        padding: 16px;
        color: white;
        margin-top: 32px;
    }

    .promo-icon {
        width: 32px;
        height: 32px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 8px;
    }

    .promo-icon svg {
        width: 16px;
        height: 16px;
        color: #111827;
    }

    .promo-title {
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 4px;
    }

    .promo-text {
        font-size: 12px;
        color: #d1d5db;
        margin-bottom: 12px;
    }

    .promo-button {
        width: 100%;
        background: #059669;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .promo-button:hover {
        background: #047857;
    }

    /* Main Content */
    .main-content {
        flex: 1;
        padding: 32px;
    }

    .content-container {
        max-width: 1536px;
        margin: 0 auto;
    }

    .page-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 32px;
    }

    .page-title-section {
        flex: 1;
    }

    .page-title {
        font-size: 24px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 4px;
    }

    .page-subtitle {
        color: #6b7280;
        font-size: 16px;
    }

    .page-actions {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .refresh-btn {
        background: none;
        border: none;
        color: #6b7280;
        font-size: 14px;
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .refresh-btn:hover {
        color: #374151;
    }

    .filter-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background: white;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        color: #374151;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .filter-btn:hover {
        background: #f9fafb;
    }

    .filter-icon,
    .chevron-icon {
        width: 16px;
        height: 16px;
    }

    /* Table Styles */
    .table-container {
        background: white;
        border-radius: 8px;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .doctors-table {
        width: 100%;
        border-collapse: collapse;
    }

    .doctors-table thead {
        background: #f9fafb;
    }

    .doctors-table th {
        padding: 12px 24px;
        text-align: left;
        font-size: 12px;
        font-weight: 500;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 1px solid #e5e7eb;
    }

    .doctors-table th.text-right {
        text-align: right;
    }

    .doctors-table tbody tr {
        border-bottom: 1px solid #e5e7eb;
        transition: background-color 0.2s ease;
    }

    .doctors-table tbody tr:hover {
        background: #f9fafb;
    }

    .doctors-table tbody tr:last-child {
        border-bottom: none;
    }

    .doctors-table td {
        padding: 16px 24px;
        font-size: 14px;
    }

    .doctors-table td.text-right {
        text-align: right;
    }

    .doctor-name {
        font-weight: 500;
        color: #111827;
    }

    .doctor-specialty {
        color: #111827;
    }

    /* Status Badge */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 10px;
        border-radius: 9999px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-badge.available {
        background: #dcfce7;
        color: #166534;
    }

    .status-badge.busy {
        background: #fee2e2;
        color: #991b1b;
    }

    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
    }

    .status-badge.available .status-dot {
        background: #22c55e;
    }

    .status-badge.busy .status-dot {
        background: #ef4444;
    }

    /* Action Button */
    .action-btn {
        background: #059669;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .action-btn:hover {
        background: #047857;
    }

    /* No Results */
    .no-results {
        text-align: center;
        padding: 48px 24px;
        color: #6b7280;
    }

    .no-results-icon {
        width: 48px;
        height: 48px;
        margin: 0 auto 16px;
        color: #9ca3af;
    }

    .no-results h3 {
        font-size: 18px;
        font-weight: 500;
        color: #111827;
        margin-bottom: 8px;
    }

    .no-results p {
        font-size: 16px;
    }

    /* Hidden rows for filtering */
    .table-row.hidden {
        display: none;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .main-layout {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            height: auto;
            position: static;
        }

        .main-content {
            padding: 16px;
        }

        .page-header {
            flex-direction: column;
            gap: 16px;
            align-items: stretch;
        }

        .page-actions {
            justify-content: flex-end;
        }
    }

    @media (max-width: 768px) {
        .header-container {
            padding: 0 16px;
            flex-wrap: wrap;
            height: auto;
            min-height: 64px;
            gap: 16px;
        }

        .search-container {
            order: 3;
            flex-basis: 100%;
            margin: 0;
        }

        .user-info {
            display: none;
        }

        .sidebar-content {
            padding: 16px;
        }

        .table-container {
            overflow-x: auto;
        }

        .doctors-table {
            min-width: 600px;
        }
    }

    @media (max-width: 480px) {
        .page-title {
            font-size: 20px;
        }

        .page-subtitle {
            font-size: 14px;
        }

        .doctors-table th,
        .doctors-table td {
            padding: 8px 12px;
        }

        .doctors-table th {
            font-size: 11px;
        }

        .doctors-table td {
            font-size: 13px;
        }
    }
</style>




<!-- Main Content -->
<main class="main-content">
    <div class="content-container">
        <div class="page-header">
            <div class="page-title-section">
                <h1 class="page-title">Médecins</h1>
                <p class="page-subtitle">Gérez tous vos rendez-vous médicaux en un seul endroit</p>
            </div>
            <div class="page-actions">
                <button class="refresh-btn">Actualiser ↗</button>
                <button class="filter-btn" id="filterBtn">
                    <svg class="filter-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="22,3 2,3 10,12.46 10,19 14,21 14,12.46" />
                    </svg>
                    Filtrer
                    <svg class="chevron-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6,9 12,15 18,9" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Doctors Table -->
        <div class="table-container">
            <table class="doctors-table">
                <thead>
                    <tr>
                        <th>Nom du médecin</th>
                        <th>Spécialité</th>
                        <th>Disponibilité</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody id="doctorsTableBody">
                    <tr class="table-row" data-availability="available">
                        <td class="doctor-name">Dr. Hélène Dubois</td>
                        <td class="doctor-specialty">Cardiologie</td>
                        <td>
                            <span class="status-badge available">
                                <span class="status-dot"></span>
                                Disponible
                            </span>
                        </td>
                        <td class="text-right">
                            <button class="action-btn">Voir créneaux</button>
                        </td>
                    </tr>
                    <tr class="table-row" data-availability="busy">
                        <td class="doctor-name">Dr. Hélène Dubois</td>
                        <td class="doctor-specialty">Dermatologie</td>
                        <td>
                            <span class="status-badge busy">
                                <span class="status-dot"></span>
                                Occupé
                            </span>
                        </td>
                        <td class="text-right">
                            <button class="action-btn">Voir créneaux</button>
                        </td>
                    </tr>
                    <tr class="table-row" data-availability="busy">
                        <td class="doctor-name">Dr. Sophie Martin</td>
                        <td class="doctor-specialty">Généraliste</td>
                        <td>
                            <span class="status-badge busy">
                                <span class="status-dot"></span>
                                Occupé
                            </span>
                        </td>
                        <td class="text-right">
                            <button class="action-btn">Voir créneaux</button>
                        </td>
                    </tr>
                    <tr class="table-row" data-availability="available">
                        <td class="doctor-name">Dr. Lucas Petit</td>
                        <td class="doctor-specialty">Pédiatrie</td>
                        <td>
                            <span class="status-badge available">
                                <span class="status-dot"></span>
                                Disponible
                            </span>
                        </td>
                        <td class="text-right">
                            <button class="action-btn">Voir créneaux</button>
                        </td>
                    </tr>
                    <tr class="table-row" data-availability="available">
                        <td class="doctor-name">Dr. Isabelle Richard</td>
                        <td class="doctor-specialty">Gynécologie</td>
                        <td>
                            <span class="status-badge available">
                                <span class="status-dot"></span>
                                Disponible
                            </span>
                        </td>
                        <td class="text-right">
                            <button class="action-btn">Voir créneaux</button>
                        </td>
                    </tr>
                    <tr class="table-row" data-availability="busy">
                        <td class="doctor-name">Dr. Julien Bernard</td>
                        <td class="doctor-specialty">Ophtalmologie</td>
                        <td>
                            <span class="status-badge busy">
                                <span class="status-dot"></span>
                                Occupé
                            </span>
                        </td>
                        <td class="text-right">
                            <button class="action-btn">Voir créneaux</button>
                        </td>
                    </tr>
                    <tr class="table-row" data-availability="busy">
                        <td class="doctor-name">Dr. Michaël</td>
                        <td class="doctor-specialty">Neurologie</td>
                        <td>
                            <span class="status-badge busy">
                                <span class="status-dot"></span>
                                Occupé
                            </span>
                        </td>
                        <td class="text-right">
                            <button class="action-btn">Voir créneaux</button>
                        </td>
                    </tr>
                    <tr class="table-row" data-availability="available">
                        <td class="doctor-name">Dr. Jenna Christ</td>
                        <td class="doctor-specialty">Rhumatologie</td>
                        <td>
                            <span class="status-badge available">
                                <span class="status-dot"></span>
                                Disponible
                            </span>
                        </td>
                        <td class="text-right">
                            <button class="action-btn">Voir créneaux</button>
                        </td>
                    </tr>
                    <tr class="table-row" data-availability="busy">
                        <td class="doctor-name">Dr. christina Yong</td>
                        <td class="doctor-specialty">Psychiatrie</td>
                        <td>
                            <span class="status-badge busy">
                                <span class="status-dot"></span>
                                Occupé
                            </span>
                        </td>
                        <td class="text-right">
                            <button class="action-btn">Voir créneaux</button>
                        </td>
                    </tr>
                    <tr class="table-row" data-availability="busy">
                        <td class="doctor-name">Dr. Meredith Grey</td>
                        <td class="doctor-specialty">Hématologie</td>
                        <td>
                            <span class="status-badge busy">
                                <span class="status-dot"></span>
                                Occupé
                            </span>
                        </td>
                        <td class="text-right">
                            <button class="action-btn">Voir créneaux</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- No Results Message -->
        <div class="no-results" id="noResults" style="display: none;">
            <svg class="no-results-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
            <h3>Aucun médecin trouvé</h3>
            <p>Essayez de modifier vos critères de recherche ou vos filtres.</p>
        </div>
    </div>
</main>





<script>
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
</script>


<?= $this->endSection() ?>