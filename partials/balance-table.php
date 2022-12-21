<?php
    $args = array(
        'post_type'     => 'menesis',
        'order'   => 'ASC',
    );
    $query = new WP_Query( $args )
?>
<table>
    <tr>
        <th>Mėnesis</th>
        <th>Pajamos</th>
        <th>Išlaidos</th>
        <th>Balansas</th>
    </tr>
    <?php
        while( $query->have_posts() ) : $query->the_post();
            $income = get_post_meta( get_the_ID(), 'pajamos', true );
            $expenses = get_post_meta( get_the_ID(), 'islaidos', true );
            ?>
            <tr>
                <td><?php the_title(); ?></td>
                <td><?php echo $income . "€"; ?></td>
                <td><?php echo $expenses . "€"; ?></td>
                <td><?php echo $income - $expenses . "€"; ?></td>
            </tr>    
        <?php endwhile;
        wp_reset_postdata(); 
    ?>
</table>