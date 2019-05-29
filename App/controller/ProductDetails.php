<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once '../model/Order.php';
//var_dump("ggggg");
if (isset($_GET['id'])) {
    $model = new Order();
 $values = json_decode($_GET['value'], true);

        if (!empty($values)) {
            foreach ($values as $value) {
                $id = preg_replace("/[^0-9,.]/", "", $value);
                $ids[] = $id;
            }
//            var_dump($_GET['id']);
//            var_dump($ids);
//            var_dump(in_array($_GET['id'],$ids));
//            
            if (!in_array($_GET['id'], $ids))
            {
                $result = $model->getProductDetails($_GET['id']);
            }
        } else {
            $result = $model->getProductDetails($_GET['id']);
        }
}
?>
 <?php if (isset($result)): ?>
<tr>
    <td>
        <span class="sname" id="name_1508596137009">  <?php echo $result['name'] ?> </span>
        <input type="hidden"  name="products[<?php echo $result['id'] ?>]" value="<?php echo $result['id'] ?>"/>
    </td>
    <td class="itemPrice">
        <span class="text-right sprice" id="sprice_1508596137009"> <?php echo $result['price'] ?></span>
        <input type="hidden" name="price[<?php echo $result['id'] ?>"  value="<?php echo $result['price'] ?>" />
    </td>
     <td class="quantity-section">
        <span class="plus"> + </span>
        <input type="number"  min="1" name="quantity[<?php echo $result['id'] ?>]" value="1" class="form-control input-qty kb-pad text-center quantity quantity-input " required=""/>
        <span class="minus"> - </span>
    </td>
    <td class="itemTotal">
        <input type="hidden" class="single-item-price" value="<?php echo $result['price'] ?>" name="amount[<?php echo $result['id'] ?>]" />
        <span class="text-right ssubtotal " ><?php echo $result['price'] ?></span>
    </td>
    <td>
         <i class="fa fa-trash fa-2x deleteItem pointer"  aria-hidden="true" ></i>
    </td>
</tr>
 <?php endif; ?>
