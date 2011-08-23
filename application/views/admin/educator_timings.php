<section>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras facilisis tempus turpis vel mollis.
        <br>
        Suspendisse non lacinia felis. Morbi pulvinar, tellus at gravida cursus, diam urna consequat metus.
    </p>
</section>



<section>
    
    <h2><?php echo Form::select('educator', $educators_dd, $eductor_id); ?>
        <?php echo Form::select('sel_week', gen::get_weeks_dd()); ?>
        <?php echo Form::select('sel_week', array(date('Y'), date('Y')+1)); ?>
    </h2>
    
    <div class="clearfix timetable">

        <div class="dday dayacts">
            <div class="cellhead"></div>
            
            <?php for ($ihour=0; $ihour < 10; $ihour++) { ?>
            <div class="dhh dhh3"><?php echo sprintf('%s:00 - %s:30', $ihour, $ihour); ?></div>
            <?php } ?>
        </div>
        
        <?php for ($iday=0; $iday < 7; $iday++) { ?>
        <div class="dday">
            <div class="cellhead">
                <h4><?php echo gen::get_conf_el('application.DAY_NAMES_sh', $iday); ?></h4>
            </div>
            
            <?php for ($ihour=0; $ihour < 10; $ihour++) { ?>
            <div class="dhh dhh1"></div><div class="dhh dhh2"></div>
            <?php } ?>
        </div>
        <?php } ?>
        
    </div>
    
</section>

