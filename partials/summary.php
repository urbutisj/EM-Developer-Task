<?php
    $args = array(
        'post_type'     => 'menesis',
    );

    $query = new WP_Query( $args ); 

    $totalIncome = 0;
    $totalExpenses = 0;
    $totalBalance = 0;
    
    while( $query->have_posts() ) : $query->the_post();
        $income = (int)get_post_meta( get_the_ID(), 'pajamos', true );
        $expenses = (int)get_post_meta( get_the_ID(), 'islaidos', true );
        $totalIncome += $income;
        $totalExpenses += $expenses;
    endwhile;

    $totalBalance = $totalIncome - $totalExpenses;
    
    wp_reset_postdata(); 
?>

<div class="row">
    <div class="col-12">
        <div class="sum-col">
            <h3>Visų metų pajamos:</h3>
            <span><?php echo $totalIncome . "€"; ?></span>
        </div>
        <div class="sum-col">
            <h3>Visų metų išlaidos:</h3>
            <span><?php echo $totalExpenses . "€"; ?></span>
        </div>
        <div class="sum-col">
            <h3>Visų metų balansas:</h3>
            <span><?php echo $totalBalance . "€"; ?></span>
        </div>
    </div>
</div>