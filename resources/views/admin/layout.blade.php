<h1>Admin Panel</h1>

<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"></head>

<div class="leftnav" style="float: left; width: 150px; height: 100%; margin-right: 30px;">
    <b>Groups</b>
    <ul>
        <li><a href="/admin/drugs">List</a></li>
        <li><a href="/admin/drugs/create">Add</a></li>
    </ul>
    <br/>

    <b>Dashboard</b>
    <ul>
        <li><a href="/home">Account</a></li>
    </ul>

    <ul>
        <li><a href="/drugs">Frontend</a></li>
    </ul>
</div>

<div>
    @yield('content')
</div>