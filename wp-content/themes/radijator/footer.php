<?php 
    $dir_path = get_stylesheet_directory_uri(); 
?>


<div id="searchOverlay">
    <span class="closebtn" title="Close Overlay">×</span>
    <div class="overlay-content">
        <form action="/" method="get">
            <input type="text" placeholder="Search.." name="s" id="search" value="">
            <button type="submit" id="searchsubmit" value=""><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>


<footer>
     <div class="container">
         <div class="subscribe-newsletter">
             <div class="grid-block">
                 <div>
                     <i class="fa-solid fa-envelope"></i>
                 </div>
                 <div>
                     <p>Ostavite svoj kontak email i prijavite se za redovni info o odgađajima, pogodnostima kupovine, ponudama za saradnju i najnoviji katalog.</p>
                 </div>
                 <div>
                     <form action="">
                         <div class="form-group">
                             <input type="text" placeholder="Prijavite se za najnovije vesti">
                             <button type="submit" value=""><i class="fa-solid fa-angle-right"></i></button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
 
         <div class="grid-block">
             <div>
                 <a href="<?php home_url();?>">
                    <img src="<?php echo $dir_path;?>/assets/img/logo.png" alt="">
                 </a>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                 <div class="s-media">
                     <a href="#"></a>
                     <a href="#"></a>
                     <a href="#"></a>
                     <a href="#"></a>
                 </div>
             </div>
 
             <div>
                 <h3>Radno vreme</h3>
                 <ul>
                     <li>Radnim danima:
                         <ul>
                             <li>Ponedeljak– Petak : 09 - 20 h</li>
                             <li> Subota: 09 - 17 h</li>
                         </ul>
                     </li>
                     <li>Neradni dani:
                         <ul>
                             <li> Nedelja</li>
                             <li> Zvaniči praznični neradni dani</li>
                         </ul>
                     </li>
                 </ul>
             </div>
             <div>
                 <h3>Kontaktirajte nas</h3>
                 <p>Praesent aliquam, augue ac pulvinar risuaru malesuada est,imperdiet libero ac. dam est, porttitor vehicula gravda accumsan bindum tincidunt imperdiet.</p>
            
                 <div class="contact-info">
                     <i class="fa-solid fa-location-dot"></i>
                     <p>RADIJATOR-Inženjering d.o.o <br />
                         Živojina Lazića Solunca br.6 <br />
                         36000 Kraljevo</p>
                 </div>
                
                 <div class="contact-info">
                     <i class="fa-solid fa-mobile"></i> 
                     <p>+381 36 399 170</p>
                 </div>
 
                 <div class="contact-info">
                     <i class="fa-solid fa-envelope"></i>
                     <p> radijator@radijator.rs</p>
                 </div>
 
             </div>
             <div>
                 <h3>Najnovije vesti</h3>
                 <p>Naša kompanija na Sajmu zapošljavanjaStabilno poslovanje i inovacije uvek otvaraju nova radna mesta i mi smo veoma zadovoljni što vrata za kreativne i vredne ljude nikad nismo zatvarali.
                     [29.05.2024] </p>
             </div>
         </div>
     </div>
     <div class="f-copyright">
         <div class="container">
             <div class="grid-block">
                 <p>RADIJATOR Inženjering d.o.o 2024 &copy; All Rights Reserved.</p>
                 <ul>
                     <li>
                         <a href="#">Politika Privatnosti/Uslovi</a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </footer>




<?php wp_footer();?>
</body>
</html>