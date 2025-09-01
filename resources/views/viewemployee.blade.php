@extends('layouts.app')

@section('title', 'View Employees')

@section('content')
<h1 class="mb-1">Employee List</h1>
<div class="col-xl-12">
    <div class="card mb-4">
        <div class="card-header bg-light">
            <div class="fw-bold">Filters</div>
            <div class="text-muted small">Search and filter employees</div>
        </div>
        <div class="card-body">
            <form class="row g-2 align-items-center">
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="material-icons-two-tone">search</i>
                        </span>
                        <input type="text" id="employeeSearch" class="form-control border-start-0" placeholder="Search by name, email, or ID...">
                    </div>
                </div>
                <div class="col-md-4">
                    <select id="departmentFilter" class="form-select">
                        <option value="">All Departments</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Finance">Finance</option>
                        <option value="HR">HR</option>
                        <option value="Sales">Sales</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body table-border-style">
            <div class="table-responsive" style="overflow-x: auto;">
                <table class="table table-striped align-middle" id="employeeTable" style="min-width: 900px; width: 100%;">
                    <thead class="table-light">
                        <tr>
                            <th style="min-width: 100px;">ID</th>
                            <th style="min-width: 120px;">First Name</th>
                            <th style="min-width: 120px;">Last Name</th>
                            <th style="min-width: 200px;">Email</th>
                            <th style="min-width: 120px;">Department</th>
                            <th style="min-width: 150px;">Position</th>
                            <th style="min-width: 120px;">Hire Date</th>
                            <th style="min-width: 100px;">Status</th>
                        </tr>
                    </thead>
                    <tbody id="employeeTableBody">
                        <!-- Employee rows will be rendered by JS -->
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <nav>
                <ul class="pagination justify-content-end mt-3" id="pagination">
                    <!-- Pagination items will be rendered by JS -->
                </ul>
            </nav>
        </div>
    </div>
</div>

<script>
// Sample employee data (15 employees)
const employees = [
    {id:"EMP-001", first:"John", last:"Smith", email:"john.smith@company.com", dept:"Engineering", pos:"Senior Developer", date:"2022-01-15", status:"Active"},
    {id:"EMP-002", first:"Sarah", last:"Johnson", email:"sarah.johnson@company.com", dept:"Marketing", pos:"Marketing Manager", date:"2021-03-20", status:"Active"},
    {id:"EMP-003", first:"Michael", last:"Lee", email:"michael.lee@company.com", dept:"Finance", pos:"Accountant", date:"2020-07-10", status:"Active"},
    {id:"EMP-004", first:"Emily", last:"Davis", email:"emily.davis@company.com", dept:"HR", pos:"HR Specialist", date:"2019-11-05", status:"Active"},
    {id:"EMP-005", first:"David", last:"Kim", email:"david.kim@company.com", dept:"Sales", pos:"Sales Executive", date:"2021-05-18", status:"Active"},
    {id:"EMP-006", first:"Anna", last:"Brown", email:"anna.brown@company.com", dept:"Engineering", pos:"Frontend Developer", date:"2022-02-10", status:"Active"},
    {id:"EMP-007", first:"James", last:"Wilson", email:"james.wilson@company.com", dept:"Finance", pos:"Financial Analyst", date:"2020-09-15", status:"Active"},
    {id:"EMP-008", first:"Linda", last:"Martinez", email:"linda.martinez@company.com", dept:"Marketing", pos:"Content Strategist", date:"2021-06-25", status:"Active"},
    {id:"EMP-009", first:"Robert", last:"Garcia", email:"robert.garcia@company.com", dept:"Sales", pos:"Account Manager", date:"2021-08-30", status:"Active"},
    {id:"EMP-010", first:"Jessica", last:"Taylor", email:"jessica.taylor@company.com", dept:"HR", pos:"Recruiter", date:"2019-12-12", status:"Active"},
    {id:"EMP-011", first:"William", last:"Moore", email:"william.moore@company.com", dept:"Engineering", pos:"Backend Developer", date:"2022-03-05", status:"Active"},
    {id:"EMP-012", first:"Patricia", last:"Anderson", email:"patricia.anderson@company.com", dept:"Finance", pos:"Payroll Specialist", date:"2020-11-22", status:"Active"},
    {id:"EMP-013", first:"Christopher", last:"Thomas", email:"christopher.thomas@company.com", dept:"Marketing", pos:"SEO Expert", date:"2021-04-18", status:"Active"},
    {id:"EMP-014", first:"Barbara", last:"Jackson", email:"barbara.jackson@company.com", dept:"HR", pos:"HR Manager", date:"2019-10-01", status:"Active"},
    {id:"EMP-015", first:"Matthew", last:"White", email:"matthew.white@company.com", dept:"Sales", pos:"Sales Manager", date:"2021-07-14", status:"Active"}
];

