<div class="card">
    <div class="card-body">
    <center><img src="logo.png"widht=100 height=50></center>
    </div>
</div>

<div class="list-group mt-4">
    <a href="?page=home" class="list-group-item <?php if($page=='home'||empty($page)){echo"active";} ?>">Home</a>
    <a href="?page=asistenAI" class="list-group-item <?php if($page=='asistenAI'){echo"active";} ?>">Asisten </a>
    <a href="?page=jadwal" class="list-group-item <?php if($page=='jadwal'){echo"active";} ?>">Jadwal</a>
    <a href="?page=tugas" class="list-group-item <?php if($page=='tugas'){echo"active";} ?>">Tugas</a>
    <a href="?page=catatan" class="list-group-item <?php if($page=='catatan'){echo"active";} ?>">Catatan</a>
    <a href="?page=contact" class="list-group-item <?php if($page=='contact'){echo"active";} ?>">Contact </a>
    <a href="?page=logout" class="list-group-item">Logout</a>
</div>

