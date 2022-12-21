<?php
    $args = array(
        'post_type'     => 'menesis',
    );
    $incomes_query = new WP_Query( $args ); 
    
    if( $incomes_query->have_posts() ):
        while( $incomes_query->have_posts() ) : $incomes_query->the_post();
            $income = get_post_meta( get_the_ID(), 'pajamos', true );
            $expenses = get_post_meta( get_the_ID(), 'islaidos', true );
            $balance = $income - $expenses;
            if(isset($income) && !empty($income) || isset($expenses) && !empty($expenses)){
                $title = get_the_title();
                $income_arr[] = array('menesis' => $title, 'balancas' => $balance);
                $expenses_arr[] = array('menesis' => $title, 'islaidos' => $expenses);
                
                foreach($income_arr as $key => $value) {
                    $inc[$key] = $value['balancas'];
                }
                foreach($expenses_arr as $key => $value) {
                    $exp[$key] = $value['islaidos'];
                }

                $min_inc_keys = array_keys($inc, min($inc));
                $max_inc_keys = array_keys($inc, max($inc));
                $min_exp_keys = array_keys($exp, min($exp));
                $max_exp_keys = array_keys($exp, max($exp));
                $inc_min_output = array_intersect_key($income_arr, array_flip($min_inc_keys));
                $inc_max_output = array_intersect_key($income_arr, array_flip($max_inc_keys));
                $exp_min_output = array_intersect_key($expenses_arr, array_flip($min_exp_keys));
                $exp_max_output = array_intersect_key($expenses_arr, array_flip($max_exp_keys));

                foreach($inc_min_output as $key => $value) {
                    $min_month = $value['menesis'];
                    $min_inc = $value['balancas'];
                }
                foreach($inc_max_output as $key => $value) {
                    $max_month = $value['menesis'];
                    $max_inc = $value['balancas'];
                }
                foreach($exp_min_output as $key => $value) {
                    $exp_min_month = $value['menesis'];
                    $min_exp = $value['islaidos'];
                }
                foreach($exp_max_output as $key => $value) {
                    $exp_max_month = $value['menesis'];
                    $max_exp = $value['islaidos'];
                }
            }
        endwhile;

    endif; 

    wp_reset_query();
?>
    <h2>Metų suvestinė:</h2>
<div class="inner-col">
    <div class="overview-col">
        <h4>Mažiausiai uždirbta:</h4>
        <h3><?php echo "<span class='month'>" . $min_month . "</span> - <span class='sum'>" . $min_inc ."€</span>" ?></h3>
    </div>
    <div class="overview-col">
        <h4>Daugiausiai uždirbta:</h4>
        <h3><?php echo "<span class='month'>" . $max_month . "</span> - <span class='sum'>" . $max_inc ."€</span>" ?></h3>
    </div>
    <div class="overview-col">
        <h4>Mažiausiai išlaidų:</h4>
        <h3><?php echo "<span class='month'>" . $exp_min_month . "</span> - <span class='sum'>" . $min_exp ."€</span>" ?></h3>
    </div>
    <div class="overview-col">
        <h4>Daugiausiai išlaidų:</h4>
        <h3><?php echo "<span class='month'>" . $exp_max_month . "</span> - <span class='sum'>" . $max_exp ."€</span>" ?></h3>
    </div>
</div>
