    
    <footer class="footer">
      <div class="conntainer">
            <div class="contact">
              <h2 class="section-title">Kontak</h2>
              <p class="address">Alamat: <?php echo $alamatI ?></p>
              <p class="email">Email: <?php echo $emailI ?></p>
              <p class="phone">Telepon: <?php echo $teleponI ?></p>
            </div>
        <div class="social-media">
          <h2 class="section-title">Media Sosial</h2>
          <div class="social-icons">
            <a href="<?php echo $link_igI ?>" class="social-icon">
              <img src="public/instagram-1-svgrepo-com.svg" alt="Instagram">
              <p><?php echo $nama_igI ?></p> 
            </a>
          </div>
        </div>
     
        <div>
          <iframe src="<?php echo $link_gmapsI ?>" width="200px" height="150px" style="border:0;" allowfullscreen="" loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <div class="copyright">
        <p>&copy; 2024 <?php echo $nama_webI ?>. All Rights Reserved.</p>
      </div>
    </footer>


</body>
</html>