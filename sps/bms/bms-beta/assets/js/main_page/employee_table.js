
  
    const API_URL = "http://localhost/my_site/sps/bms/bms-beta/modules/backend/main_table_data/fetch_data.php";

    async function loadEmployees() {
      const res = await fetch(API_URL);
      const data = await res.json();

      const tbody = document.querySelector("#employeeTable tbody");
      tbody.innerHTML = "";

      data.forEach(emp => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td>${emp.name}</td>
          <td>${emp.type}</td>
          <td>${emp.job_status}</td>
          <td>${emp.manager_id || '-'}</td>
          <td>${emp.company}</td>
          <td>${emp.emp_group || '-'}</td>
          <td>${emp.practice || '-'}</td>
          <td>${emp.emp_location || '-'}</td>
          <td>${emp.mobile || '-'}</td>
          <td>${emp.email || '-'}</td>
          <td>${emp.bms}</td>
          <td>${emp.staff}</td>
          <td>${emp.emp_status}</td>
          <td>
            <button onclick="editEmployee(${emp.emp_id})">✏️ Edit</button>
            <button onclick="deleteEmployee(${emp.emp_id})">🗑 Delete</button>
          </td>
        `;
        tbody.appendChild(tr);
      });
    }

    function editEmployee(id) {
      alert("Edit employee " + id);
      // later: open modal + send PUT request
    }

    async function deleteEmployee(id) {
      if (!confirm("Delete employee " + id + "?")) return;
      const res = await fetch(API_URL, {
        method: "DELETE",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id })
      });
      const result = await res.json();
      alert(result.message || result.error);
      loadEmployees();
    }

    loadEmployees();
