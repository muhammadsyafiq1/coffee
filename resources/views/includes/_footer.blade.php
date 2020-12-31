<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6 col-lg-3 offset-lg-3">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Coffee Shop</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Hours</h2>
            <ul class="list-unstyled open-hours">
              @foreach ($times as $time)
                <li class="d-flex">
                  <span>{{ $time->day }}</span>
                  <span>{{ date("h:i", strtotime($time->jam_buka)) }} - {{ date("H:i", strtotime($time->jam_tutup)) }}</span>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 text-center">

          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
      </div>
    </div>
  </footer>