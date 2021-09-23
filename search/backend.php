<?php
if (isset($_POST['data'])) {
    $output='<table>';
    $res=$conn->query("SELECT * FROM `new_product` WHERE `product_name` like '%".$_POST['item']."%'");
    if (numrows($res)) {
        while ($fetch = fetcharray($res)) {
            $output .= '<tr><td style="padding-top:5px;padding-right:10px;"><a href="product-single.php?id='.$fetch['product_id'].'"><img class="img-responsive" src="admin/'. $fetch['product_img'] .'" alt="product-img" style="height:25px;width:25px;" /><a></td><td><a href="product-single.php?id='.$fetch['product_id'].'">'.$fetch['product_name'].'</a></td></tr>';
        }
    } else {
        $output.='<li>Item not found</li>';
    }
    $output.='</table>';
    echo $output;
}
