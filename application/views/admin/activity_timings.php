<section>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras facilisis tempus turpis vel mollis.
        <br>
        Suspendisse non lacinia felis. Morbi pulvinar, tellus at gravida cursus, diam urna consequat metus.
    </p>

</section>  
<section>
    <h2><?php echo Form::select('sel_week', array('Gruppo A', 'Gruppo B')); ?>
    </h2>
    
    <div class="clear clearfix acttable">
        
        <?php for ($iday=0; $iday < 7; $iday++) { ?>
        <div class="dday">
            <h4><?php echo gen::get_conf_el('application.DAY_NAMES', $iday); ?> <a class="toolbtn">aggiungi</a></h4>
            
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
    
    <div class="clear clearfix">
        <div class="span-8 appform">
            <h2 class="span-8 last">Aggiungi attività</h2>
        
            <div class="span-4">
                <h3>Educatori <a class="toolbtn">aggiungi</a></h3>
                <?php echo Form::select('educator', $educators_dd, array('multiple'), array('class'=> 'span-4 multisel')); ?>
            </div>
        
            <div class="span-4 last">
                <h3>Ragazzi <a class="toolbtn">aggiungi</a></h3>
                <?php echo Form::select('child', $children_dd, array('multiple'), array('class'=> 'span-4 multisel')); ?>
            </div>
            
            <div class="span-8">
                <h3>Quando</h3>
                Dalle <?php echo Form::select('from', array(' 9')); ?> : <?php echo Form::select('from', gen::get_halfhours_dd()); ?>
                alle <?php echo Form::select('from', array('11')); ?> : <?php echo Form::select('from', gen::get_halfhours_dd()); ?>
            
                <h3>Attività</h3>
                <input type="text" name="txtactivities" id="txtactivities" value="" />
            
                <input type="submit" value="salva" />
            </div>
        </div>
    </div>

</section>