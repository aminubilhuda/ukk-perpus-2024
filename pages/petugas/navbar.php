 <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
     <div class="container-fluid">
         <a class="navbar-brand" href="index.php">Perpustakaan Aminu</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
             aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
             <ul class="navbar-nav me-auto mb-2 mb-md-0">
                 <li class="nav-item">
                     <a class="nav-link <?=(isset($_GET['page']) && $_GET['page'] == 'buku') ? 'active' : ''; ?> "
                         aria-current="page" href="?page=buku">Buku</a>
                 </li>

                 <li class="nav-item ">
                     <a class="nav-link <?=(isset($_GET['page']) && $_GET['page'] == 'kategori') ? 'active' : ''; ?> "
                         aria-current="page" href="?page=kategori">Kategori</a>
                 </li>

                 <li class="nav-item ">
                     <a class="nav-link <?=(isset($_GET['page']) && $_GET['page'] == 'ulasan') ? 'active' : ''; ?> "
                         aria-current="page" href="?page=ulasan">Ulasan</a>
                 </li>

                 <li class="nav-item ">
                     <a class="nav-link <?=(isset($_GET['page']) && $_GET['page'] == 'peminjaman') ? 'active' : ''; ?> "
                         aria-current="page" href="?page=peminjaman">Peminjaman</a>
                 </li>



             </ul>

             <a href="../logout.php">
                 <button class="btn btn-outline-success" type="submit">Log Out</button>
             </a>

         </div>
     </div>
 </nav>