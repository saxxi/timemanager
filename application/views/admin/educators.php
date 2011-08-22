<section>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras facilisis tempus turpis vel mollis.
        <br>
        Suspendisse non lacinia felis. Morbi pulvinar, tellus at gravida cursus, diam urna consequat metus.
    </p>
    <?php echo Form::select('educator', $educators_dd, 'standard'); ?>
    <?php echo Form::select('child', $children_dd, 'standard'); ?>
    <?php echo Form::select('gen::sel_week', gen::get_weeks_dd(), 'standard'); ?>
    <?php echo Form::select('gen::sel_week', array(date('Y'), date('Y')+1), 'standard'); ?>
    <input type="text" name="txtactivities" id="txtactivities" value="" />
</section>



<?php foreach($educators as $iedu=>$educator){ ?>
<section>
    
    <h2><?php echo $educator->name; ?></h2>
    <div class="clearfix timetable">
        
        <?php for ($iday=0; $iday < 7; $iday++) { ?>
        <div class="dday">
            <h4>name</h4>
            
            <?php for ($ihour=0; $ihour < 10; $ihour++) { ?>
            <div class="dh">
                x
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        
    </div>
    
</section>
<?php } ?>

