@php
$site_name = get_setting_value('_site_name');
$jumbotron = get_section_data('JUMBOTRON');
$location = get_setting_value('_location');
$site_description = get_setting_value('_site_description');
$youtube = get_setting_value('_youtube');
$instagram = get_setting_value('_instagram');
$facebook = get_setting_value('_facebook');
$twitter = get_setting_value('_twitter');
$phone = get_setting_value('_phone');
$email = get_setting_value('_email');
$about = get_section_data('ABOUT');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $site_name }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">{{ $site_name }}</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#data">Data Aktifitas Nelayan</a></li>
                  <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">Tentang</a></li>
                  <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#profile">Profile Tpi</a></li>
                  <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('admin-login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
      <div class="container d-flex align-items-center flex-column">
          <!-- Masthead Avatar Image-->
          <img class="masthead-avatar mb-5" src="assets/img/dspasir.jpg" alt="..." style="width: 200px; height: 200px; border-radius: 50%;" />
          <!-- Masthead Heading-->
          <h1 class="masthead-heading text-uppercase mb-0">{{ $jumbotron->title }}</h1>
          <!-- Icon Divider-->
          <div class="divider-custom divider-light">
              <div class="divider-custom-line"></div>
              <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
              <div class="divider-custom-line"></div>
          </div>
          <!-- Masthead Subheading-->
          <p class="masthead-subheading font-weight-light mb-0">{!! strip_tags($jumbotron->content) !!}</p>
      </div>
  </header>
  
    <!-- Partner Section-->
    <section class="page-section portfolio" id="data">
        <div class="container">
            <!-- Partner Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"> Cari Data Pendapatan Nelayan</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <p class="page-section-caption text-center text-uppercase text-secondary mb-2 small fst-italic">
                klik gambar di bawah
            </p>
            
            <!-- Partner Grid Items-->
            <div class="row justify-content-center">
                <!-- Search Data Pendapatan Nelayan-->
                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-search fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="assets/img/dspasir.jpg" alt="..." />
                    </div>
                </div>
                <!--Search Stock Ikan-->
                <!-- last partner 1-->
            </div>
        </div>
    </section>
    <!-- stock ikan -->
    <section class="pt-4 mb-5">
        <div class="container px-lg-5">
            <!-- Page Features-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-4">STOCK IKAN TPI PASIR</h2>
            <!-- Icon Divider-->
            <div class="row">
                @foreach ($totalJumlahIkanPerJenis as $ikan)
                    <div class="col-sm-6 col-md-4 mt-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $ikan->nama_ikan }}</h5>
                                <p class="card-text">{{ $ikan->total_jumlah_ikan }} ekor</p>
                                <div class="mt-auto">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $ikan->id }}">
                                        Detail
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- Modal -->
                    {{-- <div class="modal fade" id="modalDetail{{ $ikan->id }}" tabindex="-1" aria-labelledby="modalDetailLabel{{ $ikan->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDetailLabel{{ $ikan->id }}">Detail {{ $ikan->nama_ikan }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><b>Nama Ikan :</b> {{ $ikan->nama_ikan }}</p>
                                    <p><b>Jumlah Stok :</b> {{ $ikan->jumlah_stock }} Ekor</p>
                                    <p class="text-muted">
                                        <em>
                                            <span style="color: red;">*</span>anda dapat memesan melalui tombol di bawah !!!
                                        </em>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</a>
                                    <a type="button" class="btn btn-primary">Hubungi Admin</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                @endforeach
            </div>
            
        </div>
    </section>
    
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">{{ $about->title }}</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div class="col-lg-3 ms-auto text-center"><img src="assets/img/about.png" class="w-75" /></div>
                <div class="col-lg-5 me-auto lead">
                    {!! strip_tags($about->content) !!}
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer text-center" id="profile">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Lokasi</h4>
                    <p class="lead mb-0">
                        <a style="text-decoration: none; color: #fff" href="https://maps.app.goo.gl/NBBWahhVJkdUEqJH7">{{ $location }}</a>
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Sosial Media</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="{{ $youtube }}"><i class="fab fa-fw fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="{{ $instagram }}"><i class="fab fa-fw fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="{{ $twitter }}"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="{{ $facebook }}"><i class="fab fa-fw fa-facebook-f"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">Kontak</h4>
                    <p class="lead mb-0">
                        {{ $phone }}
                        {{ $email }}
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; {{ $site_name }}</small></div>
    </div>
    <!-- Partner Modals-->
   <!-- Partner Modal 1-->
   <!--Modal Pendapatan Nelayan-->
   <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center pb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <!-- Partner Modal - Title-->
                            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">PENDAPATAN NELAYAN</h2>
                            <!-- Partner Modal - Form-->
                            <form id="searchForm">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">INPUT NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </form>
                            <!-- Result Container -->
                            <div id="searchResult" class="mt-4"></div>
                            <!-- Close Button-->
                            <button class="btn btn-primary mt-4" data-bs-dismiss="modal">
                                <i class="fas fa-xmark fa-fw"></i>
                                Tutup Halaman
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal Stock Ikan-->


<script>
    document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var nik = document.getElementById('nik').value;
    fetch('/search', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ nik: nik })
    })
    .then(response => response.json())
    .then(data => {
        var resultContainer = document.getElementById('searchResult');
        if (data.success) {
            var results = data.results;
            var details = results.map(result => {
                var formattedDate = new Date(result.created_at).toLocaleDateString('id-ID', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });
                return `
                    ${result.nama_nelayan ? `<p><strong>Nama:</strong> ${result.nama_nelayan}</p>` : ''}
                    ${result.nik ? `<p><strong>NIK:</strong> ${result.nik}</p>` : ''}
                    ${result.nama_perahu ? `<p><strong>Nama Perahu:</strong> ${result.nama_perahu}</p>` : ''}
                    ${result.jenis_ikan ? `<p><strong>Jenis Ikan:</strong> ${result.jenis_ikan}</p>` : ''}
                    ${result.harga_per_kg ? `<p><strong>Harga Per/Kg:</strong> Rp. ${result.harga_per_kg}</p>` : ''}
                    ${result.total_berat ? `<p><strong>Total Berat:</strong> ${result.total_berat} Kg</p>` : ''}
                    ${result.total_pendapatan ? `<p><strong>Total Pendapatan:</strong> Rp. ${result.total_pendapatan}</p>` : ''}
                    ${result.created_at ? `<p><strong>Data Masuk Pada:</strong> ${formattedDate}</p>` : ''}
                    <hr>
                `;
            }).join('');
            resultContainer.innerHTML = details;
        } else {
            resultContainer.innerHTML = `<p>${data.message}</p>`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('searchResult').innerHTML = `<p>An error occurred</p>`;
    });
});

// Clear search result when modal is closed
var portfolioModal1 = document.getElementById('portfolioModal1');
portfolioModal1.addEventListener('hidden.bs.modal', function () {
    document.getElementById('searchResult').innerHTML = '';
    document.getElementById('searchForm').reset();
});


</script>
    

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- SB Forms JS-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
