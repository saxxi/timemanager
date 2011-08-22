<section>
    
    <h2>Il Tabellone</h2>
    <div class="clearfix timetable">
        
        <?php for ($iday=0; $iday < 7; $iday++) { ?>
        <div class="dday">
            <h4>name</h4>
            
            <?php for ($ihour=0; $ihour < 10; $ihour++) { ?>
            <div class="dh">
                Orario 10:00 - 15:00
                <h5>Annamaria Giancarla</h5>
                <h6>Alessandro, Tommy, Gianluca</h6>
                <p>Corsa di ginnastica e nuoto sincronizzato</p>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        
    </div>
    
</section>