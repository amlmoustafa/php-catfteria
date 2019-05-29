<?php include('./components/header.php') ?>

<?php include('./components/navBar.php') ?>

<div class="container-fluid">
        
                
                
<div class="row">
    <div class="col-md-5 invoice">
        <div class="order"> 
            <h3 class="order-item-header"> Order Items </h3>
            <table  class="table " >
                <tbody>
                    <tr>
                        <td>
                            <span class="sname" id="name_1508596137009"> Minion </span>
                        </td>
                        <td>
                            <span class="text-right sprice" id="sprice_1508596137009">15.00</span>
                        </td>
                        <td>
                            <span class="plus"> + </span>
                            <input class="form-control input-qty kb-pad text-center quantity" name="quantity[]" type="text" value="3" data-id="1508596137009" data-item="2" id="quantity_1508596137009" onclick="this.select();">
                            <span class="minus"> - </span>
                        </td>
                        <td >
                            <span class="text-right ssubtotal" id="subtotal_1508596137009">30.00</span>
                        </td>
                        <td>
                            <i class="fa fa-trash-o tip pointer posdel remove" id="1508596137009" title="Remove"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="sname" id="name_1508596136993"> Minion </span>

                        </td>
                        <td >
                            <span class=" sprice" id="sprice_1508596136993">15.00</span>
                        </td>
                            <td>
                            <span class="plus"> + </span>
                            <input class="form-control input-qty kb-pad text-center quantity" name="quantity[]" type="text" value="3" data-id="1508596137009" data-item="2" id="quantity_1508596137009" onclick="this.select();">
                            <span class="minus"> - </span>
                        </td>
                        <td >
                            <span class="text-right ssubtotal" id="subtotal_1508596137009">30.00</span>
                        </td>
                        <td>
                            <i class="fa fa-trash-o tip pointer posdel remove" title="Remove"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <table  class="table table-total">
            <tbody>
                <tr>
                    <td class="total-header" >Total Items</td>
                    <td class="half-width">
                        <span id="count">2</span>
                    </td >
                    <td  class="total-header" >Total</td>
                    <td class="half-width">
                        <span id="total">60.00</span>
                    </td>
                </tr>
                <tr>
                    <td class="total-header">Discount</a></td>
                    <td class="half-width"><span id="ds_con">(0.00) 0.00</span></td>
                    <td class="total-header">Order Tax</a></td>
                    <td class="half-width" ><span id="ts_con">4.50</span></td>
                </tr>
                <tr class="total-footer">
                    <td class="total-header black">
                        Total Pay
                    </td>
                    <td class="half-width"><span >64.5</span></td>
                    <td class="total-header"></td>
                    <td class="half-width" ></td>
                </tr>
            </tbody>
        </table>
