<div id="y-cart" class="col-md-4 col-sm-12 col-xs-12">
    <div id="y-cart-main">
        <a href="index.php?page_layout=giohang">
            <p>Bạn đang có <span><?php if(isset($_SESSION['giohang'])){echo count($_SESSION['giohang']);}else{echo 0;} ?></span> sản phẩm</p>
            <img width="45px" src="images/cart_icon.png">
        </a>
    </div>
</div>