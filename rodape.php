<div class="container rodape rounded">
    <div class="row d-flex justify-content-center">

        <?php if (basename($_SERVER['PHP_SELF']) == 'index.php'): ?>
        
            <p class>EducBoard - <a href="https://github.com/marcoscesteves/EducBoard" target="_blank">Conheça no GitHub</a></p>
        
        <?php else: ?>
           <a href="#">
               <button type="button" class="btn" onclick="history.back()"> <i class="fas fa-chevron-left fa-2x text-light"></i>
               </button>
           </a>
           <a href="painel-principal.php">
           <button type="button" class="btn"><i class="fas fa-home fa-2x text-light"></i></button> 
           </a>
           <a href="logout.php">
               <button type="button" class="btn" ><i class="fas fa-door-open fa-2x text-light"></i>
               </button>
           </a>
           <a href="#">
               <button type="button" class="btn" onclick="history.forward()"> <i class="fas fa-chevron-right fa-2x text-light"></i>
               </button>
           </a>

         <?php endif; ?>
           
    </div>  
    
      
</div>
<!--
</body>
</html>
-->
