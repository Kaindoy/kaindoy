<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Dashboard</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="dashboard">
    <aside class="sidebar">
      <h2>User Panel</h2>
      <nav>
        <a href="#">Dashboard</a>
        <a href="#">Users</a>
        <a href="#">Settings</a>
      </nav>
    </aside>
    <main class="main">
      <header>
        <h1>User Management</h1>
        <button onclick="openForm()">+ Add User</button>
      </header>
      <section>
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="userTable">
            <!-- Users will appear here -->
          </tbody>
        </table>
      </section>
    </main>
  </div>

  <!-- User Form Modal -->
  <div class="modal" id="userFormModal">
    <div class="modal-content">
      <h3 id="formTitle">Add User</h3>
      <input type="hidden" id="userId">
      <input type="text" id="name" placeholder="Name">
      <input type="email" id="email" placeholder="Email">
      <button onclick="saveUser()">Save</button>
      <button onclick="closeForm()">Cancel</button>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>