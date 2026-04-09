<footer class="footer-wrap {{ request()->is('/') ? '' : 'footer-navy' }}"> 
  <div class="footer-container">

    <div class="grid md:grid-cols-[0.7fr_1.3fr] gap-16 items-start">

      <!-- LEFT (LOGO) -->
      <div class="footer-left">
        <img
          src="{{ asset('image/header/kemendikdasmen.png') }}"
          alt="Kemendikdasmen"
          class="footer-logo"
        />
      </div>

      <!-- RIGHT -->
      <div class="grid md:grid-cols-[1.6fr_0.8fr] gap-x-18">

        <!-- KONTAK -->
        <div class="footer-col">
          <h3 class="footer-heading">Kontak Kami</h3>

          <div class="footer-list">

            <a href="https://maps.google.com/?q=Kompleks+Kementerian+Pendidikan+dan+Kebudayaan+Senayan+Jakarta+Pusat"
               target="_blank"
               class="footer-item footer-link">

              <svg xmlns="http://www.w3.org/2000/svg"
                   class="footer-icon location-icon"
                   viewBox="0 0 24 24"
                   fill="none" stroke="currentColor"
                   stroke-width="2.2"
                   stroke-linecap="round"
                   stroke-linejoin="round">
                <path d="M12 21s-6-5.33-6-10a6 6 0 1 1 12 0c0 4.67-6 10-6 10z"/>
                <circle cx="12" cy="11" r="2.5"/>
              </svg>

              <p class="footer-text">
                Kompleks Kementerian Pendidikan dan Kebudayaan, Senayan, Jakarta Pusat, 10270.
              </p>
            </a>

            <div class="footer-item">
              <svg xmlns="http://www.w3.org/2000/svg"
                   class="footer-icon"
                   viewBox="0 0 24 24"
                   fill="none" stroke="currentColor"
                   stroke-width="2.2">
                <path d="M4 6h16v12H4z"/>
                <path d="M4 7l8 6 8-6"/>
              </svg>

              <a href="mailto:hackathon.rumdik@kemendikdasmen.go.id" class="footer-link footer-text">
                hackathon.rumdik@kemendikdasmen.go.id
              </a>
            </div>

          </div>
        </div>

        <!-- SOSIAL MEDIA -->
        <div class="footer-col">
          <h3 class="footer-heading">Sosial Media</h3>

          <div class="footer-list">

            <a href="https://www.youtube.com/live/L02cYTuljK0"
               target="_blank"
               class="footer-item footer-link">
              <svg xmlns="http://www.w3.org/2000/svg"
                   class="footer-icon"
                   viewBox="0 0 24 24"
                   fill="currentColor">
                <path d="M19.6 3.2c1.8.4 3.2 1.8 3.6 3.6.8 3.2.8 6.2.8 6.2s0 3-.8 6.2c-.4 1.8-1.8 3.2-3.6 3.6-3.2.8-7.6.8-7.6.8s-4.4 0-7.6-.8c-1.8-.4-3.2-1.8-3.6-3.6C0 16 0 13 0 13s0-3 .8-6.2c.4-1.8 1.8-3.2 3.6-3.6C7.6 2.4 12 2.4 12 2.4s4.4 0 7.6.8zM9.6 15.5l6-3.5-6-3.5v7z"/>
              </svg>
              <span class="footer-text">Hackathon Rumah Pendidikan</span>
            </a>

            <a href="https://www.instagram.com"
               target="_blank"
               class="footer-item footer-link">
              <svg xmlns="http://www.w3.org/2000/svg"
                   class="footer-icon"
                   viewBox="0 0 24 24"
                   fill="none" stroke="currentColor"
                   stroke-width="2.2">
                <rect x="3" y="3" width="18" height="18" rx="5"/>
                <circle cx="12" cy="12" r="4"/>
                <circle cx="17" cy="7" r="1"/>
              </svg>
              <span class="footer-text">Rumah Pendidikan</span>
            </a>

            <a href="https://www.tiktok.com"
               target="_blank"
               class="footer-item footer-link">
              <svg xmlns="http://www.w3.org/2000/svg"
                   class="footer-icon"
                   viewBox="0 0 24 24"
                   fill="currentColor">
                <path d="M16 2h3a4 4 0 0 0 4 4v3a7 7 0 0 1-4-1.3V15a5 5 0 1 1-5-5c.3 0 .6 0 .9.1v3a2 2 0 1 0 2 2V2z"/>
              </svg>
              <span class="footer-text">Rumah Pendidikan</span>
            </a>

          </div>
        </div>

      </div>
    </div>

    <!-- BOTTOM -->
    <div class="footer-bottom">
      <p>
        © 2026 Hackathon Rumah Pendidikan |
        Pusat Data dan Teknologi Informasi Kementerian Pendidikan Dasar dan Menengah RI
      </p>
    </div>

  </div>

<style>

/* DEFAULT HOME */
.footer-wrap {
    background: #ffffff;
    margin-top: 0 !important;
    padding: 40px 0 28px; /* dipendekin lagi */
}

/* NAVY HALAMAN LAIN */
.footer-navy {
    background: #0f172a;
}

.footer-navy .footer-heading,
.footer-navy .footer-text,
.footer-navy .footer-icon {
    color: #ffffff;
}

.footer-navy .footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.15);
    color: #cbd5f5;
}

.footer-container {
    max-width: 1200px;
    margin: auto;
    padding: 0 32px;
}

.footer-logo {
    height: 55px;
}

/* heading */
.footer-heading {
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 14px;
    color: #0f172a;
}

/* list */
.footer-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

/* item */
.footer-item {
    display: flex;
    gap: 12px;
    align-items: flex-start;
    padding: 6px 8px;
    border-radius: 10px;
    transition: all 0.3s ease;
}

/* icon default */
.footer-icon {
    width: 22px;
    height: 22px;
    margin-top: 2px;
    color: #334155;
}

/* LOCATION ICON LEBIH BESAR */
.location-icon {
    width: 28px;
    height: 28px;
}

/* text */
.footer-text {
    font-size: 14px;
    color: #334155;
    line-height: 1.5;
}

/* hover */
.footer-item:hover {
    background: rgba(255,255,255,0.05);
    transform: translateY(-2px);
}

.footer-item:hover .footer-text {
    color: #2563eb;
}

.footer-item:hover .footer-icon {
    color: #2563eb;
    transform: scale(1.08);
}

/* bottom */
.footer-bottom {
    margin-top: 28px;
    padding-top: 12px;
    border-top: 1px solid #e5e7eb;
    text-align: center;
    font-size: 12px;
    color: #64748b;
}

/* fix gap */
footer {
    margin-top: 0 !important;
}

</style>

</footer>