<!--                    <div class="row order-buttons">
                                    <div class="col-md-4">
                                        <button type="button" class="btn  btn-block btn-flat hold-button" id="suspend">
                                            Edit
                                        </button>
                                        <button type="button" class="btn  btn-block btn-flat cancel-button" id="reset">
                                            Cancel
                                        </button>
                                    </div>
                                    <div class="col-md-4" >
            
                                        <button type="button" class="btn bg-purple btn-block btn-flat print-button" id="print_order">Print Order</button>
                                        <button type="button" class="btn bg-navy btn-block btn-flat print-bill-button" id="print_bill">Print Bill</button>
            
                                    </div>
                                    <div class="col-md-4" >
                                        <button type="button" class="btn btn-confirm btn-block btn-flat" id="payment" style="height:85px;">Payment</button>
                                    </div>
            <div class="col-md-12">
                <div class="final-payment"> 
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title"> Payment </h4>
                                                            <i class="fa fa-minus last-minus" data-toggle="collapse" data-target="#pay" aria-hidden="true"></i>  
                                                            <button type="button" class="btn btn-info"  data-target="#demo">Simple collapsible</button>
                                                            <div class="clearfix"></div>
                                                        </div>
                    <div class="panel-body collapse show" id="pay" >
                        <div class="row form-in form-group">
                            <label class="control-label col-md-6">
                                Total Pay                           
                            </label>
                            <div class="col-md-6">
                                <input class="form-control valid" id="datepicker" type="text" name="ord_date" aria-required="true" aria-invalid="false" />
                            </div>
                        </div> 

                        <div class="row form-in form-group ">
                            <label class="control-label col-md-6">
                                Payment Method                          
                            </label>
                            <div class="col-md-6 pay-method">
                                <input type="radio" id="r2" name="rr" />
                                <label for="r2"><span></span>Visa</label>
                                <input type="radio" id="r3" name="rr" />
                                <label for="r3"><span></span>Cash</label>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" class="btn  btn-block btn-flat hold-button " id="suspend">
                                    confirm
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="row order-buttons">
            <div class="col-md-3">
                <button type="button" class="btn  btn-block btn-flat hold-button" id="suspend">
                    Reset
                </button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn bg-purple btn-block btn-flat print-button" id="print_order">Print Pill</button>
            </div>
        </div>
    </div>

    <div class="col-md-7 categories">
        <div class="row categories-row">
            <div class="col-md-4 category-tabs ">
                <div class=" horizontal-tab ">
                    <ul class="nav nav-pills srcoll-div pr-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-coffee-tab" data-toggle="pill" href="#pills-coffee" role="tab" aria-controls="pills-coffee" aria-selected="true">
                                <i class="fa fa-coffee" aria-hidden="true"></i> Coffee
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-juice-tab" data-toggle="pill" href="#pills-juice" role="tab" aria-controls="pills-juice" aria-selected="false">
                                <i class="fa fa-glass" aria-hidden="true"></i> Juices
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-hot-tab" data-toggle="pill" href="#pills-hot" role="tab" aria-controls="pills-hot" aria-selected="false">
                                <i class="fa fa-fire" aria-hidden="true"></i> Hot drinks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-salad-tab" data-toggle="pill" href="#pills-salad" role="tab" aria-controls="pills-salad" aria-selected="false">
                                <i class="fa fa-leaf" aria-hidden="true"></i> Salades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-dessert-tab" data-toggle="pill" href="#pills-dessert" role="tab" aria-controls="pills-dessert" aria-selected="false">
                                <i class="fa fa-lemon-o" aria-hidden="true"></i> Desserts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                                <i class="fa fa-cutlery" aria-hidden="true"></i> Main Dishes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                <i class="fa fa-birthday-cake" aria-hidden="true"></i> Cakes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-dessert-tab" data-toggle="pill" href="#pills-dessert" role="tab" aria-controls="pills-dessert" aria-selected="false">
                                <i class="fa fa-lemon-o" aria-hidden="true"></i> Desserts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                                <i class="fa fa-cutlery" aria-hidden="true"></i> Main Dishes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                <i class="fa fa-birthday-cake" aria-hidden="true"></i> Cakes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-dessert-tab" data-toggle="pill" href="#pills-dessert" role="tab" aria-controls="pills-dessert" aria-selected="false">
                                <i class="fa fa-lemon-o" aria-hidden="true"></i> Desserts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                                <i class="fa fa-cutlery" aria-hidden="true"></i> Main Dishes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                <i class="fa fa-birthday-cake" aria-hidden="true"></i> Cakes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-dessert-tab" data-toggle="pill" href="#pills-dessert" role="tab" aria-controls="pills-dessert" aria-selected="false">
                                <i class="fa fa-lemon-o" aria-hidden="true"></i> Desserts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                                <i class="fa fa-cutlery" aria-hidden="true"></i> Main Dishes
                            </a>
                        </li>
                        <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                            <a href="#"><i class="fa fa-gift fa-lg"></i> UI Elements <span class="arrow"></span></a>

                            <ul class="sub-menu collapse" id="products">
                                <li class="active"><a href="#">CSS3 Animation</a></li>
                                <li><a href="#">General</a></li>
                                <li><a href="#">Buttons</a></li>
                                <li><a href="#">Tabs & Accordions</a></li>
                                <li><a href="#">Typography</a></li>
                                <li><a href="#">FontAwesome</a></li>
                                <li><a href="#">Slider</a></li>
                                <li><a href="#">Panels</a></li>
                                <li><a href="#">Widgets</a></li>
                                <li><a href="#">Bootstrap Model</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 category-photos">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-coffee" role="tabpanel" aria-labelledby="pills-coffee-tab">
                        <div class="row products">
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/4b576dc6bdbace92f02cd8755d4832ad_thumb.jpeg" alt="tomato salad">
                                    <!--<img src="http://www.dar-elweb.com/demos/zarest/files/products/4b576dc6bdbace92f02cd8755d4832ad_thumb.jpeg" alt="tomato salad" />-->
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <!--<h4> 200 LE</h4>-->
                                        <span>S</span> 
                                        <span>M</span>  
                                        <span>L</span>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/42a18b1dfa45ea5e8c56d0afa620d838_thumb.jpeg" alt="tomato salad">
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <h4> 200 LE</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/215627fd7de3531e844148bdf06a5c36_thumb.jpg" alt="tomato salad" />
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <h4> 200 LE</h4>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="tab-pane fade" id="pills-juice" role="tabpanel" aria-labelledby="pills-juice-tab">
                        <div class="row">
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/4b576dc6bdbace92f02cd8755d4832ad_thumb.jpeg" alt="tomato salad" />
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <h4> 200 LE</h4>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/ca4dd5c76e281e63405b33d433afabfc_thumb.jpg" alt="tomato salad" />
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <h4> 200 LE</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-hot" role="tabpanel" aria-labelledby="pills-hot-tab">
                        <div class="row">
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/4b576dc6bdbace92f02cd8755d4832ad_thumb.jpeg" alt="tomato salad" />
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <h4> 200 LE</h4>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/ca4dd5c76e281e63405b33d433afabfc_thumb.jpg" alt="tomato salad" />
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <h4> 200 LE</h4>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/4b576dc6bdbace92f02cd8755d4832ad_thumb.jpeg" alt="tomato salad" />
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <h4> 200 LE</h4>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/ca4dd5c76e281e63405b33d433afabfc_thumb.jpg" alt="tomato salad" />
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <h4> 200 LE</h4>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-salad" role="tabpanel" aria-labelledby="pills-salad-tab">
                        <div class="row">
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/42a18b1dfa45ea5e8c56d0afa620d838_thumb.jpeg" alt="tomato salad" />
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <h4> 200 LE</h4>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/0ce0d6fd9aa4a898ac8d0b0b934f00f8_thumb.jpg" alt="tomato salad" />
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <h4> 200 LE</h4>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/5d6eaeb6e671347d97bba45ff0f385a7_thumb.jpg" alt="tomato salad" />
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <h4> 200 LE</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-dessert" role="tabpanel" aria-labelledby="pills-dessert-tab">
                        <div class="row">
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/42a18b1dfa45ea5e8c56d0afa620d838_thumb.jpeg" alt="tomato salad" />
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <h4> 200 LE</h4>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/0ce0d6fd9aa4a898ac8d0b0b934f00f8_thumb.jpg" alt="tomato salad" />
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <h4> 200 LE</h4>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 " >
                                <div class="product">
                                    <img src="http://www.dar-elweb.com/demos/zarest/files/products/5d6eaeb6e671347d97bba45ff0f385a7_thumb.jpg" alt="tomato salad" />
                                    <div class="description">
                                        <h3>Cheese salad </h3>
                                        <h4> 200 LE</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script src="../js/jquery.nicescroll.min.js" type="text/javascript"></script>
<script>
                                $(document).ready(function () {
                                    $(".srcoll-div").niceScroll({cursorcolor: "#024959", autohidemode: 'leave',
                                        cursorwidth: 8});
                                });

</script>

<?php include('./components/footer.php') ?>