const rowsPerPage = 10;
let currentPage = 1;
let filteredEmployees = [...employees];

document.getElementById('employeeSearch').addEventListener('input', applyFilters);
document.getElementById('departmentFilter').addEventListener('change', applyFilters);

function applyFilters() {
    const searchValue = document.getElementById('employeeSearch').value.toLowerCase();
    const departmentValue = document.getElementById('departmentFilter').value;
    filteredEmployees = employees.filter(emp => {
        const matchesSearch =
            emp.first.toLowerCase().includes(searchValue) ||
            emp.last.toLowerCase().includes(searchValue) ||
            emp.email.toLowerCase().includes(searchValue) ||
            emp.id.toLowerCase().includes(searchValue);
        const matchesDepartment = !departmentValue || emp.dept === departmentValue;
        return matchesSearch && matchesDepartment;
    });
    currentPage = 1;
    renderTable();
    renderPagination();
}

function renderTable() {
    const tbody = document.getElementById('employeeTableBody');
    tbody.innerHTML = '';
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const pageEmployees = filteredEmployees.slice(start, end);
    pageEmployees.forEach(emp => {
        const row = document.createElement('tr');
        row.setAttribute('data-name', `${emp.first} ${emp.last}`);
        row.setAttribute('data-email', emp.email);
        row.setAttribute('data-id', emp.id);
        row.setAttribute('data-department', emp.dept);
        row.innerHTML = `
            <td>${emp.id}</td>
            <td>${emp.first}</td>
            <td>${emp.last}</td>
            <td>${emp.email}</td>
            <td>${emp.dept}</td>
            <td>${emp.pos}</td>
            <td>${emp.date}</td>
            <td><span class="badge bg-success">${emp.status}</span></td>
        `;
        tbody.appendChild(row);
    });
}

function renderPagination() {
    const totalPages = Math.ceil(filteredEmployees.length / rowsPerPage);
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';

    // Previous button
    const prevLi = document.createElement('li');
    prevLi.className = 'page-item' + (currentPage === 1 ? ' disabled' : '');
    prevLi.innerHTML = `<span class="page-link">Previous</span>`;
    if (currentPage > 1) {
        prevLi.onclick = function(e) {
            e.preventDefault();
            currentPage--;
            renderTable();
            renderPagination();
        };
    }
    pagination.appendChild(prevLi);

    // Page numbers
    for (let i = 1; i <= totalPages; i++) {
        const li = document.createElement('li');
        if (i === currentPage) {
            li.className = 'page-item active';
            li.innerHTML = `<span class="page-link">${i}</span>`; // Removed (current)
        } else {
            li.className = 'page-item';
            li.innerHTML = `<a class="page-link" href="#!">${i}</a>`;
            li.onclick = function(e) {
                e.preventDefault();
                currentPage = i;
                renderTable();
                renderPagination();
            };
        }
        pagination.appendChild(li);
    }

    // Next button
    const nextLi = document.createElement('li');
    nextLi.className = 'page-item' + (currentPage === totalPages ? ' disabled' : '');
    nextLi.innerHTML = `<a class="page-link" href="#!">Next</a>`;
    if (currentPage < totalPages) {
        nextLi.onclick = function(e) {
            e.preventDefault();
            currentPage++;
            renderTable();
            renderPagination();
        };
    }
    pagination.appendChild(nextLi);
}

function resetFilters() {
    document.getElementById('employeeSearch').value = '';
    document.getElementById('departmentFilter').value = '';
    applyFilters();
}

// Initial render
applyFilters();
</script>
@endsection